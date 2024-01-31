<script setup lang="ts">
import {
  Avatar,
  AvatarFallback,
  AvatarImage,
} from '@/components/ui/avatar'
</script>

<template>
  <div class="space-y-8">
    <div class="flex items-center">
      <Avatar class="h-9 w-9">
        <AvatarImage src="https://winov.com.br/wp-content/uploads/2023/01/ic_group@2x.png" alt="Avatar" />
        <AvatarFallback>TC</AvatarFallback>
      </Avatar>
      <div class="ml-4 space-y-1">
        <p class="text-sm font-medium leading-none">
          Tecnologia
        </p>
        <p class="text-sm text-foreground">
          Desenvolvedor PHP Pleno
        </p>
      </div>
      <div class="ml-auto font-medium">
        1/30
      </div>
    </div>
    <div class="flex items-center">
      <Avatar class="flex h-9 w-9 items-center justify-center space-y-0 border">
        <AvatarImage src="https://winov.com.br/wp-content/uploads/2023/01/ic_group@2x.png" alt="Avatar" />
        <AvatarFallback>RH</AvatarFallback>
      </Avatar>
      <div class="ml-4 space-y-1">
        <p class="text-sm font-medium leading-none">
          Recursos Humanos
        </p>
        <p class="text-sm text-foreground">
          Assistente Administrativo 
        </p>
      </div>
      <div class="ml-auto font-medium">
        2/150
      </div>
    </div>
    <div class="flex items-center">
      <Avatar class="h-9 w-9">
        <AvatarImage src="https://winov.com.br/wp-content/uploads/2023/01/ic_group@2x.png" alt="Avatar" />
        <AvatarFallback>CM</AvatarFallback>
      </Avatar>
      <div class="ml-4 space-y-1">
        <p class="text-sm font-medium leading-none">
          Comercial
        </p>
        <p class="text-sm text-foreground">
          Assessor Comercial
        </p>
      </div>
      <div class="ml-auto font-medium">
        3/55
      </div>
    </div>
    <div class="flex items-center">
      <Avatar class="h-9 w-9">
        <AvatarImage src="https://winov.com.br/wp-content/uploads/2023/01/ic_group@2x.png" alt="Avatar" />
        <AvatarFallback>CM</AvatarFallback>
      </Avatar>
      <div class="ml-4 space-y-1">
        <p class="text-sm font-medium leading-none">
          Comercial
        </p>
        <p class="text-sm text-foreground">
          SDR 
        </p>
      </div>
      <div class="ml-auto font-medium">
        1/188
      </div>
    </div>
    <div class="flex items-center">
      <Avatar class="h-9 w-9">
        <AvatarImage src="https://winov.com.br/wp-content/uploads/2023/01/ic_group@2x.png" alt="Avatar" />
        <AvatarFallback>TC</AvatarFallback>
      </Avatar>
      <div class="ml-4 space-y-1">
        <p class="text-sm font-medium leading-none">
          Tecnologia
        </p>
        <p class="text-sm text-foreground">
          Analista de Dados Sênior
        </p>
      </div>
      <div class="ml-auto font-medium">
        2/800
      </div>
    </div>
  </div>
</template>