<script setup>
import { ref, defineEmits } from "vue";

const emit = defineEmits(["update:modelValue"]);
const selectedRate = ref(0);
const props = defineProps({
    label: String,
});

const handleRateSelection = (rating) => {
    selectedRate.value = rating;
    emit("update:modelValue", selectedRate.value);
};
</script>
<template>
    <div>
        <div class="mt-2">
            <p class="md:text-[1.5rem]">{{ props.label }}</p>
            <div class="flex md:gap-x-2 gap-x-1 md:my-4 mt-2 mb-4">
                <button
                    @click="handleRateSelection(number)"
                    :class="
                        selectedRate === number
                            ? 'bg-opacity-100 -translate-y-2'
                            : 'bg-opacity-50'
                    "
                    class="transition-all transform hover:-translate-y-2 md:text-[1.75rem] text-sm bg-white hover:bg-opacity-100 text-dark md:px-6 md:py-4 px-2 py-1 cursor-pointer rounded"
                    v-for="number in 10"
                >
                    {{ number }}
                </button>
            </div>
        </div>
    </div>
</template>
