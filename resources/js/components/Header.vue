<script setup lang="ts">
import { usePage, Link } from '@inertiajs/vue3';

const user = usePage().props.auth.user;
const emit = defineEmits<{
    (e: 'open-modal', type: 'login' | 'register'): void;
}>();
</script>

<template>
    <div class="h-20 w-full bg-blue-500">
        <button
            @click="emit('open-modal', 'login')"
            class="btn btn-sm btn-primary"
        >
            Iniciar sesión
        </button>

        <button
            @click="emit('open-modal', 'register')"
            class="btn btn-sm btn-primary"
        >
            Registrarme
        </button>
        <!--        <Link href="/login" v-if="!user" class="btn btn-primary"-->
        <!--            >Iniciar sesión</Link-->
        <!--        >-->
        <!--        <Link :href="register()" v-if="!user" class="btn btn-primary"-->
        <!--            >Registrarme</Link-->
        <!--        >-->
        <!--        <p v-if="user">Bienvenido, {{ user.name }}</p>-->
        <!--        <Link :href="logout()" class="btn btn-primary">Cerrar sesión</Link>-->
    </div>
</template>

<style scoped></style>
