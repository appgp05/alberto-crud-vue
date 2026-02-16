<script setup lang="ts">
import { ref } from 'vue';
import Header from '@/components/Header.vue';
import Modal from '@/components/Modal.vue';
import Nav from '@/components/Nav.vue';
import Login from '@/pages/auth/Login.vue';
import Register from '@/pages/auth/Register.vue';

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
    <Modal :show="isModalOpen" @close="closeModal()">
        <div v-if="modalType === 'login'">
            <Login :can-reset-password="false" :can-register="true"></Login>
        </div>

        <div v-if="modalType === 'register'">
            <Register></Register>
        </div>
    </Modal>
    <Header @open-modal="openModal"></Header>
    <Nav></Nav>
    <slot></slot>
</template>

<style scoped></style>
