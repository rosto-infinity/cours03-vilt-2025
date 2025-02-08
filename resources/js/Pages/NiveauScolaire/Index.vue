<template>

    <Head title="Niveau scolaire" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Niveau scolaire
            </h2>

        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <div
                            class="rounded-sm border border-stroke bg-white px-5 pb-2.5 pt-6 shadow-default dark:border-strokedark dark:bg-boxdark sm:px-7.5 xl:pb-1">
    <div class="max-w-full ">
        <table class="w-full table-auto">
            <thead>
                <tr class="bg-gray-2 text-left dark:bg-meta-4">
                    <th
                        class="min-w-[220px] px-4 py-4 font-medium text-black dark:text-white xl:pl-11">
                        Nivaeu scolaire
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
                <tr v-for="niveauScolaire in props.niveauScolaires.data">
                    <td
                        class="border-b border-[#eee] px-4 py-5 pl-9 dark:border-strokedark xl:pl-11">
                        <h5 class="font-medium text-black dark:text-white">{{ niveauScolaire.nom
                            }}</h5>

                    </td>
                    <td
                        class="border-b border-[#eee] px-4 py-5 pl-9 dark:border-strokedark xl:pl-11">
                        <h5 class="font-medium text-black dark:text-white">
                            {{ formatDate(niveauScolaire.created_at)
                            }}</h5>

                    </td>

                    <td class="border-b border-[#eee] px-4 py-5 dark:border-strokedark">
                        <div class="flex items-center space-x-3.5">
                            <button class="hover:text-green-700 bg-green-500  p-1 rounded-md">
                                <svg class="w-6 h-6 text-white dark:text-white"
                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="2"
                                        d="M10.779 17.779 4.36 19.918 6.5 13.5m4.279 4.279 8.364-8.643a3.027 3.027 0 0 0-2.14-5.165 3.03 3.03 0 0 0-2.14.886L6.5 13.5m4.279 4.279L6.499 13.5m2.14 2.14 6.213-6.504M12.75 7.04 17 11.28" />
                                </svg>

                            </button>
                            <button class="hover:text-red-700 bg-red-500  p-1  rounded-md">
                                <svg class="w-6 h-6 text-white dark:text-white"
                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="2"
                                        d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z" />
                                </svg>

                            </button>

                        </div>
                    </td>
                </tr>
                <tr>

                    <td>
                        <div>
                            <Pagination :links="props.niveauScolaires.links" 
                                :prev="props.niveauScolaires.prev_page_url"
                                :next="props.niveauScolaires.next_page_url" />
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
        </div>
    </AuthenticatedLayout>
</template>
<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Pagination from '@/Shared/Pagination.vue';
import { Head } from '@inertiajs/vue3';

const props = defineProps({
    niveauScolaires: {
        type: Object,
        required: true
    }
})

const formatDate = (dateString) => {
    const date = new Date(dateString);
    const options = {
        year: 'numeric',
        month: '2-digit',
        day: '2-digit',
        hour: 'numeric'
    };
    return date.toLocaleDateString('fr-FR', options);
}
</script>
