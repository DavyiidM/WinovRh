<script setup lang="ts">
import {Button} from '@/components/ui/button'
import {Input} from '@/components/ui/input'
import {Label} from '@/components/ui/label'
import {
  Sheet,
  SheetClose,
  SheetContent,
  SheetDescription,
  SheetFooter,
  SheetHeader,
  SheetTitle,
  SheetTrigger,
} from '@/components/ui/sheet'

import {ref} from 'vue'

defineProps({
  btnText: {
    type: String
  },
  title: {
    type: String
  },
  description: {
    type: [null, String],
    default: () => null
  },

})

const open = ref(false)

const emit = defineEmits(['open', 'close'])

const toggle = () => {
  open.value = !open.value
  emit(open.value ? 'open':'close')
}

defineExpose({
  toggle
})

</script>

<template>
  <Sheet v-model:open="open">
    <SheetTrigger as-child>
      <Button>{{ btnText }}</Button>
    </SheetTrigger>
    <SheetContent>
      <SheetHeader>
        <SheetTitle>{{ title }}</SheetTitle>
        <SheetDescription v-if="description">{{ description }}</SheetDescription>
      </SheetHeader>
      <slot/>
      <SheetFooter v-if="$slots.footer">
        <slot name="footer"/>
      </SheetFooter>
    </SheetContent>
  </Sheet>
</template>
