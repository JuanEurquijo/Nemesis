<script>
export default {
    name: 'PatientInfoForm'
}
</script>

<script setup>
import FormSection from '@/Components/Prescription/FormSection.vue'
import InputError from '@/Components/InputError.vue'
import InputLabel from '@/Components/InputLabel.vue'
import PrimaryButton from '@/Components/PrimaryButton.vue'
import TextInput from '@/Components/TextInput.vue'
import { Head, Link } from '@inertiajs/vue3';
import { ref, getCurrentInstance } from 'vue'

const props = defineProps(['form']);

const { emit } = getCurrentInstance();

defineEmits(['submit', 'patient-found']);

const submitForm = async () => {
    try {
        const response = await axios.get(route('prescription.searchPatient', props.form.identification))
        const patientData = response.data.patient;
        emit('patient-found', patientData);
        emit('submit');
    } catch (error) {
        console.error(error);
    }
};

</script>
<template>
    <FormSection @submitted="$emit('submit')">
        <template #title>
            {{ 'Información del paciente' }}
        </template>

        <template #form>

            <div class="sm:col-span-1">
                <InputLabel for="identification" value="No Documento" />
                <TextInput id="identification" v-model="form.identification" type="number" autocomplete="identification" class="mt-1 block w-full" />
                <InputError :message="$page.props.errors.identification" class="mt-2" />
            </div>

            <div class="sm:mt-4 flex flex-col items-center gap-y-3 sm:flex-row sm:justify-between sm:text-center">
                <button type="submit" @click="submitForm" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                  Buscar Paciente
                </button>
            </div>

        </template>

    </FormSection>
</template>
