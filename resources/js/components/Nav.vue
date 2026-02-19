<script setup lang="ts">
import { usePage } from '@inertiajs/vue3';

const hasPermission = (permission: string) => {
    for (const p of usePage().props.auth.can) {
        if (p.name == permission) {
            return true;
        }
    }

    return false;
};
</script>

<template>
    <div>
        <a href="main" class="btn btn-primary">Main</a>
        <a href="users-list" class="btn btn-primary">Usuarios</a>
        <a href="projects-list" class="btn btn-primary">Projects</a>
        <a v-if="hasPermission('see crono')" href="cronometro" class="btn btn-primary">Cronometro</a>
    </div>
</template>

<style scoped></style>
