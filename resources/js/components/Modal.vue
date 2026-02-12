<script setup lang="ts">
import Login from '@/pages/auth/Login.vue';
import Register from '@/pages/auth/Register.vue';

const props = defineProps<{
    show: boolean;
    type: 'login' | 'register' | null;
}>();

const emit = defineEmits(['close']);
</script>
<template>
    <div
        v-if="show"
        class="bg-opacity-50 fixed inset-0 z-50 flex items-center justify-center bg-black/50"
    >
        <div
            v-if="show"
            class="bg-opacity-50 fixed inset-0 z-50 flex items-center justify-center"
        >
            <div
                class="max-h-[70vh] w-full max-w-md rounded-lg bg-white p-6 shadow-xl"
            >
                <div class="mt-6 flex justify-end">
                    <button
                        @click="emit('close')"
                        class="px-4 py-2 text-gray-500"
                    >
                        Cerrar
                    </button>
                </div>

                <div v-if="type === 'login'">
                    <Login
                        :can-reset-password="false"
                        :can-register="true"
                    ></Login>
                </div>

                <div v-if="type === 'register'">
                    <Register></Register>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped></style>
