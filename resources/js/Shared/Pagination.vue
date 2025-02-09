<template>
  <ul class="inline-flex -space-x-px">
      <li>
          <Link :href="props.prev" prefetch
              :class="{'opacity-50 cursor-not-allowed': !hasPrev, 'bg-white border border-gray-300 text-gray-500 hover:bg-gray-100 hover:text-gray-700': hasPrev}"
              @click.prevent="hasPrev ? goToPage(props.prev) : null"
              :disabled="!hasPrev">Previous</Link>
      </li>

      <li class="active:bg-green-500" v-for="(link, index) in computedLinks" :key="index">
          <Link  
              :href="link.url" prefetch
              :class="{'bg-green-500 text-white p-2': link.url === currentLink, 'bg-white border border-gray-300 text-gray-500 hover:bg-gray-100 hover:text-gray-700': link.url !== currentLink}"
              @click.prevent="setCurrentLink(link.url)">
              {{ link.label }} 
          </Link>
      </li>

      <li>
          <Link :href="props.next" prefetch
              :class="{'opacity-50 cursor-not-allowed': !hasNext, 'bg-white border border-gray-300 text-gray-500 hover:bg-gray-100 hover:text-gray-700': hasNext}"
              @click.prevent="hasNext ? goToPage(props.next) : null"
              :disabled="!hasNext">Next</Link>
      </li>
  </ul>
</template>

<script setup>
import { computed, ref } from 'vue';

const props = defineProps({
  links: {
      type: Array,
      required: true
  },
  prev: {
      type: String,
      default: ""
  },
  next: {
      type: String,
      default: ""
  }
});

const currentLink = ref(props.links[0]?.url || ''); // Lien actif par défaut

const computedLinks = computed(() => {
  const linksArray = [...props.links]; // Créer une copie pour éviter de modifier l'original
  linksArray.shift(); // Retirer le premier élément
  linksArray.pop(); // Retirer le dernier élément
  return linksArray;
});

// Vérifier si 'Previous' et 'Next' doivent être désactivés
const hasPrev = computed(() => !!props.prev);
const hasNext = computed(() => !!props.next);

function setCurrentLink(link) {
  currentLink.value = link; // Mettre à jour le lien actif
}

function goToPage(link) {
  // Logique pour naviguer vers la page correspondante
  console.log(`Navigating to ${link}`);
  // Vous pouvez ajouter votre logique de navigation ici
}
</script>
