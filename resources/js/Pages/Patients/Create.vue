<script>
export default {
    name: 'PatientsCreate'
}
</script>

<script setup>
import { useForm } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';
import PatientForm from '@/Components/Patients/Form.vue';
const form = useForm({
    name: '',
    lastname: '',
    identification: null,
    phone: null,
    age: null,
    sex: ''
})

const submitForm = () => {
    form.post(route('patients.store'), {
        onError: (errors) => {
            console.error(errors);
        },
    });
};
</script>
     
<template>
    <AppLayout>
        <template>
            <h1 class="fond-semibold text-xl text-gray-800 leading-tight">Ingresar paciente</h1>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-autp sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                            <PatientForm :form="form" @submit="submitForm" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
