<script setup lang="ts">
import { cn } from '@/lib/utils'
</script>

<template>
  <nav
    :class="cn('flex items-center space-x-4 lg:space-x-6', $attrs.class ?? '')"
  >
    <a
      href="/admin"
      class="text-sm font-medium transition-colors hover:text-primary"
    >
      Dashboard
    </a>
    <a
      href="/admin/candidatos"
      class="text-sm font-medium text-muted-foreground transition-colors hover:text-primary"
    >
      Candidatos
    </a>
    <a
      href="/admin/vagas"
      class="text-sm font-medium text-muted-foreground transition-colors hover:text-primary"
    >
      Vagas
    </a>
    <a
      href="/admin/categorias"
      class="text-sm font-medium text-muted-foreground transition-colors hover:text-primary"
    >
      Categorias
    </a>
    <a
      href="/admin"
      class="text-sm font-medium text-muted-foreground transition-colors hover:text-primary"
    >
      Billing
    </a>
  </nav>
</template>