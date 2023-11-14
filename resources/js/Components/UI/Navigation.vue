<script setup>
import Wrapper from "@/Components/UI/Wrapper.vue";
import Logo from "@/Components/Icons/Logo.vue";
import { Link, router } from "@inertiajs/vue3";

const logout = () => {
    router.post(route("logout"));
};
</script>
<template>
    <nav class="md:my-6 my-3">
        <Wrapper class="flex justify-between items-center">
            <div class="flex gap-x-8 items-center">
                <Link href="/">
                    <Logo />
                </Link>
                <Link class="hover:opacity-100 opacity-75" href="/about"
                    >About</Link
                >
                <Link class="hover:opacity-100 opacity-75" href="/leaderboards"
                    >Leaderboards</Link
                >
            </div>
            <div v-if="$page.props.auth.user" class="flex gap-x-4 items-center">
                <Link href="/user/profile" class="hover:opacity-75">{{
                    $page.props.auth.user.name
                }}</Link>
                <form @submit.prevent="logout">
                    <button
                        class="bg-white transition-colors text-black px-3 py-1 rounded-full hover:bg-opacity-75"
                    >
                        Log Out
                    </button>
                </form>
            </div>
            <div v-else class="flex gap-x-4 items-center">
                <Link class="opacity-75" href="/register">Sign Up</Link>
                <Link
                    class="bg-white transition-colors text-black px-3 py-1 rounded-full hover:bg-opacity-75"
                    href="/login"
                    >Login</Link
                >
            </div>
        </Wrapper>
    </nav>
</template>
