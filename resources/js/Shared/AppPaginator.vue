<template>
    <div class="md:flex md:justify-between ">
        <div class="pt-5">
            Affichage des résultats   {{ from }} à {{ to }} sur
            <span class="font-bold">{{ total }}</span>  
        </div>
        <div v-if="links.length > 3">
            <div class="flex flex-wrap" :class="$attrs.class">

                
                <template v-for="(link, index) in links" :key="index">
                    <div
                        v-if="link.url === null"
                        class="mb-1 mr-1 rounded border px-3 py-2 text-sm leading-4 opacity-30"
                        v-html="link.label"
                    />
                    <Link 
                        v-else
                        class="mb-1 mr-1 rounded border px-3 py-2 text-sm leading-4 hover:bg-green-200 hover:text-green-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2"
                        :class="{
                            'bg-green-600 text-white': link.active
                        }"
                        :href="link.url"
                        v-html="link.label"
                        prefetch
                    ></Link>
                </template>

             
                  
                 
            </div>
        </div>
    </div>
</template>

<script setup>
defineProps({
    links: {
        type: Array,
        required: true
    },
    from: {
        type: Number,
        required: true
    },
    to: {
        type: Number,
        required: true
    },
    total: {
        type: Number,
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
    
})

defineOptions({
    inheritAttrs: false
})
</script>
