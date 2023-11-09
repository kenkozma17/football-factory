<script setup>
import UserIcon from "@/Components/Icons/UserPlaceholderIcon.vue";
import LocationIcon from "@/Components/Icons/LocationIcon.vue";
import CalendarIcon from "@/Components/Icons/CalendarIcon.vue";
import CrestIcon from "@/Components/Icons/CrestIcon.vue";
import SchoolIcon from "@/Components/Icons/SchoolIcon.vue";
</script>
<template>
    <div class="bg-secondary-dark rounded-xl">
        <div class="headshot flex justify-center pt-6 relative">
            <p class="absolute top-5 left-5 font-bold text-[1.5rem]">CM</p>
            <UserIcon />
        </div>
        <div class="bg-tertiary-dark p-3 rounded-bl-xl rounded-br-xl">
            <h2 class="text-[1.25rem] font-bold">Luka Modric</h2>
            <div class="text-[.85rem] flex flex-col gap-y-1 md:mt-1">
                <div class="flex items-center gap-x-2">
                    <LocationIcon />
                    <p>Virac, Catanduanes</p>
                </div>
                <div class="flex items-center gap-x-2">
                    <CalendarIcon />
                    <p>December 27, 1996 (26 years old)</p>
                </div>
                <div class="flex items-center gap-x-2">
                    <CrestIcon />
                    <p>Real Madrid FC</p>
                </div>
                <div class="flex items-center gap-x-2">
                    <SchoolIcon />
                    <p>Catanduanes State University</p>
                </div>
            </div>
        </div>
    </div>
</template>
