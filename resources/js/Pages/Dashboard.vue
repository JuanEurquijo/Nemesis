<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'
import { Head } from '@inertiajs/vue3';
</script>
<template>
    <Head title="Panel de administración" />

    <AppLayout>
        <template #header>
            Nemesis
        </template>

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 border-b border-gray-200">
                Nemesis es una plataforma de software que permite a los médicos gestionar la formulación de medicamentos 
                de manera automática.
            </div>
        </div>
    </AppLayout>
</template>


