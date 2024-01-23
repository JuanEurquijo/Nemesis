<template>
    <Head title="Medicamentos Invima" />

    <AppLayout>
        <template #header>
            Medicamentos INVIMA
        </template>

        <div class="sm:flex sm:items-center sm:justify-between">
            <div>
                <p class="mt-1 text-sm text-gray-500">Aquí puede encontrar la norma farmacológica proporcionada por el
                    Invima hasta el 2023</p>
            </div>

            <!-- <div class="flex items-center mt-4 gap-x-3">

                <Link
                  :href="route('catalog.create')"
                    class="flex items-center justify-center w-1/2 px-5 py-2 text-sm tracking-wide text-white transition-colors duration-200 bg-blue-500 rounded-lg shrink-0 sm:w-auto gap-x-2 hover:bg-blue-600">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>

                    <span>Crear Medicamento</span>
                </Link>
            </div> -->
        </div>

        <div class="mt-6 md:flex md:items-center md:justify-between">
            <div class="relative flex items-center mt-4 md:mt-0">
                <span class="absolute">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-5 h-5 mx-3 text-gray-400">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                    </svg>
                </span>

                <input v-model="searchQuery" type="text" placeholder="Buscar" id="search"
                    class="block w-full py-1.5 pr-5 text-gray-700 bg-white border border-gray-200 rounded-lg md:w-80 placeholder-gray-400/70 pl-11 rtl:pr-11 rtl:pl-5 focus:border-blue-400 focus:ring-blue-300 focus:outline-none focus:ring focus:ring-opacity-40">
            </div>
        </div>

        <div class="overflow-x-auto rounded-lg border border-gray-200 shadow-md mt-5">
            <table class="w-full border-collapse bg-white text-left text-sm text-gray-500">
                <thead class="bg-blue-100">
                    <tr>
                        <th scope="col" class="px-6 py-4 font-medium text-gray-900">ATC</th>
                        <th scope="col" class="px-6 py-4 font-medium text-gray-900">Principio Activo</th>
                        <th scope="col" class="px-6 py-4 font-medium text-gray-900">Forma Farmacéutica</th>
                        <th scope="col" class="px-6 py-4 font-medium text-gray-900">Concentración</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 border-t border-gray-100">
                    <tr v-for="standard in filteredStandards" :key="standard.id" class="hover:bg-gray-50">
                        <th class="flex gap-3 px-6 py-4 font-normal text-gray-900">
                            <div class="text-sm">
                                <div class="font-medium text-gray-700">{{ standard.atc }}</div>
                            </div>
                        </th>
                        <td class="px-6 py-4">
                            {{ standard.principio_activo }}
                        </td>
                        <td class="px-6 py-4">{{ standard.forma_farmaceutica }}</td>
                        <td class="px-6 py-4">
                            {{ standard.concentracion }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="mt-6 sm:flex sm:items-center sm:justify-between ">
            <div class="text-sm text-gray-500">
                Página <span class="font-medium text-gray-700">{{ standards.current_page }} de {{ standards.last_page
                }}</span>
            </div>

            <div class="flex items-center mt-4 gap-x-4 sm:mt-0">
                <a v-if="standards.current_page > 1" :href="standards.prev_page_url"
                    class="flex items-center justify-center w-1/2 px-5 py-2 text-sm text-gray-700 capitalize transition-colors duration-200 bg-white border rounded-md sm:w-auto gap-x-2 hover:bg-gray-100">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-5 h-5 rtl:-scale-x-100">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 15.75L3 12m0 0l3.75-3.75M3 12h18" />
                    </svg>

                    <span>
                        previous
                    </span>
                </a>

                <a v-if="standards.current_page < standards.last_page" :href="standards.next_page_url"
                    class="flex items-center justify-center w-1/2 px-5 py-2 text-sm text-gray-700 capitalize transition-colors duration-200 bg-white border rounded-md sm:w-auto gap-x-2 hover:bg-gray-100">
                    <span>
                        Next
                    </span>

                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-5 h-5 rtl:-scale-x-100">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" />
                    </svg>
                </a>
            </div>
        </div>
    </AppLayout>
</template>

<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
import { computed, ref } from 'vue'
const props = defineProps({
    standards: {
        type: Object,
        required: true
    }
});

const searchQuery = ref('');
const filteredStandards = computed(() => {
    const query = searchQuery.value.toLowerCase().trim();

    if (!query) {
        return props.standards.data;
    }

    return props.standards.data.filter((standard) => {
        return (
            standard.atc.toLowerCase().includes(query) ||
            standard.principio_activo.toLowerCase().includes(query) ||
            standard.forma_farmaceutica.toLowerCase().includes(query) ||
            standard.concentracion.toLowerCase().includes(query)
        );
    });
});
</script>
