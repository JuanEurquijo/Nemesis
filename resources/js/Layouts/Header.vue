<template>
    <header class="flex items-center justify-between border-b-4 border-cyan-700 bg-white px-6 py-4">
        <div class="flex items-center">
            <button @click="$page.props.showingMobileMenu = !$page.props.showingMobileMenu" class="text-gray-500 focus:outline-none lg:hidden">
                <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M4 6H20M4 12H20M4 18H11" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </button>
        </div>

        <div class="flex items-center">
            <dropdown>
                <template #trigger>
                    <button @click="dropdownOpen = ! dropdownOpen" class="relative block overflow-hidden text-base text-gray-500 dark:text-gray-300">
                        {{ $page.props.auth.user.name + ' ' + $page.props.auth.user.lastname + ' - ' + $page.props.auth.user.specialty}}
                    </button>
                </template>

                <template #content>
                    <dropdown-link :href="route('profile.show')">
                        Perfil
                    </dropdown-link>

                    <div class="border-t border-gray-200" />

                    <form method="POST" @submit.prevent="logout">
                       <dropdown-link as="button">
                        Cerrar Sesión
                        </dropdown-link >
                    </form>

                </template>
            </dropdown>
        </div>
    </header>
</template>

<script setup>
import { router } from '@inertiajs/vue3';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';

const logout = () => {
    router.post(route('logout'));
};
</script>
