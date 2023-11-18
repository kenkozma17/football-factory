<script setup>
import { ref } from "vue";
import { useForm } from "@inertiajs/vue3";
import ActionMessage from "@/Components/ActionMessage.vue";
import FormSection from "@/Components/FormSection.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";

const props = defineProps({
    user: Object,
});

const form = useForm({
    _method: "PUT",
    user_id: props.user.id,
    highlights_url: props.user.player_bio?.highlights_url ?? "",
    instagram_url: props.user.player_bio?.instagram_url ?? "",
    facebook_url: props.user.player_bio?.facebook_url ?? "",
    youtube_url: props.user.player_bio?.youtube_url ?? "",
    phone: props.user.player_bio?.phone ?? "",
});

const updateSocials = () => {
    form.post(route("user-profile-information.update-socials"), {
        errorBag: "updateProfileSocials",
        preserveScroll: true,
        onSuccess: () => {},
    });
};
</script>

<template>
    <FormSection @submitted="updateSocials">
        <template #title> Highlights and Socials </template>

        <template #description>
            Elevate your profile by adding your social media links and contact
            information, allowing coaches and scouts to connect with you
            effortlessly.
        </template>

        <template #form>
            <!-- Highlights URL -->
            <div class="col-span-6 sm:col-span-4">
                <InputLabel
                    class="text-white"
                    for="highlights_url"
                    value="Highlights URL/Link"
                />
                <TextInput
                    id="highlights_url"
                    v-model="form.highlights_url"
                    type="text"
                    class="mt-1 block w-full bg-dark border-dark"
                    autocomplete="highlights_url"
                />
                <InputError
                    :message="form.errors.highlights_url"
                    class="mt-2"
                />
            </div>

            <!-- IG URL -->
            <div class="col-span-6 sm:col-span-4">
                <InputLabel
                    class="text-white"
                    for="instagram_url"
                    value="Instagram URL/Link"
                />
                <TextInput
                    id="instagram_url"
                    v-model="form.instagram_url"
                    type="text"
                    class="mt-1 block w-full bg-dark border-dark"
                    autocomplete="instagram_url"
                />
                <InputError :message="form.errors.instagram_url" class="mt-2" />
            </div>

            <!-- FB URL -->
            <div class="col-span-6 sm:col-span-4">
                <InputLabel
                    class="text-white"
                    for="facebook_url"
                    value="Facebook URL/Link"
                />
                <TextInput
                    id="facebook_url"
                    v-model="form.facebook_url"
                    type="text"
                    class="mt-1 block w-full bg-dark border-dark"
                    autocomplete="facebook_url"
                />
                <InputError :message="form.errors.facebook_url" class="mt-2" />
            </div>

            <!-- YT URL -->
            <div class="col-span-6 sm:col-span-4">
                <InputLabel
                    class="text-white"
                    for="youtube_url"
                    value="Youtube URL/Link"
                />
                <TextInput
                    id="youtube_url"
                    v-model="form.youtube_url"
                    type="text"
                    class="mt-1 block w-full bg-dark border-dark"
                    autocomplete="youtube_url"
                />
                <InputError :message="form.errors.youtube_url" class="mt-2" />
            </div>

            <!-- Phone URL -->
            <div class="col-span-6 sm:col-span-4">
                <InputLabel
                    class="text-white"
                    for="phone"
                    value="Phone Number"
                />
                <TextInput
                    id="phone"
                    v-model="form.phone"
                    type="text"
                    class="mt-1 block w-full bg-dark border-dark"
                    autocomplete="phone"
                />
                <InputError :message="form.errors.phone" class="mt-2" />
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
