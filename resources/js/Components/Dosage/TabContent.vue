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
        <InputLabel for="unique" value="Dosis Única (mg/kg)" />
        <TextInput id="unique" v-model="form.dosages[tabIndex].unique_dose" type="number" autocomplete="unique" class="mt-1 block w-full" />
        <InputError :message="$page.props.errors.unique_dose" class="mt-2" />
    </div>

    <div v-if="!isChecked" class="col-span-6 sm:col-span-6">
        <InputLabel for="average" value="Dosis Promedio (mg/kg)" />
        <TextInput id="average" v-model="form.dosages[tabIndex].average_dose" type="number" autocomplete="average" class="mt-1 block w-full" />
        <InputError :message="$page.props.errors.average_dose" class="mt-2" />
    </div>

    <div v-if="!isChecked" class="col-span-6 sm:col-span-6 mt-2">
        <InputLabel for="minimum" value="Dosis Mínima (mg/kg)" />
        <TextInput id="minimum" v-model="form.dosages[tabIndex].minimum_dose" type="number" autocomplete="minimum" class="mt-1 block w-full" />
        <InputError :message="$page.props.errors.minimum_dose" class="mt-2" />
    </div>

    <div v-if="!isChecked" class="col-span-6 sm:col-span-6 mt-2">
        <InputLabel for="maximum" value="Dosis Máxima (mg/kg)" />
        <TextInput id="maximum" v-model="form.dosages[tabIndex].maximum_dose" type="number" autocomplete="maximum" class="mt-1 block w-full" />
        <InputError :message="$page.props.errors.maximum" class="mt-2" />
    </div>
</template>

