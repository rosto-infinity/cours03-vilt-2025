<!-- resources/js/Pages/NiveauScolaire/EditeNiveauScolaire.vue -->
 <!-- resources/js/Pages/NiveauScolaire/EditeNiveauScolaire.vue -->
<script setup>
import { ref } from 'vue';
import { useForm } from '@inertiajs/vue3';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import Modal from '@/Components/Modal.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';

// On reçoit en props le niveau scolaire à éditer
const props = defineProps({
  niveauScolaire: {
    type: Object,
    required: true
  }
});

// Initialisation du formulaire avec les données existantes
const form = useForm({
  nom: props.niveauScolaire.nom,
});

const confirmingEdit = ref(false);
const nomInput = ref(null);

const openModal = () => {
  confirmingEdit.value = true;
};

const closeModal = () => {
  confirmingEdit.value = false;
  form.clearErrors();
};

const submitForm = () => {
  form.put(route('niveauScolaire.update', props.niveauScolaire.id), {
    preserveScroll: true,
    onSuccess: () => closeModal(),
    onError: () => nomInput.value.focus(),
  });
};
</script>

<template>
  <section class="space-y-6">
    <!-- Bouton pour ouvrir la modale d'édition -->
    <PrimaryButton @click="openModal" class="bg-green-500">Editer</PrimaryButton>

    <Modal :show="confirmingEdit" @close="closeModal">
      <div class="p-6">
        <div class="flex justify-between">
          <h2>Editer Niveau Scolaire</h2>
          <SecondaryButton @click="closeModal" class="bg-[#ffffff] border-0">
            <span class="text-red-600 text-xl">X</span>
          </SecondaryButton>
        </div>
        <form @submit.prevent="submitForm">
          <div class="mt-6">
            <InputLabel for="nom" value="Niveau Scolaire" class="flex"/>
            <TextInput
              id="nom"
              type="text"
              ref="nomInput"
              class="mt-1 block w-full"
              v-model="form.nom"
              required
              autofocus
              placeholder="Niveau Scolaire"
              autocomplete="none"
            />
            <InputError class="mt-2 flex" :message="form.errors.nom" />
          </div>
          <div class="mt-6 flex justify-end">
            <SecondaryButton @click="closeModal" class="bg-[red] hover:bg-[#c53434] text-white">
              Cancel
            </SecondaryButton>
            <PrimaryButton
              class="ms-3"
              :class="{ 'opacity-25': form.processing }"
              :disabled="form.processing"
              @click="submitForm"
            >
              Soumettre
            </PrimaryButton>
            <Transition
              enter-active-class="transition ease-in-out"
              enter-from-class="opacity-0"
              leave-active-class="transition ease-in-out"
              leave-to-class="opacity-0"
            >
              <p v-if="form.recentlySuccessful" class="text-sm text-green-600">
                Saved.
              </p>
            </Transition>
          </div>
        </form>
      </div>
    </Modal>
  </section>
</template>
