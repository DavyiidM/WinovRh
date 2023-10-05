<script setup>
defineProps({
    title: {
        type:[String,null],
        default: 'Winov RH Dashboard'
    }
})
</script>

<template>
    <div class="flex items-center justify-between space-y-2">
        <h2 class="text-3xl font-bold tracking-tight">
        {{ title }}
        </h2>

        <div class="flex items-center space-x-2">
            <slot name="options"></slot>
        </div>
      </div>
</template>