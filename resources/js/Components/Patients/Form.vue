<script>
export default {
    name: 'PatientsForm'
}
</script>

<script setup>
import FormSection from '@/Components/FormSection.vue'
import InputError from '@/Components/InputError.vue'
import InputLabel from '@/Components/InputLabel.vue'
import PrimaryButton from '@/Components/PrimaryButton.vue'
import TextInput from '@/Components/TextInput.vue'
import VueDatePicker from '@vuepic/vue-datepicker';
import '@vuepic/vue-datepicker/dist/main.css'


defineProps({
    form: {
        type: Object,
        required: true
    },
    updating: {
        type: Boolean,
        required: false,
        default: false
    },
})

defineEmits(['submit'])

const sexs = ['Masculino','Femenino'];

</script>

<template>
    <FormSection @submitted="$emit('submit')">
        <template #title>
            {{ updating ? 'Editar Paciente' : 'Crear Nuevo Paciente' }}
        </template>

        <template #description>
            {{ updating ? 'Editar el paciente seleccionado' : 'Creación de nuevo paciente' }}
        </template>

        <template #form>
            <div class="col-span-6 sm:col-span-6">
                <InputLabel for="name" value="Nombre" />
                <TextInput id="name" v-model="form.name" type="text" autocomplete="name"
                    class="mt-1 block w-full" />
                <InputError :message="$page.props.errors.name" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-6">
                <InputLabel for="lastname" value="Apellido" />
                <TextInput id="lastname" v-model="form.lastname" type="text" autocomplete="lastname"
                    class="mt-1 block w-full" />
                <InputError :message="$page.props.errors.lastname" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-6">
                <InputLabel for="identification" value="No. Documento" />
                <TextInput id="identification" v-model="form.identification" type="number" autocomplete="identification"
                    class="mt-1 block w-full" />
                <InputError :message="$page.props.errors.identification" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-6">
                <InputLabel for="phone" value="Celular" />
                <TextInput id="phone" v-model="form.phone" type="number" autocomplete="phone"
                    class="mt-1 block w-full" />
                <InputError :message="$page.props.errors.phone" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-6">
                <InputLabel value="Fecha de Nacimiento" />
                <VueDatePicker v-model="form.birthdate" :teleport="true" :enableTimePicker="false"></VueDatePicker>
                <InputError :message="$page.props.errors.birthdate" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-6">
                <InputLabel for="sex" value="Sexo" />
                <select id="sex" class="mt-1 block w-full rounded-md border-slate-300" v-model="form.sex">
                    <option v-for="(sex, index) in sexs" :key="index" :selected="sex === form.sex"> {{ sex }}</option>
                </select>
                <InputError :message="$page.props.errors.sex" class="mt-2" />
            </div>
        </template>

        <template #actions>
            <PrimaryButton>
                {{ updating ? 'Actualizar' : 'Crear' }}
            </PrimaryButton>
        </template>
    </FormSection>
</template>
