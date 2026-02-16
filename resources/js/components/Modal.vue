<script setup lang="ts">

defineProps<{
    show: boolean;
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
                class="h-fit w-full max-w-md rounded-lg bg-white p-6 shadow-xl"
            >
                <div class="mt-6 flex justify-end">
                    <button
                        @click="emit('close')"
                        class="px-4 py-2 text-gray-500"
                    >
                        Cerrar
                    </button>
                </div>

                <slot></slot>
            </div>
        </div>
    </div>
</template>

<style scoped></style>
