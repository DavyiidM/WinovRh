<script setup lang="ts">
import { onMounted } from 'vue';
import { useRoute, useRouter } from 'vue-router';
import { useCandidate } from '@/services/candidates';
import { useToast } from 'vue-toastification';


const route = useRoute()
const router = useRouter()
const uuid = route.params.uuid
const toast = useToast()

const { show: showService } = useCandidate()
const { show, candidate } = showService()
onMounted(async () => {
    await show(uuid).catch(err => {
        router.push({ name: 'admin.candidates.index' })
            .then(() => toast.error('Çandidato nào encontrado'))
    })
})
</script>

<template>


    <p class="" v-if="candidate">{{ candidate.name }}</p>
    <p class="" v-if="candidate">{{ candidate.email }}</p>
    <p class="" v-if="candidate">{{ candidate.linkedin }}</p>
    <p class="" v-if="candidate">{{ candidate.github }}</p>




</template>