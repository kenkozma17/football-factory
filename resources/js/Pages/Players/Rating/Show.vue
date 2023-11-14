<script setup>
import { Head } from "@inertiajs/vue3";
import RatingForm from "@/Components/Players/Rating/RatingForm.vue";
import Wrapper from "@/Components/UI/Wrapper.vue";
import PublicLayout from "@/Layouts/PublicLayout.vue";

const props = defineProps({
    player: Object,
});
</script>
<template>
    <Head :title="'Rate ' + player.name" />
    <PublicLayout>
        <Wrapper>
            <RatingForm :player="player" />
        </Wrapper>
    </PublicLayout>
</template>
