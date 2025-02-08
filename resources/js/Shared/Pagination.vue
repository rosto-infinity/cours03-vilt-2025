 <template>
   <ul class="inline-flex -space-x-px">
                

                <li>
                    <Link :href="props.prev" prefetch
                        class="bg-white border border-gray-300 text-gray-500 hover:bg-gray-100 hover:text-gray-700 ml-0 rounded-l-lg leading-tight py-2 px-3 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Previous</Link>
                </li>
                
                <li v-for="link in computedLinks">
                    <Link  
                    :href="link.url" prefetch
                        class="bg-white border border-gray-300 text-gray-500 hover:bg-gray-100 hover:text-gray-700 leading-tight py-2 px-3 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                        {{ link.label}} </Link>
                </li>
                
                <li>
                    <Link :href="props.next" prefetch
                        class="bg-white border border-gray-300 text-gray-500 hover:bg-gray-100 hover:text-gray-700 rounded-r-lg leading-tight py-2 px-3 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Next</Link>
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
    }
})

const computedLinks = computed(() => {
   props.links.shift();
   props.links.pop();
  return props.links;
})
 </script>
 
