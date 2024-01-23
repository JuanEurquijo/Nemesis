<script>
export default {
    name: 'PatientEdit'
}
</script>

<script setup>
import { useForm } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';
import PatientForm from '@/Components/Patients/Form.vue';
import { format } from 'date-fns';
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
    birthdate: adjustToLocalTimeZone(props.patient.birthdate),
    sex: props.patient.sex
})

function adjustToLocalTimeZone(dateString) {
    const date = new Date(`${dateString}T00:00:00`);
    date.setMinutes(date.getTimezoneOffset());
    return date;
}

const submitForm = () => {
    if (form.birthdate) {
        form.birthdate = format(form.birthdate, 'yyyy-MM-dd');
    }
    form.put(route('patients.update', props.patient.id), {
        onError: (errors) => {
            console.error(errors);
        },
    });

};

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
                       <PatientForm :updating="true" :form="form" @submit="submitForm" />
                    </div>
                </div>
            </div>
           </div>
        </div>
    </AppLayout>
</template>
