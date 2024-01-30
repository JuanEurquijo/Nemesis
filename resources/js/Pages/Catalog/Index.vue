<template>
    <Head title="Normas Farmacológicas" />

    <AppLayout>
        <template #header>
            Normas Farmacológicas
        </template>

        <div class="sm:flex sm:items-center sm:justify-between">
            <div>
                <p class="mt-1 text-sm text-gray-700">Aquí puede encontrar las normas farmacológicas proporcionada por el
                    Invima hasta el 2023</p>
            </div>
        </div>

        <div class="mt-6 md:flex md:items-center md:justify-between">
            <div class="flex items-center gap-3 mt-4 md:mt-0">
                <div class="relative flex items-center">
                    <span class="absolute">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-5 h-5 mx-3 text-gray-400">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                        </svg>
                    </span>

                    <input v-model="searchQuery" type="text" placeholder="Buscar" id="search" @input="handleInput"
                        class="block w-full py-1.5 pr-5 text-gray-700 bg-white border border-gray-200 rounded-lg md:w-80 placeholder-gray-400/70 pl-11 rtl:pr-11 rtl:pl-5 focus:border-blue-400 focus:ring-blue-300 focus:outline-none focus:ring focus:ring-opacity-40">
                </div>

                <button type="submit" @click="performSearch" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white
                     uppercase tracking-widest hover:bg-gray-800 focus:bg-gray-800 active:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-indigo-500 
                     focus:ring-offset-2 transition ease-in-out duration-150">
                    Buscar
                </button>
            </div>
        </div>

        <div class="overflow-x-auto w-full rounded-lg border border-gray-200 shadow-md mt-5">
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
                    <tr v-for="standard in standards.data" :key="standard.id" class="hover:bg-gray-50">
                        <td class="px-6 py-4">
                            {{ standard.atc }}
                        </td>
                        <td class="px-6 py-4">
                            {{ standard.principio_activo }}
                        </td>
                        <td class="px-6 py-4">
                            {{ standard.forma_farmaceutica }}
                        </td>
                        <td class="px-6 py-4">
                            {{ standard.concentracion }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="mt-6 sm:flex sm:items-center sm:justify-between">
            <div class="text-sm text-gray-700">
                Página <span class="font-medium text-gray-700">{{ standards.current_page }} de {{ standards.last_page
                }}</span>
            </div>

            <div class="flex items-center mt-4 gap-x-4 sm:mt-0">
                <a v-if="standards.current_page > 1" :href="searchQuery.trim() !== '' ? null : standards.prev_page_url"
                    @click="performSearch(standards.current_page - 1)"
                    class="flex items-center justify-center w-1/2 px-5 py-2 text-sm text-gray-700 capitalize transition-colors duration-200 bg-white border rounded-md sm:w-auto gap-x-2 hover:bg-gray-100">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-5 h-5 rtl:-scale-x-100">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 15.75L3 12m0 0l3.75-3.75M3 12h18" />
                    </svg>
                    <span>
                        Anterior
                    </span>
                </a>
                <a v-if="standards.current_page < standards.last_page"
                    :href="searchQuery.trim() !== '' ? null : standards.next_page_url"
                    @click="performSearch(standards.current_page + 1)"
                    class="flex items-center justify-center w-1/2 px-5 py-2 text-sm text-gray-700 capitalize transition-colors duration-200 bg-white border rounded-md sm:w-auto gap-x-2 hover:bg-gray-100">
                    <span>
                        Siguiente
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
import { Head } from '@inertiajs/vue3';
import { ref } from 'vue'
const props = defineProps({
    standards: {
        type: Object,
        required: true
    }
});

const searchQuery = ref('');
const standards = ref({ ...props.standards });

const handleInput = () => {
    const query = searchQuery.value.trim();
    if (query === '') {
        standards.value = { ...props.standards };
    }
};

async function performSearch(page = 1) {
    const query = searchQuery.value.trim();
    try {
        const response = await axios.get(`/catalog/search/${query}?page=${page}`)
        standards.value = response.data.standards;
    } catch (error) {
        console.error('Error al realizar la búsqueda:', error);
    }
}
</script>
