<script setup lang="ts">
import Header from '@/components/Header.vue';
import Nav from '@/components/Nav.vue';

defineProps<{
    projects: {
        id: number;
        name: string;
        description: string | null;
    }[];
}>();
</script>

<template>
    <Header></Header>
    <Nav></Nav>
    esto es proyectos
</template>

<style scoped></style>
