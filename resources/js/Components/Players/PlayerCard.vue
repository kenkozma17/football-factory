<script setup>
import UserIcon from "@/Components/Icons/UserPlaceholderIcon.vue";
import LocationIcon from "@/Components/Icons/LocationIcon.vue";
import CalendarIcon from "@/Components/Icons/CalendarIcon.vue";
import CrestIcon from "@/Components/Icons/CrestIcon.vue";
import SchoolIcon from "@/Components/Icons/SchoolIcon.vue";
import { Link } from "@inertiajs/vue3";

const props = defineProps({
    player: Object,
});
</script>
<template>
    <Link
        :href="'/player/' + player.id + '/' + player.slugged_name"
        class="bg-tertiary-dark rounded-xl"
    >
        <div
            class="headshot bg-secondary-dark flex justify-center relative rounded-tl-xl rounded-tr-xl"
        >
            <div
                class="absolute top-3 left-3 bg-black bg-opacity-80 rounded-full w-[3.125rem] h-[3.125rem] flex items-center justify-center text-center"
            >
                <p class="font-bold text-[1.5rem]">
                    {{ props.player.player_bio.short_position }}
                </p>
            </div>
            <img
                v-if="props.player.profile_photo_url"
                class="object-cover w-full h-60 rounded-tl-xl rounded-tr-xl"
                :src="props.player.profile_photo_url"
                alt=""
            />
            <UserIcon v-else />
        </div>
        <div class="bg-tertiary-dark p-3 rounded-bl-xl rounded-br-xl">
            <h2 class="text-[1.25rem] font-bold">{{ props.player.name }}</h2>
            <div class="text-[.85rem] flex flex-col gap-y-1 md:mt-1 h-full">
                <div class="flex items-center gap-x-2">
                    <LocationIcon />
                    <p>{{ props.player.player_bio.location }}</p>
                </div>
                <div class="flex items-center gap-x-2">
                    <CalendarIcon />
                    <p>
                        {{ props.player.player_bio.birthday }} ({{
                            props.player.player_bio.age
                        }}
                        years old)
                    </p>
                </div>
                <div class="flex items-center gap-x-2">
                    <CrestIcon />
                    <p>{{ props.player.player_bio.current_club }}</p>
                </div>
                <div
                    class="flex items-center gap-x-2"
                    v-if="props.player.player_bio?.current_school"
                >
                    <SchoolIcon />
                    <p>{{ props.player.player_bio.current_school }}</p>
                </div>
            </div>
        </div>
    </Link>
</template>
