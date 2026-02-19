<script setup lang="ts">
import { usePage } from '@inertiajs/vue3';
import Layout from '@/layouts/Layout.vue';

console.log(usePage().props.auth.user.can);
const hasPermission = (permission: string) => {
    return usePage().props.auth.user?.can?.includes(permission) ? "true" : "false";
};
</script>

<template>
    <layout>
        Esto es el main
        {{ hasPermission("can crono") }}
        <!--        {{ $user->can('publicar articulos' )}}-->
    </layout>
</template>

<style scoped></style>
