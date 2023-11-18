<script setup>
const props = defineProps({
    rating: {
        type: Number,
        default: 0,
    },
});

const getStatColor = (rating) => {
    if (rating < 50) {
        return "red";
    } else if (rating >= 50 && rating <= 74) {
        return "yellow";
    } else {
        return "green";
    }
};

const getBarStyles = (rating) => {
    return {
        backgroundColor: getStatColor(rating),
        width: `${rating}%`,
        height: "6px",
    };
};
</script>
<template>
    <div class="bg-dark w-full h-[6px] rounded-lg mt-1.5">
        <div :style="getBarStyles(props.rating)" class="rounded-lg"></div>
    </div>
</template>
