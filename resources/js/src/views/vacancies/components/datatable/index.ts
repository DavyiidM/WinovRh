import VacancyInterface from "@/services/vacancies/vacancy.interface";
import type {
    ColumnDef,
    // ColumnFiltersState,
    // SortingState,
    // VisibilityState,
} from '@tanstack/vue-table'
import dayjs from 'dayjs'
import {h} from "vue";
import {useVueTable} from "@tanstack/vue-table";

const formatDate = (date) => dayjs(date).format('DD/MM/YYYY HH:mm')

export const columns: ColumnDef<VacancyInterface>[] = [
    {
        accessorKey: 'id',
        header: '#',
    },
    {
        accessorKey: 'title',
        header: 'Titulo',
    },
    {
        accessorKey: 'subtitle',
        header: 'Subtitulo',
    },
    {
        accessorKey: 'slug',
        header: 'Slug',
    },
    {
        accessorKey: 'description',
        header: 'Descrição',
    },
    {
        accessorKey: 'name',
        header: 'Nome'
    },
    {
        accessorKey: 'created_at',
        header: 'Data de Criação',
        cell: ({row}) => {
            const formatted = formatDate(row.getValue('created_at'))
            return h('div', {class: 'text-xs text-gray-600'}, formatted)
        }
    }
    {
        accessorKey: 'expires_at',
        header: 'Data de expiração',
        cell: ({row}) => {
            const formatted = formatDate(row.getValue('expires_at'))
            return h('div', {class: 'text-xs text-gray-600'}, formatted)
        }
    }
]


