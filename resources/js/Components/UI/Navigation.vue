<script setup>
import Wrapper from "@/Components/UI/Wrapper.vue";
import Logo from "@/Components/Icons/Logo.vue";
import { Link, router } from "@inertiajs/vue3";
import { computed, ref } from "vue";
import CloseIcon from "../Icons/CloseIcon.vue";

const showMenu = ref(false);

const isNavFixed = computed(() => {
    return router.page.url.includes("rate-player");
});

const logout = () => {
    router.post(route("logout"));
};

const toggleMobileMenu = (show) =>
    show ? (showMenu.value = true) : (showMenu.value = false);
</script>
<template>
    <nav
        class="md:my-6 my-3"
        :class="{ 'fixed top-0 right-0 left-0 z-50': isNavFixed }"
    >
        <Wrapper class="flex justify-between items-center">
            <div class="flex md:gap-x-8 gap-x-2 items-center">
                <Link href="/">
                    <Logo class="md:w-full w-48" />
                </Link>
                <!-- <Link class="hover:opacity-100 opacity-75" href="/about"
                    >About</Link
                > -->
                <Link
                    class="hover:opacity-100 opacity-75 md:block hidden"
                    href="/leaderboards"
                    >Leaderboards</Link
                >
            </div>
            <div
                v-if="$page.props.auth.user"
                class="md:gap-x-4 items-center md:flex hidden"
            >
                <Link
                    href="/user/profile"
                    class="hover:opacity-75 md:text-base text-sm"
                    >{{ $page.props.auth.user.name }}</Link
                >
                <form @submit.prevent="logout" class="md:flex hidden">
                    <button
                        class="bg-white transition-colors text-black px-3 py-1 rounded-full hover:bg-opacity-75"
                    >
                        Log Out
                    </button>
                </form>
            </div>
            <div v-else class="md:flex hidden gap-x-4 items-center">
                <Link class="opacity-75" href="/register">Sign Up</Link>
                <Link
                    class="bg-white transition-colors text-black px-3 py-1 rounded-full hover:bg-opacity-75"
                    href="/login"
                    >Login</Link
                >
            </div>

            <div class="md:hidden flex gap-x-2.5 items-center ml-3">
                <template v-if="!$page.props.auth.user">
                    <Link class="opacity-75 text-sm" href="/register"
                        >Sign Up</Link
                    >
                    <Link
                        class="bg-white transition-colors text-black px-3 py-1 rounded-full hover:bg-opacity-75 text-sm"
                        href="/login"
                        >Login</Link
                    >
                </template>

                <template v-if="$page.props.auth.user">
                    <Link
                        href="/user/profile"
                        class="hover:opacity-75 md:text-base text-sm"
                        >{{ $page.props.auth.user.name }}</Link
                    >
                </template>

                <div
                    class="space-y-2 cursor-pointer"
                    @click="toggleMobileMenu(true)"
                >
                    <div class="w-8 h-0.5 bg-white"></div>
                    <div class="w-8 h-0.5 bg-white"></div>
                    <div class="w-8 h-0.5 bg-white"></div>
                </div>
            </div>

            <!-- Mobile Menu -->
            <div
                :class="showMenu ? 'w-full' : 'left-[100%]'"
                class="absolute top-0 bottom-0 left-0 duration-700 transition-all w-0 h-full bg-dark z-50 p-10"
            >
                <div class="flex justify-between">
                    <Link href="/">
                        <Logo />
                    </Link>
                    <button @click="toggleMobileMenu(false)">
                        <CloseIcon class="w-6 h-6" />
                    </button>
                </div>
                <div class="my-10 flex flex-col space-y-2">
                    <template v-if="$page.props.auth.user">
                        <Link
                            href="/user/profile"
                            class="hover:opacity-75 text-[1.25rem]"
                            >My Account ({{ $page.props.auth.user.name }})</Link
                        >
                    </template>
                    <Link
                        class="hover:opacity-100 opacity-75 text-[1.25rem]"
                        href="/leaderboards"
                        >Leaderboards</Link
                    >

                    <template v-if="$page.props.auth.user">
                        <form @submit.prevent="logout">
                            <button
                                class="hover:opacity-100 opacity-75 text-white text-[1.25rem]"
                            >
                                Log Out
                            </button>
                        </form>
                    </template>

                    <template v-if="!$page.props.auth.user">
                        <Link
                            class="hover:opacity-100 opacity-75 text-white text-[1.25rem]"
                            href="/register"
                            >Sign Up</Link
                        >
                        <Link
                            class="hover:opacity-100 opacity-75 text-white text-[1.25rem]"
                            href="/login"
                            >Login</Link
                        >
                    </template>
                </div>
            </div>
        </Wrapper>
    </nav>
</template>
