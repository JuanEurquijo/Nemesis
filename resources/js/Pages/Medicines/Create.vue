<script>
export default {
    name: 'MedicinesCreate'
}
</script>

<script setup>
import { useForm, Head } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';
import MedicineForm from '@/Components/Medicines/Form.vue';
const form = useForm({
    active_ingredient: '',
    pharmaceutical_form: '',
    concentration: '',
    category_id: Number,
    dosages: [
        {
            type: 'Neonatal',
            unique_dose: null, 
            maximum_dose: null,
            minimum_dose: null,
            average_dose: null,
        },
        {
            type: 'Pediátrico',
            unique_dose: null, 
            maximum_dose: null,
            minimum_dose: null,
            average_dose: null,
        },
        {
            type: 'Adulto',
            unique_dose: null, 
            maximum_dose: null,
            minimum_dose: null,
            average_dose: null,
        },
        {
            type: 'Geriátrico',
            unique_dose: null, 
            maximum_dose: null,
            minimum_dose: null,
            average_dose: null,
        },
        {
            type: 'Condición Especial',
            unique_dose: null, 
            maximum_dose: null,
            minimum_dose: null,
            average_dose: null,
        },
    ],
})

defineProps({
    presentations: {
        type: Object,
        required: false
    },
    categories: {
        type: Object,
        required: false
    }
})

const submitForm = () => {
    form.post(route('medicines.store'), {
        onError: (errors) => {
            console.error(errors);
        },
    });
};
</script>
     
<template>
    <AppLayout>
        <Head title="Crear Medicina" />
        <template #header>
            <h1 class="fond-semibold text-xl text-gray-800 leading-tight">Crear Medicamento</h1>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-autp sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                            <MedicineForm :form="form" :presentations="presentations" :categories="categories"
                                @submit="submitForm" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
