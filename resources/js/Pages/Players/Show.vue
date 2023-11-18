<script setup>
import { Head, Link, usePage } from "@inertiajs/vue3";
import { computed } from "vue";
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
import StatsTitle from "@/Components/Players/Stats/StatsTitle.vue";
import StatsBar from "@/Components/Players/Stats/StatsBar.vue";
import SubStats from "@/Components/Players/Stats/SubStats.vue";

const props = defineProps({
    player: Object,
});

const playerStats = computed(() => {
    return props.player.player_stats;
});

const ratePlayerUrl = computed(() => {
    if (usePage().props.auth.user) {
        return "/rate-player/" + props.player.id;
    }
    return "/login";
});
</script>
<template>
    <Head title="Home" />
    <PublicLayout>
        <Wrapper :small="true">
            <div
                class="grid md:grid-cols-5 grid-cols-1 items-start md:gap-x-6 gap-y-2 md:mt-32 sm:mb-12 sm:mt-12 mt-6 mb-6"
            >
                <section class="col-span-2 flex flex-col gap-y-4">
                    <!-- Image Headshot -->
                    <div
                        class="bg-secondary-dark rounded-lg headshot flex items-end justify-center w-full h-full relative"
                    >
                        <div
                            class="absolute top-3 leading-10 left-4 flex flex-col items-center"
                        >
                            <div
                                class="bg-black bg-opacity-80 text-center rounded px-1.5 py-1"
                            >
                                <p
                                    class="text-[2.5rem] font-bold"
                                    v-if="playerStats?.overall_rating"
                                >
                                    {{ playerStats.overall_rating }}
                                </p>
                                <p class="text-[1.5rem] font-semibold">
                                    {{ props.player.player_bio.short_position }}
                                </p>
                            </div>
                        </div>
                        <img
                            v-if="props.player.profile_photo_url"
                            class="object-cover w-full h-[350px] rounded-xl"
                            :src="props.player.profile_photo_url"
                            alt=""
                        />
                        <UserIcon v-else />
                    </div>

                    <!-- Bio -->
                    <div
                        class="bg-secondary-dark rounded-lg p-4 md:flex hidden flex-col gap-y-2"
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
                    <!-- Name, Location, and School  -->
                    <div>
                        <div class="flex justify-between">
                            <h1>
                                {{ props.player.name }}
                            </h1>
                        </div>
                        <div
                            class="flex gap-x-2 items-center"
                            v-if="props.player.player_bio.location"
                        >
                            <LocationIcon />
                            <p class="md:text-base text-sm">
                                Lives in {{ props.player.player_bio.location }}
                            </p>
                        </div>
                        <div
                            class="flex gap-x-2 items-center"
                            v-if="props.player.player_bio.current_school"
                        >
                            <SchoolIcon />
                            <p class="md:text-base text-sm">
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

                    <Link
                        :href="ratePlayerUrl"
                        class="hover:opacity-100 opacity-80 flex items-center gap-x-2 bg-darkgreen text-white rounded justify-center mt-2 w-full py-2.5 px-5"
                    >
                        <StarIcon />
                        <span>Rate Player</span>
                    </Link>
                    <!-- Bio -->
                    <div
                        class="bg-secondary-dark rounded-lg p-4 flex md:hidden flex-col my-2 gap-y-2"
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
                    <div class="bg-secondary-dark rounded-lg p-4 md:mt-4 mt-2">
                        <div class="justify-between flex">
                            <h2 class="text-[1.25rem] font-bold">
                                Player Stats
                            </h2>
                            <p>
                                {{ props.player.player_ratings_count }}
                                rating<span
                                    v-if="props.player.player_ratings_count > 1"
                                    >s</span
                                >
                            </p>
                        </div>

                        <div class="grid grid-cols-2 gap-4 mt-2">
                            <div class="col-span-1 flex flex-col">
                                <StatsTitle
                                    label="Pace"
                                    :rating="playerStats?.pace"
                                />
                                <StatsBar :rating="playerStats?.pace" />
                                <div class="flex flex-col gap-1 mt-2">
                                    <SubStats
                                        label="Acceleration"
                                        :rating="playerStats?.acceleration"
                                    />
                                    <SubStats
                                        label="Sprint Speed"
                                        :rating="playerStats?.sprint_speed"
                                    />
                                </div>
                            </div>
                            <div class="col-span-1 flex flex-col">
                                <StatsTitle
                                    label="Passing"
                                    :rating="playerStats?.passing"
                                />
                                <StatsBar :rating="playerStats?.passing" />
                                <div class="flex flex-col gap-1 mt-2">
                                    <SubStats
                                        label="Vision"
                                        :rating="playerStats?.vision"
                                    />
                                    <SubStats
                                        label="Crossing"
                                        :rating="playerStats?.crossing"
                                    />
                                    <SubStats
                                        label="Short Pass"
                                        :rating="playerStats?.short_pass"
                                    />
                                </div>
                            </div>
                            <div class="col-span-1 flex flex-col">
                                <StatsTitle
                                    label="Shooting"
                                    :rating="playerStats?.shooting"
                                />
                                <StatsBar :rating="playerStats?.shooting" />

                                <div class="flex flex-col gap-1 mt-2">
                                    <SubStats
                                        label="Finishing"
                                        :rating="playerStats?.finishing"
                                    />
                                    <SubStats
                                        label="Shot Power"
                                        :rating="playerStats?.shot_power"
                                    />
                                </div>
                            </div>
                            <div class="col-span-1 flex flex-col">
                                <StatsTitle
                                    label="Physicality"
                                    :rating="playerStats?.physicality"
                                />
                                <StatsBar :rating="playerStats?.physicality" />
                                <div class="flex flex-col gap-1 mt-2">
                                    <SubStats
                                        label="Stamina"
                                        :rating="playerStats?.stamina"
                                    />
                                    <SubStats
                                        label="Strength"
                                        :rating="playerStats?.strength"
                                    />
                                    <SubStats
                                        label="Aggression"
                                        :rating="playerStats?.aggression"
                                    />
                                </div>
                            </div>
                            <div class="col-span-1 flex flex-col">
                                <StatsTitle
                                    label="Defending"
                                    :rating="playerStats?.defending"
                                />
                                <StatsBar :rating="playerStats?.defending" />

                                <div class="flex flex-col gap-1 mt-2">
                                    <SubStats
                                        label="Sliding Tackle"
                                        :rating="playerStats?.sliding_tackle"
                                    />
                                    <SubStats
                                        label="Interceptions"
                                        :rating="playerStats?.interceptions"
                                    />
                                </div>
                            </div>
                            <div class="col-span-1 flex flex-col">
                                <StatsTitle
                                    label="Dribbling"
                                    :rating="playerStats?.dribbling_stat"
                                />
                                <StatsBar
                                    :rating="playerStats?.dribbling_stat"
                                />
                                <div class="flex flex-col gap-1 mt-2">
                                    <SubStats
                                        label="Agility"
                                        :rating="playerStats?.agility"
                                    />
                                    <SubStats
                                        label="Ball Control"
                                        :rating="playerStats?.ball_control"
                                    />
                                    <SubStats
                                        label="Dribbling"
                                        :rating="playerStats?.dribbling"
                                    />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div
                        class="bg-secondary-dark rounded-lg p-4 md:mt-4 mt-2 flex flex-col gap-y-3"
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
