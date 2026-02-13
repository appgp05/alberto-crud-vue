<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import Header from '@/components/Header.vue';
import Nav from '@/components/Nav.vue';

defineProps<{
    headers: Array<any>;
    projects: Array<any>;
}>();
</script>

<template>
    <Header></Header>
    <Nav></Nav>
    <div class="overflow-x-auto">
        <table class="table">
            <thead>
                <tr>
                    <th v-for="header in headers" :key="header">
                        {{ header }}
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="project in projects.data" :key="project.id">
                    <td>{{ project.name }}</td>
                    <td>{{ project.description }}</td>
                </tr>
            </tbody>
        </table>

        <div class="mt-6 flex items-center justify-center space-x-2">
            <template v-for="(link, index) in projects.links" :key="index">
                <!-- Si no hay URL (ej: botón "anterior" en la primera página), mostramos un span gris -->
                <span
                    v-if="!link.url"
                    v-html="link.label"
                    class="cursor-not-allowed rounded border px-4 py-2 text-gray-400 shadow-sm"
                ></span>

                <!-- Si hay URL, usamos el componente Link para navegación SPA -->
                <Link
                    v-else
                    :href="link.url"
                    v-html="link.label"
                    class="rounded border px-4 py-2 shadow-sm transition-colors hover:bg-gray-50"
                    :class="{
                        'bg-blue-600 font-bold text-white hover:bg-blue-700':
                            link.active,
                    }"
                />
            </template>
        </div>
    </div>
</template>

<style scoped></style>
