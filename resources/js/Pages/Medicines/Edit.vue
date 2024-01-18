<script>
export default {
    name: 'MedicineEdit'
}
</script>

<script setup>
import { useForm } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';
import MedicineForm from '@/Components/Medicines/Form.vue';
const props = defineProps({
    medicine:{
        type: Object,
        required: true
    },
    presentations: {
        type: Object,
        required: true
    },
    categories: {
        type: Object,
        required: true
    }
})

const form = useForm({
    active_ingredient: props.medicine.active_ingredient,
    pharmaceutical_form: props.medicine.pharmaceutical_form,
    concentration: props.medicine.concentration,
    category_id: props.medicine.category_id,
    dosages: props.medicine.dosages, 
});

</script>

     
<template>
    <AppLayout>
        <template>
            <h1 class="fond-semibold text-xl text-gray-800 leading-tight">Editar Medicamento</h1>
            {{ form }}
        </template>

        <div class="py-12">
           <div class="max-w-7xl mx-autp sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                       <MedicineForm :updating="true" :presentations="presentations" :categories="categories" :form="form" @submit="form.put(route('medicines.update', medicine.id))" />
                    </div>
                </div>
            </div>
           </div>
        </div>
    </AppLayout>
</template>