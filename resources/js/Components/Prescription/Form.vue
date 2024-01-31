<script>
export default {
    name: 'PrescriptionForm'
}
</script>

<script setup>
import FormSection from '@/Components/Prescription/FormSection.vue'
import InputError from '@/Components/InputError.vue'
import InputLabel from '@/Components/InputLabel.vue'
import TextInput from '@/Components/TextInput.vue'
import { ref, watchEffect, computed, watch, getCurrentInstance } from 'vue';
import axios from 'axios';

const props = defineProps({
    form: {
        type: Object,
        required: true
    },
    categories: {
        type: Object,
        required: false
    }
})
defineEmits(['submit', 'foundDose', 'medicine'])
const { emit } = getCurrentInstance();

const activeIngredients = ref([]);
const pharmaceuticalForms = ref([]);
const concentrations = ref([]);
const typeDoses = ['Neonatal', 'Pediátrico', 'Adulto', 'Geriátrico', 'Condición Especial'];
const dosages = ['Mínima', 'Promedio', 'Máxima', 'Única'];
const frequencies = ['cada 24 horas', 'cada 12 horas', 'cada 8 horas', 'cada 6 horas', 'cada 4 horas'];

let selectedActiveIngredient = '';
let medicine = null;

const medicineForm = computed(() => {
    return {
        active_ingredient: props.form.active_ingredient,
        pharmaceutical_form: props.form.pharmaceutical_form,
        concentration: props.form.concentration,
    };
});

const loadActiveIngredients = async (event) => {
    try {
        props.form.active_ingredient = '';
        props.form.pharmaceutical_form = '';
        props.form.concentration = '';
        pharmaceuticalForms.value = [];
        concentrations.value = [];

        const categoryId = event.target.value;
        const response = await axios.get(route('prescription.searchActiveIngredient', categoryId));
        activeIngredients.value = response.data.activeIngredients;

        selectedActiveIngredient = '';
    } catch (error) {
        console.error('Error en la solicitud:', error);
    }
};

const loadPharmaceuticalForms = async (event) => {
    try {
        props.form.pharmaceutical_form = '';
        props.form.concentration = '';
        concentrations.value = [];

        selectedActiveIngredient = event.target.value;
        medicineForm.value.active_ingredient = selectedActiveIngredient;

        const response = await axios.get(route('prescription.searchPharmaceuticalForm', selectedActiveIngredient));
        pharmaceuticalForms.value = response.data.pharmaceuticalForms;
    } catch (error) {
        console.error('Error en la solicitud:', error);
    }
};

const loadConcentrations = async (event) => {
    try {
        props.form.concentration = '';
        const pharmaceuticalForm = event.target.value;
        selectedActiveIngredient = medicineForm.value.active_ingredient;

        if (!selectedActiveIngredient) {
            console.error('Error: activeIngredient is not available.');
            return;
        }
        const response = await axios.get(route('prescription.searchConcentration', {
            activeIngredient: selectedActiveIngredient,
            pharmaceuticalForm: pharmaceuticalForm,
        }));
        concentrations.value = response.data.concentrations;
    } catch (error) {
        console.error('Error en la solicitud:', error);
    }
};


async function searchMedicine() {
    try {
        const response = await axios.post(route('prescription.searchMedicine', medicineForm.value));
        medicine = response.data.medicine
    } catch (error) {
        console.error('Error en la solicitud:', error);
    }
};

watchEffect(() => {
    if (medicineForm.value.active_ingredient !== '' && medicineForm.value.pharmaceutical_form !== '' && medicineForm.value.concentration !== '') {
        searchMedicine();
    }
});

async function searchDosage() {
    try {
        const dosageMap = {
            'Promedio': 'average_dose',
            'Mínima': 'minimum_dose',
            'Máxima': 'maximum_dose',
            'Única': 'unique_dose',
        };

        const dosage = dosageMap[props.form.dosage] || '';

        const dosageSearch = computed(() => {
            return {
                medicine_id: medicine.id,
                type_dose: props.form.type_dose,
                dosage: dosage
            };
        });
        const response = await axios.post(route('prescription.searchDosage', dosageSearch.value));
        emit('foundDose', response.data.dosage);
        emit('medicine', medicine);
    } catch (error) {
        console.error('Error en la solicitud:', error);
    }
};

