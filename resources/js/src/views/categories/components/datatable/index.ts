import CategoryInterface from "@/services/categories/category.interface";
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

export const columns: ColumnDef<CategoryInterface>[] = [
    {
        accessorKey: 'id',
        header: '#',
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
]


