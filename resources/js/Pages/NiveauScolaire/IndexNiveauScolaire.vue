<!-- resources/js/Pages/NiveauScolaire/IndexNiveauScolaire.vue -->
<template>
    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Liste de tous les niveaux scolaires
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <div class="max-w-full">
                            <table class="w-full table-auto">
                                <thead>
                                    <tr>
                                        <th>
                                            <CreateNiveauScolaire />
                                        </th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                    <tr class="bg-gray-2 text-left dark:bg-meta-4">
                                        <th class="min-w-[220px] px-4 py-4 font-medium text-black dark:text-white xl:pl-11">
                                            Niveau scolaire
                                        </th>
                                        <th class="px-4 py-4 font-medium text-black dark:text-white">
                                            Date
                                        </th>
                                        <th class="px-4 py-4 font-medium text-black dark:text-white">
                                            Actions
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="niveauScolaire in props.niveauScolaires.data" :key="niveauScolaire.id" >
                                        <td class="border-b border-[#eee] px-4 py-5 pl-9 dark:border-strokedark xl:pl-11">
                                            <h5 class="font-medium text-black dark:text-white">{{ niveauScolaire.nom }}</h5>
                                        </td>
                                        <td class="border-b border-[#eee] px-4 py-5 pl-9 dark:border-strokedark xl:pl-11">
                                            <h5 class="font-medium text-black dark:text-white">
                                                {{ formatDate(niveauScolaire.created_at) }}
                                            </h5>
                                        </td>
                                        <td class="border-b border-[#eee] px-4 py-5 dark:border-strokedark">
                                            <div class="flex items-center space-x-3.5">
                                                <EditeNiveauScolaire :niveauScolaire="niveauScolaire" />
                                                <!-- Intégration du composant de suppression -->
                                                <DeleteNiveauScolaire :niveauScolaire="niveauScolaire" />
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            <div class="mt-4 justify-center">
                                                <AppPaginator
                                                    :links="niveauScolaires.links"
                                                    :from="niveauScolaires.from || 0"
                                                    :to="niveauScolaires.to || 0"
                                                    :total="niveauScolaires.total || 0"
                                                />
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import AppPaginator from '@/Shared/AppPaginator.vue';
import CreateNiveauScolaire from './CreateNiveauScolaire.vue';
import EditeNiveauScolaire from './EditeNiveauScolaire.vue';
import DeleteNiveauScolaire from './DeleteNiveauScolaire.vue';

const props = defineProps({
    niveauScolaires: {
        type: Object,
        required: true
    }
});

const formatDate = (dateString) => {
    const date = new Date(dateString);
    const options = {
        year: 'numeric',
        month: '2-digit',
        day: '2-digit',
        hour: 'numeric',
        minute: '2-digit',
        second: '2-digit',
        weekday: 'long'
    };
    return date.toLocaleDateString('fr-FR', options);
};
</script>
