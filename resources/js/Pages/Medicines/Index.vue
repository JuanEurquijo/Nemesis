<template>
    <Head title="Medicamentos" />

    <AppLayout>
        <template #header>
            Medicamentos
        </template>

        <div class="sm:flex sm:items-center sm:justify-between">
            <div>
                <p class="mt-1 text-sm text-gray-500">Aquí puede encontrar todos los medicamentos para
                    recetar.</p>
            </div>

            <div class="flex items-center mt-4 gap-x-3">

                <Link
                  :href="route('medicines.create')"
                    class="flex items-center justify-center w-1/2 px-5 py-2 text-sm tracking-wide text-white transition-colors duration-200 bg-blue-500 rounded-lg shrink-0 sm:w-auto gap-x-2 hover:bg-blue-600">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>

                    <span>Crear Medicamento</span>
                </Link>
            </div>
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
                        <th scope="col" class="px-6 py-4 font-medium text-gray-900">Principio Activo</th>
                        <th scope="col" class="px-6 py-4 font-medium text-gray-900">Forma Farmacéutica</th>
                        <th scope="col" class="px-6 py-4 font-medium text-gray-900">Concentración</th>
                        <th scope="col" class="px-6 py-4 font-medium text-gray-900">Categoría</th>
                        <th scope="col" class="px-6 py-4 font-medium text-gray-900"></th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 border-t border-gray-100">
                    <tr v-for="medicine in filteredMedicines" :key="medicine.id" class="hover:bg-gray-50">
                        <th class="flex gap-3 px-6 py-4 font-normal text-gray-900">
                            <div class="text-sm">
                                <div class="font-medium text-gray-700">{{medicine.active_ingredient}}</div>
                            </div>
                        </th>
                        <td class="px-6 py-4">
                            <span
                                class="inline-flex items-center gap-1 rounded-full bg-green-50 px-2 py-1 text-xs font-semibold text-green-600">
                                <span class="h-1.5 w-1.5 rounded-full bg-green-600"></span>
                                {{ medicine.pharmaceutical_form }}
                            </span>
                        </td>
                        <td class="px-6 py-4">{{ medicine.concentration }}</td>
                        <td class="px-6 py-4">
                            <div class="flex gap-2">
                                <span
                                    class="inline-flex items-center gap-1 rounded-full bg-blue-50 px-2 py-1 text-xs font-semibold text-blue-600">
                                    {{ medicine.category.name }}
                                </span>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex justify-end gap-4">
                                <a x-data="{ tooltip: 'Delete' }" @click="deteleMedicine(medicine.id)">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="h-6 w-6" x-tooltip="tooltip">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                    </svg>
                                </a>
                                <a x-data="{ tooltip: 'Edite' }" :href="route('medicines.edit', medicine)">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="h-6 w-6" x-tooltip="tooltip">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                                    </svg>
                                </a>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="mt-6 sm:flex sm:items-center sm:justify-between ">
        <div class="text-sm text-gray-500">
            Página <span class="font-medium text-gray-700">{{ medicines.current_page }} de {{ medicines.last_page }}</span>
        </div>

        <div class="flex items-center mt-4 gap-x-4 sm:mt-0">
            <a v-if="medicines.current_page > 1" :href="medicines.prev_page_url" class="flex items-center justify-center w-1/2 px-5 py-2 text-sm text-gray-700 capitalize transition-colors duration-200 bg-white border rounded-md sm:w-auto gap-x-2 hover:bg-gray-100">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 rtl:-scale-x-100">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 15.75L3 12m0 0l3.75-3.75M3 12h18" />
                </svg>

                <span>
                    Anterior
                </span>
            </a>

            <a v-if="medicines.current_page < medicines.last_page" :href="medicines.next_page_url" class="flex items-center justify-center w-1/2 px-5 py-2 text-sm text-gray-700 capitalize transition-colors duration-200 bg-white border rounded-md sm:w-auto gap-x-2 hover:bg-gray-100">
                <span>
                    Siguiente
                </span>

                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 rtl:-scale-x-100">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" />
                </svg>
            </a>
        </div>
    </div>
    </AppLayout>
</template>

<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Head, Link} from '@inertiajs/vue3';
import { Inertia } from '@inertiajs/inertia';
import { computed, ref } from 'vue'
const props = defineProps({
  medicines: {
    type: Object,
    required: true
  }
});

const deteleMedicine = id =>{
    if(confirm('¿Estás seguro de eliminar el medicamento?')){
      Inertia.delete(route('medicines.destroy' , id))
    }
}

const searchQuery = ref('');
const filteredMedicines = computed(() => {
  const query = searchQuery.value.toLowerCase().trim();

  if (!query) {
    return props.medicines.data;
  }

  return props.medicines.data.filter((medicine) => {
    return (
      medicine.active_ingredient.toLowerCase().includes(query) ||
      medicine.pharmaceutical_form.toLowerCase().includes(query) ||
      medicine.concentration.toLowerCase().includes(query) ||
      medicine.category.name.toLowerCase().includes(query)
    );
  });
});
</script>
