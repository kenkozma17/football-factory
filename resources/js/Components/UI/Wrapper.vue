<script setup>
defineProps({
    small: {
        type: Boolean,
        default: false,
    },
});
</script>
<template>
    <section
        :class="small ? 'max-w-[1044px]' : 'max-w-[1240px]'"
        class="mx-auto md:px-10 px-4"
    >
        <slot></slot>
    </section>
</template>
