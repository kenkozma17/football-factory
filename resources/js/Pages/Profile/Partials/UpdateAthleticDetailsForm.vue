<script setup>
import { ref, onMounted } from "vue";
import { useForm } from "@inertiajs/vue3";
import ActionMessage from "@/Components/ActionMessage.vue";
import FormSection from "@/Components/FormSection.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import countries from "@/ListOfCountries";

const props = defineProps({
    user: Object,
});

const form = useForm({
    _method: "PUT",
    user_id: props.user.id,
    preferred_foot: props.user.player_bio?.preferred_foot,
    position: props.user.player_bio?.position,
    current_club: props.user.player_bio?.current_club,
    height: props.user.player_bio?.height,
    weight: props.user.player_bio?.weight,
    nationality: props.user.player_bio?.nationality,
    current_school: props.user.player_bio?.current_school,
    graduation_year: props.user.player_bio?.nationality,
});

const updateAthleticDetails = () => {
    form.post(route("user-profile-information.update-athletic-details"), {
        errorBag: "updateAthleticDetails",
        preserveScroll: true,
    });
};
</script>

<template>
    <FormSection @submitted="updateAthleticDetails">
        <template #title> Athletic Information </template>

        <template #description>
            Share key details about your soccer background and personal
            information to enhance your player profile.
        </template>

        <template #form>
            <!-- Position -->
            <div class="col-span-6 sm:col-span-4">
                <InputLabel
                    class="text-white"
                    for="position"
                    value="Position"
                />
                <select
                    v-model="form.position"
                    name="position"
                    id="position"
                    class="mt-2 bg-dark w-full border-dark rounded-lg"
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
                </select>
                <InputError :message="form.errors.position" class="mt-2" />
            </div>

            <!-- Current Club -->
            <div class="col-span-6 sm:col-span-4">
                <InputLabel
                    class="text-white"
                    for="current_club"
                    value="Current Club"
                />
                <TextInput
                    v-model="form.current_club"
                    name="current_club"
                    id="current_club"
                    class="mt-2 block w-full bg-dark border-dark"
                />
                <InputError :message="form.errors.current_club" class="mt-2" />
            </div>

            <!-- Preferred Foot -->
            <div class="col-span-6 sm:col-span-4">
                <InputLabel
                    class="text-white"
                    for="preferred_foot"
                    value="Preferred Kicking Foot"
                />
                <select
                    v-model="form.preferred_foot"
                    name="preferred_foot"
                    id="preferred_foot"
                    class="mt-2 bg-dark w-full border-dark rounded-lg"
                >
                    <option value="null" disabled>Select A Foot</option>
                    <option value="Right Foot">Right Foot</option>
                    <option value="Left Foot">Left Foot</option>
                </select>
                <InputError
                    :message="form.errors.preferred_foot"
                    class="mt-2"
                />
            </div>

            <!-- Height -->
            <div class="col-span-6 sm:col-span-4">
                <InputLabel
                    class="text-white"
                    for="height"
                    value="Height (centimeters)"
                />
                <TextInput
                    v-model="form.height"
                    name="height"
                    id="height"
                    class="mt-2 block w-full bg-dark border-dark"
                    required
                />
                <InputError :message="form.errors.height" class="mt-2" />
            </div>

            <!-- Height -->
            <div class="col-span-6 sm:col-span-4">
                <InputLabel
                    class="text-white"
                    for="weight"
                    value="Weight (kilograms)"
                />
                <TextInput
                    v-model="form.weight"
                    name="weight"
                    id="weight"
                    class="mt-2 block w-full bg-dark border-dark"
                    required
                />
                <InputError :message="form.errors.weight" class="mt-2" />
            </div>

            <!-- Nationality -->
            <div class="col-span-6 sm:col-span-4">
                <InputLabel
                    class="text-white"
                    for="nationality"
                    value="Nationality"
                />
                <select
                    @change=""
                    v-model="form.nationality"
                    name="nationality"
                    id="nationality"
                    class="mt-2 bg-dark w-full border-dark rounded-lg"
                >
                    <option value="null" disabled>Select Nationality</option>
                    <option v-for="country in countries" :value="country.name">
                        {{ country.name }}
                    </option>
                </select>
                <InputError :message="form.errors.nationality" class="mt-2" />
            </div>

            <!-- School/College/University -->
            <div class="col-span-6 sm:col-span-4">
                <InputLabel
                    class="text-white"
                    for="current_school"
                    value="Current School"
                />
                <TextInput
                    v-model="form.current_school"
                    name="current_school"
                    id="current_school"
                    class="mt-2 block w-full bg-dark border-dark"
                />
                <InputError
                    :message="form.errors.current_school"
                    class="mt-2"
                />
            </div>

            <!-- Graduation Year -->
            <div class="col-span-6 sm:col-span-4">
                <InputLabel
                    class="text-white"
                    for="graduation_year"
                    value="Graduation Year"
                />
                <select
                    v-model="form.graduation_year"
                    name="graduation_year"
                    id="graduation_year"
                    class="mt-2 bg-dark w-full border-dark rounded-lg"
                >
                    <option value="null" disabled>Select Year</option>
                    <option value="2023">2023</option>
                    <option value="2024">2024</option>
                    <option value="2025">2025</option>
                    <option value="2026">2026</option>
                    <option value="2027">2027</option>
                    <option value="2028">2028</option>
                    <option value="2029">2029</option>
                    <option value="2030">2030</option>
                </select>
                <InputError
                    :message="form.errors.graduation_year"
                    class="mt-2"
                />
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
