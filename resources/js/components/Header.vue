<script setup lang="ts">
import { usePage, Link } from '@inertiajs/vue3';

const user = usePage().props.auth.user;
</script>

<template>
    <div class="h-20 w-full bg-blue-500">
        <Link href="/login" v-if="!user" class="btn btn-primary"
            >Iniciar sesión</Link
        >
<!--        <Link :href="register()" v-if="!user" class="btn btn-primary"-->
<!--            >Registrarme</Link-->
<!--        >-->
<!--        <p v-if="user">Bienvenido, {{ user.name }}</p>-->
<!--        <Link :href="logout()" class="btn btn-primary">Cerrar sesión</Link>-->
    </div>
</template>

<style scoped></style>
