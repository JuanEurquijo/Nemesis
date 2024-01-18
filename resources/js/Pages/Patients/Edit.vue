<script>
export default {
    name: 'PatientEdit'
}
</script>

<script setup>
import { useForm } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';
import PatientForm from '@/Components/Patients/Form.vue';
const props = defineProps({
    patient:{
        type: Object,
        required: true
    },
})

const form = useForm({
    name: props.patient.name,
    lastname: props.patient.lastname,
    identification: String(props.patient.identification),
    phone: String(props.patient.phone),
    age: String(props.patient.age),
    sex: props.patient.sex
})

</script>

     
<template>
    <AppLayout>
        <template>
            <h1 class="fond-semibold text-xl text-gray-800 leading-tight">Editar Paciente</h1>
            {{ form }}
        </template>

        <div class="py-12">
           <div class="max-w-7xl mx-autp sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                       <PatientForm :updating="true" :form="form" @submit="form.put(route('patients.update', patient.id))" />
                    </div>
                </div>
            </div>
           </div>
        </div>
    </AppLayout>
</template>