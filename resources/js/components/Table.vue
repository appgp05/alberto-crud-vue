<script setup lang="ts">
import { Link, router } from '@inertiajs/vue3';

const props = defineProps({
    fields: Array<string>,
    rows: Object,
    item: String,
});

const deleteRow = (id: number) => {
    if (confirm('¿Estás seguro de eliminar este proyecto?')) {
        router.delete(`${props.item}/${id}`);
    }
};
</script>

<template>
    <div class="overflow-x-auto">
        <table class="table">
            <thead>
                <tr>
                    <th v-for="field in fields" :key="field">
                        {{ field }}
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="row in rows?.data" :key="row.id">
                    <td v-for="field in fields" :key="field">
                        {{ row[field] }}
                    </td>
                    <td>
                        <button
                            @click="deleteRow(row.id)"
                            class="btn btn-primary"
                        >
                            Eliminar
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>

        <div class="mt-6 flex items-center justify-center space-x-2">
            <template v-for="(link, index) in rows?.links" :key="index">
                <span
                    v-if="!link.url"
                    v-html="link.label"
                    class="cursor-not-allowed rounded border px-4 py-2 text-gray-400 shadow-sm"
                ></span>

                <Link
                    v-else
                    :href="link.url"
                    class="rounded border px-4 py-2 shadow-sm transition-colors hover:bg-gray-50"
                    :class="{
                        'bg-blue-600 font-bold text-white hover:bg-blue-700':
                            link.active,
                    }"
                >
                    <span v-html="link.label"></span>
                </Link>
            </template>
        </div>
    </div>
</template>

<style scoped></style>
