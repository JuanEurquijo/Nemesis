<script>
export default {
    name: 'PatientsCreate'
}
</script>

<script setup>
import { useForm, Head } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';
import PatientForm from '@/Components/Patients/Form.vue';
import { format } from 'date-fns';
const form = useForm({
    name: '',
    lastname: '',
    identification: null,
    phone: null,
    birthdate: null,
    sex: ''
})

const submitForm = () => {
    if (form.birthdate) {
        form.birthdate = format(form.birthdate, 'yyyy-MM-dd');
    }
    form.post(route('patients.store'), {
        onError: (errors) => {
            console.error(errors);
        },
    });
};
</script>

<template>
    <AppLayout>
        <Head title="Crear Paciente" />
        <template>
            <h1 class="fond-semibold text-xl text-gray-800 leading-tight">Ingresar paciente</h1>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-autp sm:px-6 lg:px-8 z-0">
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
