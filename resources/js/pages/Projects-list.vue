<script setup lang="ts">
import Header from '@/components/Header.vue';
import Nav from '@/components/Nav.vue';
import Table from '@/components/Table.vue';

defineProps({
    headers: Array<any>,
    projects: Array<any>
});
</script>

<template>
    <Header></Header>
    <Nav></Nav>
    <Table :fields="headers" :rows="projects" :item="'project'"></Table>
</template>

<style scoped></style>
