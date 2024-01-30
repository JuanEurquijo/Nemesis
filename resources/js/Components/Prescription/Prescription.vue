<script>
export default {
    name: 'Prescription'
}
</script>

<script setup>
import html2pdf from "html2pdf.js";

const props = defineProps({
    patient: {
        type: Object,
        required: false
    },
    user: {
        type: Object,
        required: true
    },
    form: {
        type: Object,
        required: false
    },
});

defineEmits(['submit'])

const time = Date.now()
const now = new Date(time)

const exportPDF = () => {
    try {
        var element = document.getElementById('prescription');
        var opt = {
            margin: 2,
            filename: 'myfile.pdf',
            image: { type: 'jpeg', quality: 0.98 },
            html2canvas: { scale: 2, useCORS: true },
            jsPDF: { unit: 'cm', format: 'letter', orientation: 'landscape' }
        };
        html2pdf().from(element).set(opt).save();
    } catch (error) {
        console.error(error);
    }
};

const sharePDF = () => {
    var element = document.getElementById('prescription');
    var opt = {
        margin: 2,
        filename: 'myfile.pdf',
        image: { type: 'jpeg', quality: 0.98 },
        html2canvas: { scale: 2, useCORS: true },
        jsPDF: { unit: 'cm', format: 'letter', orientation: 'landscape' }
    };

    const resultPromise = html2pdf().from(element).set(opt).toPdf().output('datauristring')
    resultPromise.then((result) => {
        const base64StringWithoutHeader = result.split(',')[1];
        const blob = base64ToBlob(base64StringWithoutHeader, 'application/pdf')
        const filename = props.patient !== null ? `${props.patient?.name} ${props.patient?.lastname}.pdf` : 'formula.pdf';
        const file = new File([blob], filename, { type: 'application/pdf' });

        if (navigator.share && file) {
            try {
                const shareData = {
                    title: 'Prescripción Médica',
                    text: 'Echa un vistazo a tu fórmula médica.',
                    files: [file],
                };
                navigator.share(shareData);
            } catch (error) {
                console.error('Error al compartir:', error);
            }
        } else {
            alert('No se puede compartir el PDF en este momento.');
        }
    }).catch((error) => {
        console.error('Error al generar el PDF:', error);
    });

};

function calculateAge(birthdate) {
  const hoy = new Date();
  const fechaNac = new Date(birthdate);

  let edad = hoy.getFullYear() - fechaNac.getFullYear();
  const mesActual = hoy.getMonth();
  const mesNacimiento = fechaNac.getMonth();

  if (mesActual < mesNacimiento || (mesActual === mesNacimiento && hoy.getDate() < fechaNac.getDate())) {
    edad--;
  }

  return edad;
}

function base64ToBlob(base64String, mimeType = '') {
    const byteCharacters = atob(base64String);
    const byteArrays = [];

    for (let offset = 0; offset < byteCharacters.length; offset += 512) {
        const slice = byteCharacters.slice(offset, offset + 512);

        const byteNumbers = new Array(slice.length);
        for (let i = 0; i < slice.length; i++) {
            byteNumbers[i] = slice.charCodeAt(i);
        }
        const byteArray = new Uint8Array(byteNumbers);
        byteArrays.push(byteArray);
    }

    return new Blob(byteArrays, { type: mimeType });
}
</script>
<template>
    <div>
        <h1 class="text-xl font-medium mb-4">Formula Médica</h1>
        <div id="prescription" class="mb-4 overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr>
                        <th class="text-sm px-1 text-left text-blue-900 border-r border-l border-t border-blue-500 w-1/3">
                            Fecha de Expedición</th>
                        <th class="text-sm text-left text-blue-900 text-center">{{ user?.name + ' ' + user?.lastname }}</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-sm px-4 border-r border-l border-blue-500" rowspan="2">{{ now.toLocaleDateString()
                        }}</td>
                        <td class="text-sm text-center">{{ user?.medical_registry }}</td>
                    </tr>
                    <tr>
                        <td class="text-sm text-center pb-2">Celular {{ user?.phone }}</td>
                    </tr>
                </tbody>
            </table>
            <h2 class="text-sm font-black px-1 border border-blue-500 text-blue-900 bg-blue-300 rounded uppercase pb-2">
                Datos del
                paciente</h2>
            <table class="w-full border border-blue-500">
                <thead>
                    <tr>
                        <th class="text-sm px-1 text-left text-blue-900 border-r border-blue-500">Nombres</th>
                        <th class="text-sm px-1 text-left text-blue-900 border-r border-blue-500">Apellidos</th>
                        <th class="text-sm px-1 text-left text-blue-900 border-r border-blue-500">Edad</th>
                        <th class="text-sm px-1 text-left text-blue-900 border-r border-blue-500">Sexo</th>
                        <th class="text-sm px-1 text-left text-blue-900 border-r border-blue-500">Celular</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-sm px-4 border-r border-blue-500 pb-2">{{ patient?.name }}</td>
                        <td class="text-sm px-4 border-r border-blue-500 pb-2">{{ patient?.lastname }}</td>
                        <td class="text-sm px-4 border-r border-blue-500 pb-2">{{ calculateAge(patient?.birthdate) || '' }}</td>
                        <td class="text-sm px-4 border-r border-blue-500 pb-2">{{ patient?.sex }}</td>
                        <td class="text-sm px-4 pb-2">{{ patient?.phone }}</td>
                    </tr>
                </tbody>
            </table>
            <h2 class="text-sm font-black px-1 border border-blue-500 text-blue-900 bg-blue-300 rounded uppercase pb-2">
                Impresión
                diagnóstica</h2>
            <table class="w-full border border-blue-500">
                <tbody>
                    <tr>
                        <input id="diagnostic" type="text" class="border border-gray-300 w-full whitespace-normal"
                            aria-label="Diagnostic Impression" />
                    </tr>
                </tbody>
            </table>
            <h2 class="text-sm font-black px-1 border border-blue-500 text-blue-900 bg-blue-300 rounded uppercase pb-2">
                Medicamentos</h2>
            <table class="w-full border border-blue-500">
                <thead>
                    <tr>
                        <th class="text-sm px-1 text-left text-blue-900 border-r border-blue-500">No</th>
                        <th class="text-sm px-1 text-left text-blue-900 border-r border-blue-500">Prescripción</th>
                        <th class="text-sm px-1 text-left text-blue-900 border-r border-blue-500">Cantidad</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-sm px-4 border-r border-blue-500">{{ patient?.name }}</td>
                        <td v-if="form" class="text-sm px-4 border-r border-blue-500">{{ form?.active_ingredient +
                            '' + form?.pharmaceutical_form + ' ' + form?.concentration + ' tomar X ' + form?.frecuency + ' por ' +
                            form?.time + 'días' }}</td>
                        <td class="text-sm px-4">{{ patient?.phone }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="flex justify-end">
            <button type="submit" @click="sharePDF"
                class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                Compartir PDF
            </button>
            <button type="submit" @click="exportPDF"
                class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 ml-4">
                Descargar PDF
            </button>
        </div>

    </div>
</template>
