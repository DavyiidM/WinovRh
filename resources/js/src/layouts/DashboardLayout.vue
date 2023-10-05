<script setup lang="ts">
import MainNav from '@/components/dashboard/MainNav.vue'
import Search from '@/components/dashboard/Search.vue'
import TeamSwitcher from '@/components/dashboard/TeamSwitcher.vue'
import UserNav from '@/components/dashboard/UserNav.vue'



</script>

<template>
  <div class="md:hidden">
    <VPImage
      alt="Dashboard"
      width="1280"
      height="1214" class="block" :image="{
        dark: '/examples/dashboard-dark.png',
        light: '/examples/dashboard-light.png',
      }"
    />
  </div>

  <div class="hidden flex-col md:flex">
    <div class="border-b">
      <div class="flex h-16 items-center px-4">
        <TeamSwitcher />
        <MainNav class="mx-6" />
        <div class="ml-auto flex items-center space-x-4">
          <Search />
          <UserNav />
        </div>
      </div>
    </div>
    <div class="flex-1 space-y-4 p-8 pt-6">
      
    <router-view/>
    </div>
  </div>
</template>