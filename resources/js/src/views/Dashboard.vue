<script setup lang="ts">
import {
    Accordion,
    AccordionContent,
    AccordionItem,
    AccordionTrigger
} from '@/components/ui/accordion';

import {Button} from '@/components/ui/button'

import { Badge } from '@/components/ui/badge'

</script>

<template>
 <div class="space-y-10">
     <div class="w-full">
         <Accordion type="single" collapsible>
             <AccordionItem value="item-1">
                 <AccordionTrigger>David</AccordionTrigger>
                 <AccordionContent>
                     Alterei
                 </AccordionContent>
             </AccordionItem>
         </Accordion>
     </div>
     <div class="w-full">
         <Button>Oopa</Button>
     </div>
     <div class="w-full">
         <Badge>Simbora Dev</Badge>
     </div>
 </div>
</template>

<style scoped>

</style>
