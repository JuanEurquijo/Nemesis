<script>
export default {
    name: 'Prescription'
}
</script>

<script setup>
import { ref, computed } from 'vue';
import { Head, useForm } from '@inertiajs/vue3';
import PatientInfoForm from '@/Components/Prescription/PatientInfo.vue'
import Prescription from '@/Components/Prescription/Prescription.vue'
import PrescriptionForm from '@/Components/Prescription/Form.vue'
import AppLayout from '@/Layouts/AppLayout.vue';

defineProps({
    user: {
        type: Object,
        required: true
    },
    categories: {
        type: Object,
        required: false
    }
})

const patientD = ref(null);
const doseF = ref('');
const shouldPassForm = ref(false);
const prescriptions = ref([])

const patientSearch = useForm({
    identification: '',
})

const form = useForm({
    category: '',
    active_ingredient: '',
    pharmaceutical_form: '',
    concentration: '',
    type_dose: '',
    dosage: '',
    frecuency: '',
    time: '',
    weight: ''
})

const handlePatientFound = (patientData) => {
    patientD.value = patientData;
}

const handleDoseFound = (dose) => {
    doseF.value = dose;
}

const calculateDosage = () => {
    const dailyDose = form.weight * doseF.value
    const dosePerDay = dailyDose / form.frecuency
    const prescription = form.active_ingredient +
        ' ' + form.pharmaceutical_form + ' ' + form.concentration + ' tomar ' + dosePerDay + ' ' +
        form?.frecuency + ' veces al día por ' +
        form?.time + ' días'
    if (form.active_ingredient && form.pharmaceutical_form && form.concentration && form.frecuency && form.time) {
        prescriptions.value.push(prescription)
    }
    shouldPassForm.value = true
}


</script>
<template>
    <Head title="Recetario" />
    <AppLayout>
        <template #header>
            Recetario
        </template>

        <div class="sm:flex sm:items-center sm:justify-between">
            <div>
                <p class="mt-1 text-sm text-gray-700">Aquí puede realizar la creación de una nueva receta médica</p>
            </div>
        </div>

        <div class="py-12">
            <div class="max-w-7xl mx-autp sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                            <PatientInfoForm :form="patientSearch" @patient-found="handlePatientFound" />
                            <PrescriptionForm :form="form" :categories="categories" @submit="calculateDosage"
                                @foundDose="handleDoseFound" />
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="py-2">
            <div class="max-w-7xl mx-autp sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                            <Prescription :user="user" :patient="patientD" :prescriptions="prescriptions" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
