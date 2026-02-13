<script setup lang="ts">
import Table from '@/components/Table.vue';
import Layout from '@/layouts/Layout.vue';

defineProps({
    headers: Array<any>,
    projects: Array<any>,
});
</script>

<template>
    <layout>
        <Table :fields="headers" :rows="projects" :item="'project'"></Table>
    </layout>
</template>

<style scoped></style>
