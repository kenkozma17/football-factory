<script setup>
import { Link } from "@inertiajs/vue3";
defineProps({
    links: Array,
});
</script>
<template>
    <div v-if="links.length > 3">
        <div class="flex flex-wrap -mb-1">
            <template v-for="(link, p) in links" :key="p">
                <div
                    v-if="link.url === null"
                    class="mr-1 mb-1 px-4 py-3 text-sm leading-4 text-black bg-white bg-opacity-60 hover:bg-opacity-100 rounded"
                    v-html="link.label"
                />
                <Link
                    v-else
                    class="mr-1 mb-1 px-4 py-3 text-sm leading-4 rounded bg-white text-black hover:bg-opacity-100"
                    :class="
                        link.active
                            ? 'bg-white text-black bg-opacity-100'
                            : 'bg-opacity-60'
                    "
                    :href="link.url"
                    v-html="link.label"
                />
            </template>
        </div>
    </div>
</template>
