<!-- resources/js/Pages/etudiant/Indexetudiant.vue -->
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
                                          <!-- <Createetudiant/> -->
                                      </th>
                                      <th></th>
                                      <th></th>
                                  </tr>
                                  <tr class="bg-gray-2 text-left dark:bg-meta-4">
                                      <th class="min-w-[220px] px-4 py-4 font-medium text-black dark:text-white xl:pl-11">
                                          Etudiant
                                      </th>
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
                                  <tr v-for="etudiant in props.etudiants.data" :key="etudiant" >
                                      <td class="border-b border-[#050404] px-4 py-5 pl-9 dark:border-strokedark xl:pl-11">
                                          <h5 class="font-medium text-black dark:text-white">
                                            {{ etudiant.nom }} {{ etudiant.prenom }}
                                        </h5>
                                      </td>
                                      <td class="border-b border-[#050404] px-4 py-5 pl-9 dark:border-strokedark xl:pl-11">
                                          <h5 class="font-medium text-black dark:text-white">
                                            {{ etudiant.niveau_scolaire_id.nom }} 
                                        </h5>
                                      </td>
                                      <td class="border-b border-[#eee] px-4 py-5 pl-9 dark:border-strokedark xl:pl-11">
                                          <h5 class="font-medium text-black dark:text-white">
                                              {{ formatDate(etudiant.created_at) }}
                                          </h5>
                                      </td>
                                      <td class="border-b border-[#eee] px-4 py-5 dark:border-strokedark">
                                          <div class="flex items-center space-x-3.5">
                                              <EditEtudiant :etudiant="etudiant" />
                                              <!-- Intégration du composant de suppression -->
                                              <DeleteEtudiant :etudiant="etudiant" />
                                          </div>
                                      </td>
                                  </tr>
                                  <tr>
                                      <td colspan="3">
                                          <div class="mt-4 justify-center">
                                              <AppPaginator
                                                  :links="etudiants.links"
                                                  :from="etudiants.from || 0"
                                                  :to="etudiants.to || 0"
                                                  :total="etudiants.total || 0"
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

import EditEtudiant from './EditEtudiant.vue';

import AppPaginator from '@/Shared/AppPaginator.vue';
import DeleteEtudiant from './DeleteEtudiant.vue';


const props = defineProps({
  etudiants: {
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
