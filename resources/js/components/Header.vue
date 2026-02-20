<script setup lang="ts">
import { usePage, Link } from '@inertiajs/vue3';
import { computed } from 'vue';
import { logout } from '@/routes';

const user = computed(() => usePage().props.auth.user);
const emit = defineEmits<{
    (e: 'open-modal', type: 'login' | 'register'): void;
}>();
</script>

<template>
    <div class="flex h-20 w-full items-center gap-10 bg-blue-500 pl-10">
        <p v-if="!user" class="font-bold text-white">Bienvenido a la web de gestión de proyectos y alumnos</p>

        <button
            v-if="!user"
            @click="emit('open-modal', 'login')"
            class="btn btn-primary"
        >
            Iniciar sesión
        </button>

        <button
            v-if="!user"
            @click="emit('open-modal', 'register')"
            class="btn btn-primary"
        >
            Registrarme
        </button>

        <div v-if="user" class="flex h-full w-full items-center justify-evenly">
            <p class="font-bold text-white">
                Bienvenido de nuevo, {{ user.name }}
            </p>

            <Link
                :href="logout()"
                method="post"
                as="button"
                class="btn btn-error"
            >
                Cerrar sesión
            </Link>
        </div>
    </div>
</template>

<style scoped></style>
