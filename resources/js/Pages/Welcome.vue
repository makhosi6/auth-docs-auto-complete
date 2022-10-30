<script setup>
import { Head, Link } from "@inertiajs/inertia-vue3";
import Welcome from "@/Components/Welcome.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
});
</script>

<template>
    <!-- <Head title="Welcome" /> -->
    <template>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard
        </h2>
    </template>
    <div
        class="relative flex items-top justify-center min-h-screen bg-gray-100 sm:items-center sm:pt-0"
    >
        <div
            v-if="canLogin"
            class="fixed flex min-w-full justify-end items-end bg-gray-100 top-0 right-0 px-6 py-4"
        >
            <Link v-if="$page.props.user" :href="route('dashboard')">
                <PrimaryButton class="mx-4"> Dashboard </PrimaryButton>
            </Link>
            <template v-else>
                <div class="top-0 right-0 flex max-w-max">
                    <Link :href="route('login')">
                        <PrimaryButton> Log in </PrimaryButton>
                    </Link>
                    <Link class="ml-2" v-if="canRegister" :href="route('register')">
                        <SecondaryButton> Register </SecondaryButton>
                    </Link>
                </div>
            </template>
        </div>

        <div class="max-w-6xl mx-auto pt-8 sm:px-6 lg:px-8">
            <div class="flex justify-center pt-2 sm:justify-start">
                <div class="bg-white shadow-xl sm:rounded-lg">
                    <Welcome />
                </div>
            </div>
        </div>
    </div>
</template>
