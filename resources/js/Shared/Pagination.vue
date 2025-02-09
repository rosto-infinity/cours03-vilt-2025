<template>
  <ul class="inline-flex -space-x-px">
      <li>
          <Link :href="props.prev" prefetch
              class="bg-white border border-gray-300 text-gray-500 hover:bg-gray-100 hover:text-gray-700 ml-0 rounded-l-lg leading-tight py-2 px-3 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
              Previous
          </Link>
      </li>

      <li v-for="link in computedLinks" :key="link.url" :class="{'active:bg-green-600 text-white': link.url === props.active}">
          <Link  
              :href="link.url" prefetch
              class="border border-gray-300 hover:bg-gray-100 hover:text-gray-700 leading-tight py-2 px-3 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
              {{ link.label }}
          </Link>
      </li>

      <li>
          <Link :href="props.next" prefetch
              class="bg-white border border-gray-300 text-gray-500 hover:bg-gray-100 hover:text-gray-700 rounded-r-lg leading-tight py-2 px-3 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
              Next
          </Link>
      </li>
  </ul>
</template>

<script setup>
import { computed } from 'vue';

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
  },
  active: {
      type: String, // Change to String to hold the active link URL
      required: true
  }
});

// Calculer les liens sans modifier props.links directement
const computedLinks = computed(() => {
  const linksArray = [...props.links]; // Créer une copie pour éviter de modifier l'original
  linksArray.shift(); // Retirer le premier élément
  linksArray.pop(); // Retirer le dernier élément
  return linksArray;
});
</script>
