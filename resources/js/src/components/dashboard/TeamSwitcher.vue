<script setup lang="ts">
import { ref } from 'vue'
import {CaretSortIcon, CheckIcon, PlusCircledIcon} from '@radix-icons/vue'
import { cn } from '@/lib/utils'
import {
  Avatar,
  AvatarFallback,
  AvatarImage,
} from '@/components/ui/avatar'
import { Button } from '@/components/ui/button'

import {
  Dialog,
  DialogContent,
  DialogDescription,
  DialogFooter,
  DialogHeader,
  DialogTitle,
  DialogTrigger,
} from '@/components/ui/dialog'
import { Command, CommandEmpty, CommandGroup, CommandInput, CommandItem, CommandList, CommandSeparator } from '@/components/ui/command'
import { Input } from '@/components/ui/input'
import { Label } from '@/components/ui/label'
import {
  Popover,
  PopoverContent,
  PopoverTrigger,
} from '@/components/ui/popover'
import {
  Select,
  SelectContent,
  SelectItem,
  SelectTrigger,
  SelectValue,
} from '@/components/ui/select'

const groups = [
  {
    label: 'Personal Account',
    teams: [
      {
        label: 'Alicia Koch',
        value: 'personal',
      },
    ],
  },
  {
    label: 'Teams',
    teams: [
      {
        label: 'Acme Inc.',
        value: 'acme-inc',
      },
      {
        label: 'Monsters Inc.',
        value: 'monsters',
      },
    ],
  },
]

type Team = (typeof groups)[number]['teams'][number]

const open = ref(false)
const showNewTeamDialog = ref(false)
const selectedTeam = ref<Team>(groups[0].teams[0])
</script>

<template>
  <Dialog v-model:open="showNewTeamDialog">
    <div class="flex static bg-foregroun border-white border- w-40  mx-4  ">
      <img src="https://winov.com.br/wp-content/uploads/2022/08/Logo_white_BG_RGB.png" alt="">
    </div>
  </Dialog>
</template>