watch(() => props.form.dosage, () => {
    searchDosage();
})


</script>
<template>
    <FormSection @submitted="$emit('submit')" class="mt-8">
        <template #title>
            {{ 'Calcular dosificación de medicamentos' }}
        </template>

        <template #form>
            <div class="sm:col-span-1">
                <InputLabel for="category" value="Categoría" />
                <select id="category" v-model="props.form.category" @change="loadActiveIngredients"
                    class="mt-1 block w-full rounded-md border-slate-300">
                    <option v-for="category in categories" :key="category.id" :value="category.id"> {{ category.name }}
                    </option>
                </select>
                <InputError :message="$page.props.errors.category" class="mt-2" />
            </div>

            <div class="sm:col-span-1">
                <InputLabel for="active_ingredient" value="Principio Activo" />
                <select id="active_ingredient" v-model="props.form.active_ingredient" @change="loadPharmaceuticalForms"
                    class="mt-1 block w-full rounded-md border-slate-300">
                    <option v-for="active_ingredient in activeIngredients" :key="active_ingredient.id"> {{ active_ingredient
                    }}</option>
                </select>
                <InputError :message="$page.props.errors.active_ingredient" class="mt-2" />
            </div>

            <div class="sm:col-span-1">
                <InputLabel for="pharmaceutical_form" value="Forma Farmacéutica" />
                <select id="pharmaceutical_form" v-model="props.form.pharmaceutical_form" @change="loadConcentrations"
                    class="mt-1 block w-full rounded-md border-slate-300">
                    <option v-for="pharmaceutical_form in pharmaceuticalForms" :key="pharmaceutical_form.id"> {{
                        pharmaceutical_form }}</option>
                </select>
                <InputError :message="$page.props.errors.pharmaceutical_form" class="mt-2" />
            </div>

            <div class="sm:col-span-1">
                <InputLabel for="concentration" value="Concentración" />
                <select id="concentration" v-model="props.form.concentration"
                    class="mt-1 block w-full rounded-md border-slate-300">
                    <option v-for="concentration in concentrations" :key="concentration.id"> {{ concentration }}</option>
                </select>
                <InputError :message="$page.props.errors.concentration" class="mt-2" />
            </div>

            <div class="sm:col-span-1">
                <InputLabel for="type_doses" value="Tipo de dosis" />
                <select id="type_doses" v-model="props.form.type_dose"
                    class="mt-1 block w-full rounded-md border-slate-300">
                    <option v-for="type_dose in typeDoses" :key="type_dose.id"> {{ type_dose }}</option>
                </select>
                <InputError :message="$page.props.errors.type_dose" class="mt-2" />
            </div>

            <div class="sm:col-span-1">
                <InputLabel for="dosage" value="Dosis" />
                <select id="dosage" v-model="props.form.dosage" class="mt-1 block w-full rounded-md border-slate-300">
                    <option v-for="dosage in dosages" :key="dosage.id"> {{ dosage }}</option>
                </select>
                <InputError :message="$page.props.errors.dosage" class="mt-2" />
            </div>

            <div class="sm:col-span-1">
                <InputLabel for="frecuency" value="Frecuencia" />
                <select id="frecuency" v-model="props.form.frecuency" class="mt-1 block w-full rounded-md border-slate-300">
                    <option v-for="(frecuency, index) in frequencies" :key="index" :value="index + 1"> {{ frecuency }}
                    </option>
                </select>
                <InputError :message="$page.props.errors.frecuency" class="mt-2" />
            </div>

            <div class="sm:col-span-1">
                <InputLabel for="time" value="Tiempo (días)" />
                <TextInput id="time" v-model="props.form.time" type="number" autocomplete="time" class="mt-1 block w-full"
                    pattern="\d*" />
                <InputError :message="$page.props.errors.time" class="mt-2" />
            </div>

            <div class="sm:col-span-1">
                <InputLabel for="weight" value="Peso (kg)" />
                <TextInput id="weight" v-model="props.form.weight" type="number" autocomplete="weight"
                    class="mt-1 block w-full" />
                <InputError :message="$page.props.errors.weight" class="mt-2" />
            </div>

        </template>

        <template #actions>
            <button type="submit" @click="submitForm"
                class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md text-sm tracking-wide text-white hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 shrink-0">
                Calcular y agregar
            </button>
        </template>
    </FormSection>
</template>
