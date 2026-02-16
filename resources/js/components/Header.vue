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
    <div class="h-20 w-full bg-blue-500">
        <button
            v-if="!user"
            @click="emit('open-modal', 'login')"
            class="btn btn-sm btn-primary"
        >
            Iniciar sesión
        </button>

        <button
            v-if="!user"
            @click="emit('open-modal', 'register')"
            class="btn btn-sm btn-primary"
        >
            Registrarme
        </button>

        <div v-if="user">
            <p class="font-bold text-white">
                Bienvenido de nuevo, {{ user.name }}
            </p>

            <Link
                :href="logout()"
                method="post"
                as="button"
                class="btn btn-primary"
            >
                Cerrar sesión
            </Link>
        </div>
    </div>
</template>

<style scoped></style>
