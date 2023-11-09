<script setup>
import { Head, Link } from "@inertiajs/vue3";
import Wrapper from "@/Components/UI/Wrapper.vue";
import PublicLayout from "@/Layouts/PublicLayout.vue";
import UserIcon from "@/Components/Icons/UserPlaceholderIcon.vue";
import StarIcon from "@/Components/Icons/StarIcon.vue";
</script>
<template>
    <Head title="Home" />
    <PublicLayout>
        <Wrapper :small="true">
            <div class="grid grid-cols-5 items-start gap-x-6 md:mt-32 mt-12">
                <section class="col-span-2 flex flex-col gap-y-4">
                    <div
                        class="bg-secondary-dark rounded-lg headshot flex items-end justify-center h-[300px] w-full relative"
                    >
                        <p
                            class="absolute top-5 left-5 font-bold text-[1.5rem]"
                        >
                            CM
                        </p>
                        <UserIcon />
                    </div>
                    <div class="description bg-secondary-dark rounded-lg p-4">
                        <div class="flex justify-between">
                            <p>Club</p>
                            <p class="font-bold">Real Madrid</p>
                        </div>
                        <div class="flex justify-between">
                            <p>Position</p>
                            <p class="font-bold">Center Midfielder</p>
                        </div>
                        <div class="flex justify-between">
                            <p>Age</p>
                            <p class="font-bold">26 years old</p>
                        </div>
                    </div>
                </section>
                <section class="col-span-3">
                    <div>
                        <div class="flex justify-between">
                            <h1 class="text-[2rem] font-bold">Luka Modric</h1>
                            <button
                                class="hover:opacity-75 flex items-center gap-x-2 bg-darkgreen text-white rounded-full px-5"
                            >
                                <StarIcon />
                                <span>Rate Player</span>
                            </button>
                        </div>
                        <p>Studies at Catanduanes State University</p>
                        <p>Lives in Virac, Catanduanes</p>
                    </div>
                    <div class="bg-secondary-dark rounded-lg p-4 md:mt-4">
                        <h2 class="text-[1.25rem] font-bold">Description</h2>
                        <p>
                            Lorem Ipsum is simply dummy text of the printing and
                            typesetting industry. Lorem Ipsum has been the
                            industry's standard dummy text ever since the 1500s,
                            when an unknown printer took a galley of type and
                            scrambled it to make a type specimen book. It has
                            survived not only five centuries, but also the leap
                            into electronic typesetting, remaining essentially
                            unchanged. It was popularised in the 1960s with the
                            release of Letraset sheets containing Lorem Ipsum
                            passages, and more recently with desktop publishing
                            software like Aldus PageMaker including versions of
                            Lorem Ipsum.
                        </p>
                    </div>
                    <div
                        class="bg-secondary-dark rounded-lg p-4 md:mt-4 flex flex-col gap-y-3"
                    >
                        <div class="flex flex-col">
                            <p>Highlights</p>
                            <p class="text-sm">
                                https://www.youtube.com/@romanelizaga
                            </p>
                        </div>
                        <div class="flex flex-col">
                            <p>Socials</p>
                            <p class="text-sm">IG TW</p>
                        </div>
                        <div class="flex flex-col">
                            <p>Phone</p>
                            <p class="text-sm">+63 969 042 6656</p>
                        </div>
                        <div class="flex flex-col">
                            <p>Email</p>
                            <p class="text-sm">name@example.com</p>
                        </div>
                    </div>
                </section>
            </div>
        </Wrapper>
    </PublicLayout>
</template>
