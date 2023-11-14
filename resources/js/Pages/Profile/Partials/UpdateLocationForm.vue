<script setup>
import { ref, onMounted } from "vue";
import { useForm } from "@inertiajs/vue3";
import ActionMessage from "@/Components/ActionMessage.vue";
import FormSection from "@/Components/FormSection.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";

const props = defineProps({
    user: Object,
});

const provincesList = ref([]);
const citiesList = ref([]);
const isLoadingCities = ref(true);

const form = useForm({
    _method: "PUT",
    user_id: props.user.id,
    province: props.user.player_bio?.province,
    city: props.user.player_bio?.city,
});

const setProvinces = async () => {
    return axios.get("https://psgc.gitlab.io/api/provinces").then((resp) => {
        provincesList.value = resp.data.sort((a, b) =>
            a.name.localeCompare(b.name)
        );
    });
};

const handleProvinceChange = () => {
    form.city = "";
    setCities();
};

const setCities = async () => {
    isLoadingCities.value = true;
    const selectedProvince = provincesList.value.find(
        (province) => province.name === form.province
    );
    return await axios
        .get(
            `https://psgc.gitlab.io/api/provinces/${selectedProvince.code}/cities-municipalities/`
        )
        .then((resp) => {
            citiesList.value = resp.data.sort((a, b) =>
                a.name.localeCompare(b.name)
            );
            isLoadingCities.value = false;
        });
};

const updateLocation = () => {
    form.post(route("user-profile-information.update-location"), {
        errorBag: "updateProfileLocation",
        preserveScroll: true,
        onSuccess: () => {},
    });
};

onMounted(async () => {
    await setProvinces();
    if (form.province) setCities();
});
</script>

<template>
    <FormSection @submitted="updateLocation">
        <template #title> Location Information </template>

        <template #description>
            Update your location information so that scouts and coaches know
            where you're currently playing football.
        </template>

        <template #form>
            <!-- Province -->
            <div class="col-span-6 sm:col-span-4">
                <InputLabel
                    class="text-white"
                    for="province"
                    value="Province"
                />
                <select
                    @change="handleProvinceChange"
                    v-model="form.province"
                    name="province"
                    id="province"
                    class="mt-2 bg-dark w-full border-dark rounded-lg"
                >
                    <option value="null" disabled>Select A Province</option>
                    <option
                        :value="province.name"
                        v-for="province in provincesList"
                    >
                        {{ province.name }}
                    </option>
                </select>
                <InputError :message="form.errors.province" class="mt-2" />
            </div>

            <!-- City -->
            <div class="col-span-6 sm:col-span-4">
                <InputLabel class="text-white" for="city" value="City" />
                <select
                    :disabled="isLoadingCities"
                    v-model="form.city"
                    name="city"
                    id="city"
                    class="disabled:cursor-not-allowed mt-2 bg-dark w-full border-dark rounded-lg"
                >
                    <option value="null" disabled>Select A City</option>
                    <option :value="city.name" v-for="city in citiesList">
                        {{ city.name }}
                    </option>
                </select>
                <InputError :message="form.errors.city" class="mt-2" />
            </div>
        </template>

        <template #actions>
            <ActionMessage
                :on="form.recentlySuccessful"
                class="me-3 text-green-400"
            >
                Saved.
            </ActionMessage>

            <PrimaryButton
                :class="{ 'opacity-25': form.processing }"
                :disabled="form.processing"
            >
                Save
            </PrimaryButton>
        </template>
    </FormSection>
</template>
