
   <script setup>
//    resources/js/Pages/NiveauScolaire/CreateNiveauScolaire.vue
   import InputError from '@/Components/InputError.vue';
   import InputLabel from '@/Components/InputLabel.vue';
   import Modal from '@/Components/Modal.vue';
   import SecondaryButton from '@/Components/SecondaryButton.vue';
   import TextInput from '@/Components/TextInput.vue';
   import { useForm } from '@inertiajs/vue3';
   import PrimaryButton from '@/Components/PrimaryButton.vue';
   import {  ref } from 'vue';

   const confirmingCreateNiveauScolaire = ref(false);
   const nomInput = ref(null);
   
   const form = useForm({
    nom:'',
   });
   
   const createNiveauScolaire = () => {
       confirmingCreateNiveauScolaire.value = true;   
   };
   
const submitForm = () => {
    form.post(route('niveauScolaire.store'), {
        preserveScroll: true,
        onSuccess: () => closeModal(),
        onError: () => nomInput.value.focus(),
        onFinish: () => form.reset(),
    });
};
   
   const closeModal = () => {
       confirmingCreateNiveauScolaire.value = false;
       form.clearErrors();
       form.reset();
   };
   </script>
   
   <template>
       <section class="space-y-6">
           
   
           <PrimaryButton @click="createNiveauScolaire" class="bg-green-500" >+ 👉 Nouveau</PrimaryButton>
   
           <Modal :show="confirmingCreateNiveauScolaire" @close="closeModal">
               <div class="p-6">
                <div class="flex justify-between">
                    <h2>Ajouter un Niveau scolaire</h2>
                     <SecondaryButton @click="closeModal" class="bg-[#ffffff] border-0">
                          <span class="text-red-600 text-xl">X</span>
                       </SecondaryButton>
                </div>
                   
                <form @submit.prevent="submitForm">
                   <div class="mt-6">
                        <InputLabel for="nom" value="Niveau Scolaire"  class="flex"/>
                        <TextInput
                            id="nom"
                            type="text"
                            ref="nomdInput"
                            class="mt-1 block w-full"
                            v-model="form.nom"
                            required
                            autofocus
                            placeholder="Niveau Scolaire"
                            autocomplete="none"
                        />
                            <!-- <h3>{{ form.nom }}</h3> -->
                        <InputError class="mt-2 flex" :message="form.errors.nom"  />
                       
                   </div>
        
                    <div class="mt-6 flex items-center justify-end">
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
                    <p
                        v-if="form.recentlySuccessful"
                        class="text-sm text-green-600"
                    >
                        Saved.
                    </p>
                </Transition>
                     </div>
                </form>
                   
               </div>
           </Modal>
       </section>
   </template>
   
