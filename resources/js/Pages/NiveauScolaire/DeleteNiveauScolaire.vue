<!-- resources/js/Pages/NiveauScolaire/DeleteNiveauScolaire.vue -->
<script setup>
import { ref } from 'vue';
import { useForm } from '@inertiajs/vue3';
import Modal from '@/Components/Modal.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';

const props = defineProps({
  niveauScolaire: {
    type: Object,
    required: true,
  },
});

// Contrôle de l'affichage de la modale de confirmation
const confirmingDelete = ref(false);

// Utilisation d'un formulaire Inertia (aucune donnée n'est envoyée)
const form = useForm({});

// Ouvre la modale de confirmation
const openDeleteModal = () => {
  confirmingDelete.value = true;
};

// Ferme la modale de confirmation
const closeDeleteModal = () => {
  confirmingDelete.value = false;
};

// Fonction de suppression : envoie une requête DELETE vers la route dédiée
const deleteNiveauScolaire = () => {
  form.delete(route('niveauScolaire.destroy', props.niveauScolaire.id), {
    preserveScroll: true,
    onSuccess: () => closeDeleteModal(),
  });
};
</script>

<template>
  <div>
    <!-- Bouton de suppression -->
    <SecondaryButton @click="openDeleteModal" class="bg-[red] hover:bg-red-700 text-white p-[2px] rounded-md">
      <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
          d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M1 7h22M8 7V4a1 1 0 011-1h6a1 1 0 011 1v3" />
      </svg>
    </SecondaryButton>

    <!-- Modale de confirmation -->
    <Modal :show="confirmingDelete" @close="closeDeleteModal">
      <div class="p-6">
        <h2 class="text-xl mb-4">Confirmer la suppression</h2>
        <p class="mb-4">
          Êtes-vous sûr de vouloir supprimer le niveau scolaire 
          <strong>{{ niveauScolaire.nom }}</strong> ?
        </p>
        <div class="flex justify-end space-x-3">
          <SecondaryButton @click="closeDeleteModal" class="bg-[#25d425] hover:bg-[#258825] text-white">
            Annuler
          </SecondaryButton>
          <PrimaryButton @click="deleteNiveauScolaire" class="bg-[red] hover:bg-red-700 text-white">
            Supprimer
          </PrimaryButton>
        </div>
      </div>
    </Modal>
  </div>
</template>
