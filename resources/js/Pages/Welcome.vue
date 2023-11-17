<script setup>
import { Head, Link } from "@inertiajs/vue3";
import Wrapper from "@/Components/UI/Wrapper.vue";
import SearchBar from "@/Components/Search/SearchBar.vue";
import PublicLayout from "@/Layouts/PublicLayout.vue";
import PlayerCard from "@/Components/Players/PlayerCard.vue";
import PaginationList from "@/Components/UI/PaginationList.vue";

const props = defineProps({
    players: Array,
    search: {
        type: String,
        default: "",
    },
});
</script>

<template>
    <Head title="Home" />
    <PublicLayout>
        <Wrapper class="md:mt-32 mt-12">
            <SearchBar :search="props.search"></SearchBar>
        </Wrapper>

        <Wrapper
            :small="true"
            class="md:mt-12 mt-6 grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-4"
        >
            <PlayerCard
                :player="player"
                v-for="player in players.data"
                :key="player.email"
            />
        </Wrapper>
        <Wrapper class="flex justify-center my-6">
            <PaginationList :links="players.links" />
        </Wrapper>
    </PublicLayout>
</template>
