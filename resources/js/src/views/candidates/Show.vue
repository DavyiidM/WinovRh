<script setup lang="ts">
import { onMounted } from 'vue';
import { useRoute, useRouter } from 'vue-router';
import { useCandidate } from '@/services/candidates';
import { useToast } from 'vue-toastification';
import { Card, CardTitle, CardDescription } from "@/components/ui/card";
import { AspectRatio } from '@/components/ui/aspect-ratio';
import Header from '@/components/dashboard/Header.vue';


const route = useRoute()
const router = useRouter()
const uuid = route.params.uuid
const toast = useToast()

const { show: showService } = useCandidate()
const { show, candidate } = showService()
onMounted(async () => {
    await show(uuid).catch(err => {
        router.push({ name: 'admin.candidates.index' })
            .then(() => toast.error('Candidato não encontrado'))
    })
})
</script>

<template>
    <div class=" flex justify-center ">
        <Header title="Candidato(a):   ">
        </Header>
    </div>

    <div class="flex justify-center gap-10">
        <div class="max-w-md w-full">
            <Card>
                <div class="p-4 space-y-4">
                    <div class="text-2xl font-bold" v-if="candidate">{{ candidate.name }}</div>
                    <div class="text-gray-600" v-if="candidate"><span class="text-2x1 font-bold">E-mail: </span>{{
                        candidate.email }}</div>
                        <div class="text-gray-600" v-if="candidate"><span class="text-2x1 font-bold">Telefone:</span>{{
                        candidate.phone }}</div>
                    <div class="text-gray-600" v-if="candidate"><span class="text-2x1 font-bold">Linkedin: </span>{{
                        candidate.linkedin }}</div>
                    <div class="text-gray-600" v-if="candidate"><span class="text-2x1 font-bold">Github: </span>{{
                        candidate.github }}</div>
                </div>
            </Card>
        </div>
        <div class="max-w-md w-full">
            <Card class="p-4 space-y-4">
                <div class="text-2xl font-bold">Currículo</div>
                <AspectRatio :ratio="16 / 9">
                
                    <iframe v-if="candidate" :src="candidate.resume" width="100%" height="500px"></iframe>
                    
                </AspectRatio>
                

            </Card>
        </div>
    </div>
</template>

