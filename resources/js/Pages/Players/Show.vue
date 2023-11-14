<script setup>
import { Head, Link } from "@inertiajs/vue3";
import Wrapper from "@/Components/UI/Wrapper.vue";
import PublicLayout from "@/Layouts/PublicLayout.vue";
import UserIcon from "@/Components/Icons/UserPlaceholderIcon.vue";
import StarIcon from "@/Components/Icons/StarIcon.vue";
import BioKeyPair from "@/Components/Players/Profile/BioKeyPair.vue";
import LocationIcon from "@/Components/Icons/LocationIcon.vue";
import SchoolIcon from "@/Components/Icons/SchoolIcon.vue";
import YoutubeIcon from "@/Components/Icons/YoutubeIcon.vue";
import InstagramIcon from "@/Components/Icons/InstagramIcon.vue";
import FacebookIcon from "@/Components/Icons/FacebookIcon.vue";

const props = defineProps({
    player: Object,
});
</script>
<template>
    <Head title="Home" />
    <PublicLayout>
        <Wrapper :small="true">
            <div class="grid grid-cols-5 items-start gap-x-6 md:mt-32 mt-12">
                <section class="col-span-2 flex flex-col gap-y-4">
                    <div
                        class="bg-secondary-dark rounded-lg headshot flex items-end justify-center w-full h-full relative"
                    >
                        <p
                            class="absolute top-5 left-5 font-bold text-[1.5rem]"
                        >
                            {{ props.player.player_bio.short_position }}
                        </p>
                        <img
                            v-if="props.player.profile_photo_url"
                            class="object-cover w-full h-full rounded-xl"
                            :src="props.player.profile_photo_url"
                            alt=""
                        />
                        <UserIcon v-else />
                    </div>
                    <div
                        class="description bg-secondary-dark rounded-lg p-4 flex flex-col gap-y-2"
                    >
                        <BioKeyPair
                            label="Position"
                            :value="props.player.player_bio.position"
                        />
                        <BioKeyPair
                            label="Club"
                            :value="props.player.player_bio.current_club"
                        />
                        <BioKeyPair
                            label="Birthdate"
                            :value="props.player.player_bio.birthday"
                        />
                        <BioKeyPair
                            label="Age"
                            :value="props.player.player_bio.age"
                        />
                        <BioKeyPair
                            label="Dominant Foot"
                            :value="props.player.player_bio.preferred_foot"
                        />
                        <BioKeyPair
                            label="Height"
                            :value="props.player.player_bio.height + ' CM'"
                        />
                        <BioKeyPair
                            label="Weight"
                            :value="props.player.player_bio.weight + ' KG'"
                        />
                        <BioKeyPair
                            label="Nationality"
                            :value="props.player.player_bio.nationality"
                        />
                    </div>
                </section>
                <section class="col-span-3">
                    <div>
                        <div class="flex justify-between">
                            <h1 class="text-[2rem] font-bold">
                                {{ props.player.name }}
                            </h1>
                            <a
                                :href="'/rate-player/' + props.player.id"
                                class="hover:opacity-100 opacity-80 flex items-center gap-x-2 bg-darkgreen text-white rounded-full px-5"
                            >
                                <StarIcon />
                                <span>Rate Player</span>
                            </a>
                        </div>
                        <div
                            class="flex gap-x-2 items-center"
                            v-if="props.player.player_bio.location"
                        >
                            <LocationIcon />
                            <p>
                                Lives in {{ props.player.player_bio.location }}
                            </p>
                        </div>
                        <div
                            class="flex gap-x-2 items-center"
                            v-if="props.player.player_bio.current_school"
                        >
                            <SchoolIcon />
                            <p>
                                Studies at
                                {{ props.player.player_bio.current_school }}
                                (Class of
                                <template
                                    v-if="
                                        props.player.player_bio.graduation_year
                                    "
                                >
                                    {{
                                        props.player.player_bio.graduation_year
                                    }})</template
                                >
                            </p>
                        </div>
                    </div>
                    <div class="bg-secondary-dark rounded-lg p-4 md:mt-4">
                        <h2 class="text-[1.25rem] font-bold">Player Stats</h2>
                    </div>
                    <div
                        class="bg-secondary-dark rounded-lg p-4 md:mt-4 flex flex-col gap-y-3"
                    >
                        <h2 class="text-[1.25rem] font-bold">
                            Contact Information
                        </h2>
                        <div
                            class="flex flex-col"
                            v-if="props.player.player_bio.highlights_url"
                        >
                            <p>Highlights</p>
                            <a
                                :href="props.player.player_bio.highlights_url"
                                class="text-sm text-blue-500 hover:underline"
                            >
                                {{ props.player.player_bio.highlights_url }}
                            </a>
                        </div>

                        <div
                            class="flex flex-col"
                            v-if="props.player.player_bio.phone"
                        >
                            <p>Phone</p>
                            <a
                                :href="'tel:' + props.player.player_bio.phone"
                                class="text-sm hover:underline"
                            >
                                {{ props.player.player_bio.phone }}
                            </a>
                        </div>
                        <div class="flex flex-col" v-if="props.player.email">
                            <p>Email</p>
                            <a
                                :href="'mailto:' + props.player.email"
                                class="text-sm hover:underline"
                                >{{ props.player.email }}</a
                            >
                        </div>
                        <div
                            class="flex flex-col"
                            v-if="props.player.player_bio.socials"
                        >
                            <p>Socials</p>
                            <div class="flex gap-x-3 mt-2">
                                <a
                                    target="_blank"
                                    v-if="props.player.player_bio.instagram_url"
                                    :href="
                                        props.player.player_bio.instagram_url
                                    "
                                    ><InstagramIcon class="w-6 h-6"
                                /></a>
                                <a
                                    target="_blank"
                                    v-if="props.player.player_bio.youtube_url"
                                    :href="props.player.player_bio.youtube_url"
                                    ><YoutubeIcon class="w-6 h-6"
                                /></a>
                                <a
                                    target="_blank"
                                    v-if="props.player.player_bio.facebook_url"
                                    :href="props.player.player_bio.facebook_url"
                                    ><FacebookIcon class="w-6 h-6"
                                /></a>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </Wrapper>
    </PublicLayout>
</template>
