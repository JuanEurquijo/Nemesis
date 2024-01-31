<script>
export default {
    name: 'MedicinesForm'
}
</script>

<script setup>
import FormSection from '@/Components/FormSection.vue'
import InputError from '@/Components/InputError.vue'
import InputLabel from '@/Components/InputLabel.vue'
import PrimaryButton from '@/Components/PrimaryButton.vue'
import TextInput from '@/Components/TextInput.vue'
import TabContent from '@/Components/Dosage/TabContent.vue'
import { ref, watchEffect } from 'vue'

const props = defineProps({
    form: {
        type: Object,
        required: true
    },
    updating: {
        type: Boolean,
        required: false,
        default: false
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

defineEmits(['submit'])

const formTabs = [
    {
        key: 'neonatal',
        label: 'Neonatal',
    },
    {
        key: 'pediatrica',
        label: 'Pediátrico',
    },
    {
        key: 'adulto',
        label: 'Adulto',
    },
    {
        key: 'geriatrica',
        label: 'Geriátrico',
    },
    {
        key: 'especial',
        label: 'Casos Especiales',
    },
];

const units = ['mg','g','dag','g/L','mg/L','mg/ml'];

const unit = ref('');
const currentTabData = ref(formTabs[0]);
const tabIndex = ref(0);
const concentrationValue = ref('');

const combineConcentration = (value) => {
    props.form.concentration = value + ' ' + unit.value;
};

function updateTab(tab) {
    currentTabData.value = tab;
    tabIndex.value = formTabs.findIndex(item => item.key === tab.key);
}

watchEffect(() => {
    combineConcentration(concentrationValue.value);
});

</script>

<template>
    <FormSection @submitted="$emit('submit')">
        <template #title>
            {{ updating ? 'Editar Medicamento' : 'Crear Nuevo Medicamento' }}
        </template>

        <template #description>
            {{ updating ? 'Editar el medicamento seleccionado' : 'Creación de nuevo medicamento' }}
        </template>

        <template #form>
            <div class="col-span-6 sm:col-span-6">
                <InputLabel for="ingredient" value="Principio Activo" />
                <TextInput id="ingredient" v-model="form.active_ingredient" type="text" autocomplete="ingredient"
                    class="mt-1 block w-full" />
                <InputError :message="$page.props.errors.active_ingredient" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-6">
                <InputLabel for="presentation" value="Forma Farmacéutica" />
                <select id="presentation" class="mt-1 block w-full rounded-md border-slate-300"
                    v-model="form.pharmaceutical_form">
                    <option v-for="p in presentations" :key="p.id" :selected="p.name === form.pharmaceutical_form"> {{
                        p.name
                    }}</option>
                </select>
                <InputError :message="$page.props.errors.pharmaceutical_form" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-6">
                <InputLabel for="concentration" value="Concentración" />
                <div class="flex">
                    <TextInput id="concentration" v-model="concentrationValue" type="number" autocomplete="concentration"
                        class="mt-1 block w-full" />
                    <select id="unit" class="mt-1 block rounded-md border-slate-300 w-26" v-model="unit">
                        <option v-for="unit in units" :key="unit.id" :value="unit"
                            :selected="unit"> {{ unit }}</option>
                    </select>
                </div>
                <InputError :message="$page.props.errors.concentration" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-6">
                <InputLabel for="category" value="Categoría" />
                <select id="category" class="mt-1 block w-full rounded-md border-slate-300" v-model="form.category_id">
                    <option v-for="category in categories" :key="category.id" :value="category.id"
                        :selected="category.id === form.category_id"> {{ category.name }}</option>
                </select>
                <InputError :message="$page.props.errors.p_id" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-6">
                <h3 class="font-bold">Dosificación</h3>
                <p class="mt-2 font-medium text-sm text-gray-700">A continuación indique las diferentes dosificaciones para
                    el medicamento de acuerdo al tipo de paciente:</p>
            </div>


            <div class="col-span-6 sm:col-span-6">
                <div class="overflow-x-auto">
                    <ul class="flex text-sm font-medium text-center text-gray-500 border-b border-gray-200">
                        <li v-for="tab in formTabs" :key="tab.key" class="me-2">
                            <a href="#" :class="{
                                'text-blue-600 bg-gray-100 rounded-t-lg active':
                                    currentTabData.key === tab.key,
                            }" class="inline-block p-4" @click="updateTab(tab)">
                                {{ tab.label }}
                            </a>
                        </li>
                    </ul>
                </div>
                <TabContent :modelValue="form" :tabIndex="tabIndex" />
            </div>
        </template>

        <template #actions>
            <PrimaryButton>
                {{ updating ? 'Actualizar' : 'Crear' }}
            </PrimaryButton>
        </template>
    </FormSection>
</template>
