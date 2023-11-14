<script setup>
import Wrapper from "@/Components/UI/Wrapper.vue";
import { ref, computed } from "vue";
const props = defineProps({
    player: Object,
});

const page1 = ref(null);
const page2 = ref(null);
const page3 = ref(null);
const page4 = ref(null);
const page5 = ref(null);
const page6 = ref(null);

const submitRating = () => {};
</script>
<template>
    <section class="relative h-screen overflow-hidden scroll-smooth">
        <div class="bg-secondary-dark bottom-0 left-0 right-0 fixed py-3 z-50">
            <Wrapper class="relative flex justify-between">
                <h2>Rate {{ props.player.name }}</h2>
            </Wrapper>
        </div>

        <!-- Pace Rating -->
        <div class="h-screen pt-20" ref="page1">
            <div>
                <h2 class="">
                    <span class="font-light">a.</span> Pace
                    <span
                        class="text-[1.5rem] bg-white text-black rounded-full px-3 py-2"
                        >{{ props.player.name }}</span
                    >
                </h2>
                <div class="mt-2">
                    <p class="md:text-[1.5rem]">Acceleration</p>
                    <div class="flex md:gap-x-2 gap-x-1 md:my-4 mt-2 mb-4">
                        <span
                            class="transition-all transform hover:-translate-y-2 md:text-[1.75rem] text-sm bg-white bg-opacity-50 hover:bg-opacity-100 text-dark md:px-6 md:py-4 px-2 py-1 cursor-pointer rounded"
                            v-for="number in 10"
                            >{{ number }}</span
                        >
                    </div>
                </div>
                <div class="mt-2">
                    <p class="md:text-[1.5rem]">Sprint Speed</p>
                    <div class="flex md:gap-x-2 gap-x-1 md:my-4 mt-2 mb-4">
                        <span
                            class="transition-all transform hover:-translate-y-2 md:text-[1.75rem] text-sm bg-white bg-opacity-50 hover:bg-opacity-100 text-dark md:px-6 md:py-4 px-2 py-1 cursor-pointer rounded"
                            v-for="number in 10"
                            >{{ number }}</span
                        >
                    </div>
                </div>
                <div class="flex gap-x-2">
                    <a
                        @click="page2.scrollIntoView()"
                        class="bg-white cursor-pointer hover:opacity-80 text-black md:px-6 md:py-2 px-4 py-1 md:text-base text-sm rounded-lg"
                    >
                        Next
                    </a>
                </div>
            </div>
        </div>

        <!-- Passing Rating -->
        <div class="h-screen pt-20" ref="page2">
            <div>
                <h2 class=""><span class="font-light">b.</span> Passing</h2>
                <div class="mt-2">
                    <p class="md:text-[1.5rem]">Vision</p>
                    <div class="flex md:gap-x-2 gap-x-1 md:my-4 mt-2 mb-4">
                        <span
                            class="transition-all transform hover:-translate-y-2 md:text-[1.75rem] text-sm bg-white bg-opacity-50 hover:bg-opacity-100 text-dark md:px-6 md:py-4 px-2 py-1 cursor-pointer rounded"
                            v-for="number in 10"
                            >{{ number }}</span
                        >
                    </div>
                </div>
                <div class="mt-2">
                    <p class="md:text-[1.5rem]">Crossing</p>
                    <div class="flex md:gap-x-2 gap-x-1 md:my-4 mt-2 mb-4">
                        <span
                            class="transition-all transform hover:-translate-y-2 md:text-[1.75rem] text-sm bg-white bg-opacity-50 hover:bg-opacity-100 text-dark md:px-6 md:py-4 px-2 py-1 cursor-pointer rounded"
                            v-for="number in 10"
                            >{{ number }}</span
                        >
                    </div>
                </div>
                <div class="mt-2">
                    <p class="md:text-[1.5rem]">Short Pass</p>
                    <div class="flex md:gap-x-2 gap-x-1 md:my-4 mt-2 mb-4">
                        <span
                            class="transition-all transform hover:-translate-y-2 md:text-[1.75rem] text-sm bg-white bg-opacity-50 hover:bg-opacity-100 text-dark md:px-6 md:py-4 px-2 py-1 cursor-pointer rounded"
                            v-for="number in 10"
                            >{{ number }}</span
                        >
                    </div>
                </div>
                <div class="flex gap-x-2">
                    <a
                        @click="page1.scrollIntoView()"
                        class="bg-white cursor-pointer hover:opacity-80 text-black md:px-6 md:py-2 px-4 py-1 md:text-base text-sm rounded-lg"
                    >
                        Back
                    </a>
                    <a
                        @click="page3.scrollIntoView()"
                        class="bg-white cursor-pointer hover:opacity-80 text-black md:px-6 md:py-2 px-4 py-1 md:text-base text-sm rounded-lg"
                    >
                        Next
                    </a>
                </div>
            </div>
        </div>

        <!-- Shooting Rating -->
        <div class="h-screen pt-20" ref="page3">
            <div>
                <h2 class=""><span class="font-light">c.</span> Shooting</h2>
                <div class="mt-2">
                    <p class="md:text-[1.5rem]">Finishing</p>
                    <div class="flex md:gap-x-2 gap-x-1 md:my-4 mt-2 mb-4">
                        <span
                            class="transition-all transform hover:-translate-y-2 md:text-[1.75rem] text-sm bg-white bg-opacity-50 hover:bg-opacity-100 text-dark md:px-6 md:py-4 px-2 py-1 cursor-pointer rounded"
                            v-for="number in 10"
                            >{{ number }}</span
                        >
                    </div>
                </div>
                <div class="mt-2">
                    <p class="md:text-[1.5rem]">Shot Power</p>
                    <div class="flex md:gap-x-2 gap-x-1 md:my-4 mt-2 mb-4">
                        <span
                            class="transition-all transform hover:-translate-y-2 md:text-[1.75rem] text-sm bg-white bg-opacity-50 hover:bg-opacity-100 text-dark md:px-6 md:py-4 px-2 py-1 cursor-pointer rounded"
                            v-for="number in 10"
                            >{{ number }}</span
                        >
                    </div>
                </div>
                <div class="flex gap-x-2">
                    <a
                        @click="page2.scrollIntoView()"
                        class="bg-white cursor-pointer hover:opacity-80 text-black md:px-6 md:py-2 px-4 py-1 md:text-base text-sm rounded-lg"
                    >
                        Back
                    </a>
                    <a
                        @click="page4.scrollIntoView()"
                        class="bg-white cursor-pointer hover:opacity-80 text-black md:px-6 md:py-2 px-4 py-1 md:text-base text-sm rounded-lg"
                    >
                        Next
                    </a>
                </div>
            </div>
        </div>

        <!-- Physicality Rating -->
        <div class="h-screen pt-20" ref="page4">
            <div>
                <h2 class=""><span class="font-light">d.</span> Physicality</h2>
                <div class="mt-2">
                    <p class="md:text-[1.5rem]">Stamina</p>
                    <div class="flex md:gap-x-2 gap-x-1 md:my-4 mt-2 mb-4">
                        <span
                            class="transition-all transform hover:-translate-y-2 md:text-[1.75rem] text-sm bg-white bg-opacity-50 hover:bg-opacity-100 text-dark md:px-6 md:py-4 px-2 py-1 cursor-pointer rounded"
                            v-for="number in 10"
                            >{{ number }}</span
                        >
                    </div>
                </div>
                <div class="mt-2">
                    <p class="md:text-[1.5rem]">Strength</p>
                    <div class="flex md:gap-x-2 gap-x-1 md:my-4 mt-2 mb-4">
                        <span
                            class="transition-all transform hover:-translate-y-2 md:text-[1.75rem] text-sm bg-white bg-opacity-50 hover:bg-opacity-100 text-dark md:px-6 md:py-4 px-2 py-1 cursor-pointer rounded"
                            v-for="number in 10"
                            >{{ number }}</span
                        >
                    </div>
                </div>
                <div class="mt-2">
                    <p class="md:text-[1.5rem]">Aggression</p>
                    <div class="flex md:gap-x-2 gap-x-1 md:my-4 mt-2 mb-4">
                        <span
                            class="transition-all transform hover:-translate-y-2 md:text-[1.75rem] text-sm bg-white bg-opacity-50 hover:bg-opacity-100 text-dark md:px-6 md:py-4 px-2 py-1 cursor-pointer rounded"
                            v-for="number in 10"
                            >{{ number }}</span
                        >
                    </div>
                </div>
                <div class="flex gap-x-2">
                    <a
                        @click="page3.scrollIntoView()"
                        class="bg-white cursor-pointer hover:opacity-80 text-black md:px-6 md:py-2 px-4 py-1 md:text-base text-sm rounded-lg"
                    >
                        Back
                    </a>
                    <a
                        @click="page5.scrollIntoView()"
                        class="bg-white cursor-pointer hover:opacity-80 text-black md:px-6 md:py-2 px-4 py-1 md:text-base text-sm rounded-lg"
                    >
                        Next
                    </a>
                </div>
            </div>
        </div>

        <!-- Defending Rating -->
        <div class="h-screen pt-20" ref="page5">
            <div>
                <h2 class=""><span class="font-light">e.</span> Defending</h2>
                <div class="mt-2">
                    <p class="md:text-[1.5rem]">Sliding Tackle</p>
                    <div class="flex md:gap-x-2 gap-x-1 md:my-4 mt-2 mb-4">
                        <span
                            class="transition-all transform hover:-translate-y-2 md:text-[1.75rem] text-sm bg-white bg-opacity-50 hover:bg-opacity-100 text-dark md:px-6 md:py-4 px-2 py-1 cursor-pointer rounded"
                            v-for="number in 10"
                            >{{ number }}</span
                        >
                    </div>
                </div>
                <div class="mt-2">
                    <p class="md:text-[1.5rem]">Interceptions</p>
                    <div class="flex md:gap-x-2 gap-x-1 md:my-4 mt-2 mb-4">
                        <span
                            class="transition-all transform hover:-translate-y-2 md:text-[1.75rem] text-sm bg-white bg-opacity-50 hover:bg-opacity-100 text-dark md:px-6 md:py-4 px-2 py-1 cursor-pointer rounded"
                            v-for="number in 10"
                            >{{ number }}</span
                        >
                    </div>
                </div>
                <div class="flex gap-x-2">
                    <a
                        @click="page4.scrollIntoView()"
                        class="bg-white cursor-pointer hover:opacity-80 text-black md:px-6 md:py-2 px-4 py-1 md:text-base text-sm rounded-lg"
                    >
                        Back
                    </a>
                    <a
                        @click="page6.scrollIntoView()"
                        class="bg-white cursor-pointer hover:opacity-80 text-black md:px-6 md:py-2 px-4 py-1 md:text-base text-sm rounded-lg"
                    >
                        Next
                    </a>
                </div>
            </div>
        </div>

        <!-- Dribbling Rating -->
        <div class="h-screen pt-20" ref="page6">
            <div>
                <h2 class=""><span class="font-light">f.</span> Dribbling</h2>
                <div class="mt-2">
                    <p class="md:text-[1.5rem]">Agility</p>
                    <div class="flex md:gap-x-2 gap-x-1 md:my-4 mt-2 mb-4">
                        <span
                            class="transition-all transform hover:-translate-y-2 md:text-[1.75rem] text-sm bg-white bg-opacity-50 hover:bg-opacity-100 text-dark md:px-6 md:py-4 px-2 py-1 cursor-pointer rounded"
                            v-for="number in 10"
                            >{{ number }}</span
                        >
                    </div>
                </div>
                <div class="mt-2">
                    <p class="md:text-[1.5rem]">Ball Control</p>
                    <div class="flex md:gap-x-2 gap-x-1 md:my-4 mt-2 mb-4">
                        <span
                            class="transition-all transform hover:-translate-y-2 md:text-[1.75rem] text-sm bg-white bg-opacity-50 hover:bg-opacity-100 text-dark md:px-6 md:py-4 px-2 py-1 cursor-pointer rounded"
                            v-for="number in 10"
                            >{{ number }}</span
                        >
                    </div>
                </div>
                <div class="mt-2">
                    <p class="md:text-[1.5rem]">Dribbling</p>
                    <div class="flex md:gap-x-2 gap-x-1 md:my-4 mt-2 mb-4">
                        <span
                            class="transition-all transform hover:-translate-y-2 md:text-[1.75rem] text-sm bg-white bg-opacity-50 hover:bg-opacity-100 text-dark md:px-6 md:py-4 px-2 py-1 cursor-pointer rounded"
                            v-for="number in 10"
                            >{{ number }}</span
                        >
                    </div>
                </div>
                <div class="flex gap-x-2">
                    <a
                        @click="page5.scrollIntoView()"
                        class="bg-white cursor-pointer hover:opacity-80 text-black md:px-6 md:py-2 px-4 py-1 md:text-base text-sm rounded-lg"
                    >
                        Back
                    </a>
                    <a
                        @click="submitRating"
                        class="bg-white cursor-pointer hover:opacity-80 text-black md:px-6 md:py-2 px-4 py-1 md:text-base text-sm rounded-lg"
                    >
                        Submit
                    </a>
                </div>
            </div>
        </div>
    </section>
</template>
