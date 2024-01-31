<script>
export default {
    name: 'PatientsProfile'
}
</script>
<script setup>
import { Head } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';
</script>

<template>
    <AppLayout>

        <Head title="Historia Clínica" />
        <div class="flex items-center">
            <a :href="route('patients.index')">
                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m15 19-7-7 7-7" />
                </svg>
            </a>
            <h1 class="text-lg font-bold ms-4">Historia Clínica del Paciente</h1>
        </div>
    </AppLayout>
</template>