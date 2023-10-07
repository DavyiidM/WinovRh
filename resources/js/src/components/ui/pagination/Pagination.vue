<script setup lang="ts">
import {
  PaginationEllipsis,
  PaginationFirst,
  PaginationLast,
  PaginationList,
  PaginationListItem,
  PaginationNext,
  PaginationPrev,
  PaginationRoot
} from 'radix-vue'
import {computed} from 'vue'

const props = defineProps({
  page: {
    type: Number,
    default: 1,
  },
  total: {
    type: Number,
  },
  itemsPerPage: {
    type: Number,
    default: 15
  },
  showEdges: {
    type: Boolean,
    default: false
  }
})

const pageTotal = computed(() => {
  const numbers = []
  const totalPages = Math.ceil(props.total / props.itemsPerPage)
  for (let i = 1; i <= totalPages; i++) {
    numbers.push(i)
  }
  return numbers
})

</script>

<template>
  <PaginationRoot
      :page="page"
      :total="total"
      :items-per-page="itemsPerPage"
      :show-edges="showEdges"
      :sibling-count="3"
      @update:page="pg=>$emit('updatePage', pg)"

  >
    <PaginationList  class="flex items-center gap-2">
      <PaginationFirst class="hidden lg:inline-flex"/>

        <PaginationListItem v-for="i in pageTotal" :key="i"
                            class="w-9 h-9 border rounded  data-[selected]:bg-green-600 data-[selected]:text-green-100 hover:bg-white/10 transition focus-within:outline focus-within:outline-1 focus-within:outline-offset-1"
                            :value="i">
          {{ i }}
        </PaginationListItem>

      <PaginationLast class="hidden lg:inline-flex"/>
    </PaginationList>
  </PaginationRoot>
</template>

<style scoped lang="postcss">

</style>
