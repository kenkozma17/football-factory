<script setup>
import Wrapper from "@/Components/UI/Wrapper.vue";
import RatingSelector from "@/Components/Players/Rating/RatingSelector.vue";
import RatingNavigationBtn from "@/Components/Players/Rating/RatingNavigationBtn.vue";
import CheckIcon from "@/Components/Icons/CheckIcon.vue";
import InputError from "@/Components/InputError.vue";
import LoaderIcon from "@/Components/Icons/LoaderIcon.vue";
import { useForm, Link } from "@inertiajs/vue3";

import { ref, computed } from "vue";
const props = defineProps({
    player: Object,
});

const form = useForm({
    acceleration: null,
    sprint_speed: null,
    vision: null,
    crossing: null,
    short_pass: null,
    finishing: null,
    shot_power: null,
    stamina: null,
    strength: null,
    aggression: null,
    sliding_tackle: null,
    interceptions: null,
    agility: null,
    ball_control: null,
    dribbling: null,
});

const page1 = ref(null);
const page2 = ref(null);
const page3 = ref(null);
const page4 = ref(null);
const page5 = ref(null);
const page6 = ref(null);
const success = ref(null);
const loading = ref(false);

const submitRating = () => {
    loading.value = true;
    form.post(route("player-rating.create", props.player.id), {
        errorBag: "createPlayerRating",
        preserveScroll: true,
        onFinish: () => (loading.value = false),
        onSuccess: () => {
            success.value.scrollIntoView();
        },
    });
};
</script>
<template>
    <section class="relative h-screen overflow-hidden scroll-smooth">
        <div class="bg-secondary-dark bottom-0 left-0 right-0 fixed py-3 z-50">
            <Wrapper class="relative flex justify-between">
                <h2>Rate {{ props.player.name }}</h2>
            </Wrapper>
        </div>

        <!-- Pace Rating -->
        <div class="h-screen flex items-center" ref="page1">
            <div>
                <h2>
                    <span class="font-light">a.</span>
                    Pace
                </h2>

                <RatingSelector
                    v-model="form.acceleration"
                    label="Acceleration"
                />
                <RatingSelector
                    v-model="form.sprint_speed"
                    label="Sprint Speed"
                />

                <div class="flex gap-x-2">
                    <RatingNavigationBtn
                        :disabled="!(form.acceleration && form.sprint_speed)"
                        @click="page2.scrollIntoView()"
                        >Next
                    </RatingNavigationBtn>
                </div>
            </div>
        </div>

        <!-- Passing Rating -->
        <div class="h-screen flex items-center" ref="page2">
            <div>
                <h2 class=""><span class="font-light">b.</span> Passing</h2>

                <RatingSelector v-model="form.vision" label="Vision" />
                <RatingSelector v-model="form.crossing" label="Crossing" />
                <RatingSelector v-model="form.short_pass" label="Short Pass" />

                <div class="flex gap-x-2">
                    <RatingNavigationBtn @click="page1.scrollIntoView()"
                        >Back
                    </RatingNavigationBtn>
                    <RatingNavigationBtn
                        :disabled="
                            !(form.vision && form.crossing && form.short_pass)
                        "
                        @click="page3.scrollIntoView()"
                        >Next
                    </RatingNavigationBtn>
                </div>
            </div>
        </div>

        <!-- Shooting Rating -->
        <div class="h-screen flex items-center" ref="page3">
            <div>
                <h2 class=""><span class="font-light">c.</span> Shooting</h2>
                <RatingSelector v-model="form.finishing" label="Finishing" />
                <RatingSelector v-model="form.shot_power" label="Shot Power" />
                <div class="flex gap-x-2">
                    <RatingNavigationBtn @click="page2.scrollIntoView()"
                        >Back
                    </RatingNavigationBtn>
                    <RatingNavigationBtn
                        :disabled="!(form.finishing && form.shot_power)"
                        @click="page4.scrollIntoView()"
                        >Next
                    </RatingNavigationBtn>
                </div>
            </div>
        </div>

        <!-- Physicality Rating -->
        <div class="h-screen flex items-center" ref="page4">
            <div>
                <h2 class=""><span class="font-light">d.</span> Physicality</h2>
                <RatingSelector v-model="form.stamina" label="Stamina" />
                <RatingSelector v-model="form.strength" label="Strength" />
                <RatingSelector v-model="form.aggression" label="Aggression" />
                <div class="flex gap-x-2">
                    <RatingNavigationBtn @click="page3.scrollIntoView()"
                        >Back
                    </RatingNavigationBtn>
                    <RatingNavigationBtn
                        :disabled="
                            !(form.stamina && form.strength && form.aggression)
                        "
                        @click="page5.scrollIntoView()"
                        >Next
                    </RatingNavigationBtn>
                </div>
            </div>
        </div>

        <!-- Defending Rating -->
        <div class="h-screen flex items-center" ref="page5">
            <div>
                <h2 class=""><span class="font-light">e.</span> Defending</h2>
                <RatingSelector
                    v-model="form.sliding_tackle"
                    label="Sliding Tackle"
                />
                <RatingSelector
                    v-model="form.interceptions"
                    label="Interceptions"
                />

                <div class="flex gap-x-2">
                    <RatingNavigationBtn @click="page4.scrollIntoView()"
                        >Back
                    </RatingNavigationBtn>
                    <RatingNavigationBtn
                        :disabled="!(form.sliding_tackle && form.interceptions)"
                        @click="page6.scrollIntoView()"
                        >Next
                    </RatingNavigationBtn>
                </div>
            </div>
        </div>

        <!-- Dribbling Rating -->
        <div class="h-screen flex items-center" ref="page6">
            <div>
                <h2 class=""><span class="font-light">f.</span> Dribbling</h2>
                <RatingSelector v-model="form.agility" label="Agility" />
                <RatingSelector
                    v-model="form.ball_control"
                    label="Ball Control"
                />
                <RatingSelector v-model="form.dribbling" label="Dribbling" />
                <div class="flex gap-x-2">
                    <RatingNavigationBtn @click="page5.scrollIntoView()"
                        >Back
                    </RatingNavigationBtn>
                    <RatingNavigationBtn
                        :disabled="
                            !(
                                form.agility &&
                                form.ball_control &&
                                form.dribbling
                            )
                        "
                        @click="submitRating"
                    >
                        <span v-if="!loading">Submit Rating</span
                        ><LoaderIcon v-else />
                    </RatingNavigationBtn>
                </div>
                <InputError
                    :message="form.errors.rating_exists_already"
                    class="mt-2"
                />
            </div>
        </div>

        <!-- Success Message -->
        <div class="h-screen flex items-center" ref="success">
            <div>
                <div class="flex gap-x-4 items-center">
                    <CheckIcon class="w-12 h-12" />
                    <h2>Player Rating Submitted Successfully!</h2>
                </div>
                <div class="md:my-8 my-4">
                    <Link
                        href="/"
                        class="bg-white cursor-pointer hover:opacity-80 disabled:opacity-30 text-black md:px-6 md:py-2 px-4 py-1 md:text-base text-sm rounded-lg"
                    >
                        Go Home
                    </Link>
                </div>
            </div>
        </div>
    </section>
</template>
