<script setup>
import InputError from '@/Components/InputError.vue'
import InputLabel from '@/Components/InputLabel.vue'
import PrimaryButton from '@/Components/PrimaryButton.vue'
import Checkbox from '@/Components/Checkbox.vue'
import TextInput from '@/Components/TextInput.vue'
import { ref } from 'vue'

const isChecked = ref(false);

const { modelValue, tabIndex }= defineProps(['modelValue',  'tabIndex'])

const form = ref(modelValue);

</script>

<template>
    <div class="flex block mt-5 mb-5 font-medium text-sm text-gray-700 col-span-6 sm:col-span-6">
        <Checkbox v-model="isChecked" />
        <p class="ms-2">¿Es dosis única?</p>
    </div>

    <div v-if="isChecked" class="col-span-6 sm:col-span-6">
        <InputLabel for="unica" value="Dosis Única (mg/kg)" />
        <TextInput id="unica" v-model="form.dosages[tabIndex].unique_dose" type="text" autocomplete="unica" class="mt-1 block w-full" />
        <InputError :message="$page.props.errors.unica" class="mt-2" />
    </div>

    <div v-if="!isChecked" class="col-span-6 sm:col-span-6">
        <InputLabel for="promedio" value="Dosis Promedio (mg/kg)" />
        <TextInput id="promedio" v-model="form.dosages[tabIndex].average_dose" type="text" autocomplete="promedio" class="mt-1 block w-full" />
        <InputError :message="$page.props.errors.promedio" class="mt-2" />
    </div>

    <div v-if="!isChecked" class="col-span-6 sm:col-span-6 mt-2">
        <InputLabel for="minima" value="Dosis Mínima (mg/kg)" />
        <TextInput id="minima" v-model="form.dosages[tabIndex].minimum_dose" type="text" autocomplete="minima" class="mt-1 block w-full" />
        <InputError :message="$page.props.errors.minima" class="mt-2" />
    </div>

    <div v-if="!isChecked" class="col-span-6 sm:col-span-6 mt-2">
        <InputLabel for="maxima" value="Dosis Máxima (mg/kg)" />
        <TextInput id="maxima" v-model="form.dosages[tabIndex].maximum_dose" type="text" autocomplete="maxima" class="mt-1 block w-full" />
        <InputError :message="$page.props.errors.maxima" class="mt-2" />
    </div>
</template>

