<script setup>
import { Head, Link } from "@inertiajs/vue3";
import Wrapper from "@/Components/UI/Wrapper.vue";
import PublicLayout from "@/Layouts/PublicLayout.vue";
import StarIcon from "@/Components/Icons/StarIcon.vue";

const props = defineProps({
    topPlayerStats: Array,
});
</script>
<template>
    <Head title="Player Leaderboards" />
    <PublicLayout>
        <Wrapper :small="true">
            <h1 class="my-8">Player Leaderboards</h1>
            <div class="flex flex-col gap-3">
                <template v-if="props.topPlayerStats.length">
                    <Link
                        :href="
                            '/player/' +
                            playerStat.user.id +
                            '/' +
                            playerStat.user.slugged_name
                        "
                        v-for="(playerStat, index) in props.topPlayerStats"
                    >
                        <div
                            class="bg-secondary-dark bg-opacity-75 hover:bg-opacity-100 rounded-3xl h-24 w-full grid md:grid-cols-2 grid-cols-3 py-1.5 px-5"
                        >
                            <div
                                class="md:col-span-1 col-span-2 flex items-center"
                            >
                                <p
                                    class="font-bold md:text-[1.5rem] text-[1.25rem]"
                                >
                                    {{ index + 1 }}
                                </p>
                                <img
                                    class="object-cover h-16 w-16 rounded-full ml-4"
                                    :src="playerStat.user.profile_photo_url"
                                    alt=""
                                />
                                <div class="ml-4">
                                    <p class="md:text-[1.25rem] text-sm">
                                        {{ playerStat.user.name }}
                                    </p>
                                    <p
                                        class="font-light text-gray-400 md:text-sm text-xs"
                                    >
                                        {{
                                            playerStat.user.player_bio.position
                                        }}
                                    </p>
                                </div>
                            </div>
                            <div
                                class="col-span-1 flex items-center justify-end gap-x-2"
                            >
                                <StarIcon class="md:w-full w-4" />
                                <p class="font-bold md:text-[1.5rem]">
                                    {{ playerStat.overall_rating }}
                                </p>
                            </div>
                        </div>
                    </Link>
                </template>
                <template v-else>
                    <p>No player ratings available yet.</p>
                </template>
            </div>
        </Wrapper>
    </PublicLayout>
</template>
