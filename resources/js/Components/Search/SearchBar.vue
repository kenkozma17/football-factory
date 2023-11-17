<script setup>
import { ref, onMounted } from "vue";
import { useForm } from "@inertiajs/vue3";

const props = defineProps({
    search: {
        type: String,
        default: "",
    },
});

const provincesList = ref([]);
const setProvinces = async () => {
    return axios.get("https://psgc.gitlab.io/api/provinces").then((resp) => {
        provincesList.value = resp.data.sort((a, b) =>
            a.name.localeCompare(b.name)
        );
    });
};

const form = useForm({
    search: props.search,
});

const search = () => {
    form.get("/", {
        errorBag: "searchPlayers",
        preserveScroll: true,
    });
};

onMounted(async () => {
    await setProvinces();
});
</script>
<template>
    <section>
        <h1 class="text-center">
            Discover Talented Footballers of The Philippines
        </h1>
        <form
            @submit.prevent="search"
            class="rounded-xl mt-3 bg-secondary-dark py-4 px-4 lg:w-[800px] md:w-[650px] w-full mx-auto relative"
        >
            <div class="w-full">
                <input
                    v-model="form.search"
                    type="text"
                    class="bg-dark border-dark rounded-lg col-span-5 w-full"
                    placeholder="John Terry"
                />
            </div>
            <div class="mt-3 grid grid-cols-2 gap-x-3">
                <!-- <select name="" id="" class="bg-dark border-dark rounded-lg">
                    <option value="">Region 1</option>
                </select> -->
                <!-- <select
                    v-model="form.province"
                    name="province"
                    id="province"
                    class="bg-dark border-dark rounded-lg"
                >
                    <option value="null" disabled>Select A Province</option>
                    <option
                        :value="province.name"
                        v-for="province in provincesList"
                    >
                        {{ province.name }}
                    </option>
                </select>
                <select
                    v-model="form.position"
                    name=""
                    id=""
                    class="bg-dark border-dark rounded-lg"
                >
                    <option value="null" disabled>Select A Position</option>
                    <option value="Goalkeeper">Goalkeeper</option>
                    <option value="Right Full Back">Right Full Back</option>
                    <option value="Left Full Back">Left Full Back</option>
                    <option value="Right Center Back">Right Center Back</option>
                    <option value="Left Center Back">Left Center Back</option>
                    <option value="Attacking Midfielder">
                        Attacking Midfielder
                    </option>
                    <option value="Defensive Midfielder">
                        Defensive Midfielder
                    </option>
                    <option value="Right Winger">Right Winger</option>
                    <option value="Left Winger">Left Winger</option>
                    <option value="Striker/Forward">Striker/Forward</option>
                </select> -->
            </div>
            <div class="flex justify-end">
                <button
                    type="submit"
                    class="bg-white rounded-lg w-full hover:opacity-75 text-black py-2 px-10 col-span-1"
                >
                    Search
                </button>
            </div>
        </form>
    </section>
</template>
