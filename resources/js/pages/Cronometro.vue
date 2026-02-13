<script setup lang="ts">
import { onUnmounted, ref, watch } from 'vue';
import Layout from '@/layouts/Layout.vue';

const milisegundosTotales = ref(0);
const milisegundos = ref(0);
const segundos = ref(0);
const minutos = ref(0);
const running = ref(false);
let interval: any = null;

watch(running, () => {
    if (running.value) {
        const inicio = Date.now() - milisegundosTotales.value;

        interval = setInterval(() => {
            milisegundosTotales.value = Date.now() - inicio;
            milisegundos.value = (Date.now() - inicio) % 1000;
            segundos.value = Math.floor(((Date.now() - inicio) / 1000) % 60);
            minutos.value = Math.floor(
                ((Date.now() - inicio) / (1000 * 60)) % 60,
            );
        }, 1);
    } else {
        clearInterval(interval);
    }
});

const startStop = () => {
    running.value = !running.value;
};

const reset = () => {
    running.value = false;
    milisegundosTotales.value = 0;
    milisegundos.value = 0;
    segundos.value = 0;
    minutos.value = 0;
    clearInterval(interval);
};

onUnmounted(() => clearInterval(interval));
</script>

<template>
    <layout>
        <div>
            <div
                className="bg-base-200 flex min-h-screen items-center justify-center"
            >
                <div className="card bg-base-100 w-96 p-8 shadow-xl">
                    <div className="mb-6 flex items-end justify-center gap-4">
                        <div
                            className="bg-base-200 rounded-lg px-4 py-3 text-center"
                        >
                            <div className="font-mono text-4xl">
                                {{ minutos }}
                            </div>
                            <div className="text-xs opacity-60">MIN</div>
                        </div>

                        <div className="pb-4 font-mono text-3xl">:</div>

                        <div
                            className="bg-base-200 rounded-lg px-4 py-3 text-center"
                        >
                            <div className="font-mono text-4xl">
                                {{ segundos }}
                            </div>
                            <div className="text-xs opacity-60">SEG</div>
                        </div>

                        <div className="pb-4 font-mono text-3xl">:</div>

                        <div
                            className="bg-base-200 rounded-lg px-4 py-3 text-center"
                        >
                            <div className="font-mono text-2xl">
                                {{ milisegundos }}
                            </div>
                            <div className="text-xs opacity-60">MS</div>
                        </div>
                    </div>

                    <div className="flex justify-center gap-4">
                        <button @click="startStop" className="btn btn-primary">
                            {{ running ? 'Stop' : 'Start' }}
                        </button>
                        <button @click="reset" className="btn btn-outline">
                            Reset
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </layout>
</template>

<style scoped></style>
