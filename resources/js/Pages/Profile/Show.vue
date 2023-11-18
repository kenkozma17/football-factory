<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import SectionBorder from "@/Components/SectionBorder.vue";
import UpdatePasswordForm from "@/Pages/Profile/Partials/UpdatePasswordForm.vue";
import UpdateProfileInformationForm from "@/Pages/Profile/Partials/UpdateProfileInformationForm.vue";
import UpdateLocationForm from "@/Pages/Profile/Partials/UpdateLocationForm.vue";
import UpdateAthleticDetailsForm from "@/Pages/Profile/Partials/UpdateAthleticDetailsForm.vue";
import UpdateSocialsForm from "@/Pages/Profile/Partials/UpdateSocialsForm.vue";

defineProps({
    confirmsTwoFactorAuthentication: Boolean,
    sessions: Array,
});
</script>

<template>
    <AppLayout title="Profile">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Profile
            </h2>
        </template>

        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                <div v-if="$page.props.jetstream.canUpdateProfileInformation">
                    <UpdateProfileInformationForm
                        :user="$page.props.auth.user"
                    />

                    <SectionBorder />
                </div>

                <div>
                    <UpdateAthleticDetailsForm
                        :user="$page.props.auth.user"
                        class="mt-10 sm:mt-0"
                    />

                    <SectionBorder />
                </div>

                <div>
                    <UpdateLocationForm
                        :user="$page.props.auth.user"
                        class="mt-10 sm:mt-0"
                    />

                    <SectionBorder />
                </div>

                <div>
                    <UpdateSocialsForm
                        :user="$page.props.auth.user"
                        class="mt-10 sm:mt-0"
                    />

                    <SectionBorder />
                </div>

                <div v-if="$page.props.jetstream.canUpdatePassword">
                    <UpdatePasswordForm class="mt-10 sm:mt-0" />

                    <SectionBorder />
                </div>
            </div>
        </div>
    </AppLayout>
</template>
