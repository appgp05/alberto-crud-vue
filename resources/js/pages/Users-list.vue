<script setup lang="ts">
import Table from '@/components/Table.vue';
import Layout from '@/layouts/Layout.vue';

defineProps({
    headers: Array<any>,
    users: Array<any>,
});
</script>

<template>
    <layout>
        <Table :fields="headers" :rows="users" :item="'user'"></Table>
    </layout>
</template>

<style scoped></style>
