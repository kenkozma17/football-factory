<script setup></script>
<template>
    <section>
        <h1 class="text-center">
            Discover Talented Footballers of The Philippines
        </h1>
        <div
            class="rounded-xl mt-3 bg-secondary-dark py-4 px-4 lg:w-[800px] md:w-[650px] w-full mx-auto relative"
        >
            <div class="w-full">
                <input
                    type="text"
                    class="bg-dark border-dark rounded-lg col-span-5 w-full"
                    placeholder="John Terry"
                />
            </div>
            <div class="mt-3 grid grid-cols-3 gap-x-3">
                <select name="" id="" class="bg-dark border-dark rounded-lg">
                    <option value="">Region 1</option>
                </select>
                <select name="" id="" class="bg-dark border-dark rounded-lg">
                    <option value="">Catanduanes</option>
                </select>
                <select name="" id="" class="bg-dark border-dark rounded-lg">
                    <option value="">Defender</option>
                </select>
            </div>
            <div class="flex justify-end mt-3">
                <button
                    class="bg-white rounded-lg w-full hover:opacity-75 text-black py-2 px-10 col-span-1"
                >
                    Search
                </button>
            </div>
        </div>
    </section>
</template>
