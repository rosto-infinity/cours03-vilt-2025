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
    <PrimaryButton @click="openModal" class="bg-green-500"><svg class="w-6 h-6 text-white dark:text-white"
                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="2"
                                        d="M10.779 17.779 4.36 19.918 6.5 13.5m4.279 4.279 8.364-8.643a3.027 3.027 0 0 0-2.14-5.165 3.03 3.03 0 0 0-2.14.886L6.5 13.5m4.279 4.279L6.499 13.5m2.14 2.14 6.213-6.504M12.75 7.04 17 11.28" />
                                </svg></PrimaryButton>

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
