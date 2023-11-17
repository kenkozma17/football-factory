<script setup>
const props = defineProps({
    label: String,
    rating: {
        type: Number,
        default: 0,
    },
});
</script>
<template>
    <div class="flex justify-between">
        <p class="text-sm">{{ props.label }}</p>
        <p class="text-sm">
            {{ Math.round(props.rating) }}
        </p>
    </div>
</template>
