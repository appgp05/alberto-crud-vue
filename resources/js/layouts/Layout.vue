<script setup lang="ts">
import { ref } from 'vue';
import Header from '@/components/Header.vue';
import Modal from '@/components/Modal.vue';
import Nav from '@/components/Nav.vue';

const isModalOpen = ref(false);
const modalType = ref<'login' | 'register' | null>(null);

const openModal = (type: 'login' | 'register') => {
    modalType.value = type;
    isModalOpen.value = true;
};

const closeModal = () => {
    isModalOpen.value = false;
    modalType.value = null;
};
</script>

<template>
    <Modal :show="isModalOpen" :type="modalType" @close="closeModal()"></Modal>
    <Header @open-modal="openModal"></Header>
    <Nav></Nav>
    <slot></slot>
</template>

<style scoped></style>
