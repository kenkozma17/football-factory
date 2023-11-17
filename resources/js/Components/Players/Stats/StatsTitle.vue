<script setup>
const props = defineProps({
    label: String,
    rating: {
        type: Number,
        default: 0,
    },
});

const getStatColor = (rating) => {
    if (rating < 50) {
        return "red";
    } else if (rating >= 51 && rating <= 74) {
        return "yellow";
    } else {
        return "green";
    }
};
</script>
<template>
    <div class="flex justify-between">
        <p class="font-bold text-[1.10rem]">{{ props.label }}</p>
        <p class="font-semibold" :style="{ color: getStatColor(props.rating) }">
            {{ props.rating }}
        </p>
    </div>
</template>
