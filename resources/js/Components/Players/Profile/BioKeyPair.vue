<script setup>
const props = defineProps({
    label: String,
    value: String,
});
</script>
<template>
    <div class="flex justify-between" v-if="props.value">
        <p class="font-semibold">{{ props.label }}</p>
        <p>
            {{ props.value }}
        </p>
    </div>
</template>
