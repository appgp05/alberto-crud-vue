<script setup lang="ts">
import { Link, router, useForm } from '@inertiajs/vue3';
import { ref } from 'vue';
import Modal from '@/components/Modal.vue';

const props = defineProps({
    fields: Array<any>,
    rows: Object,
    item: String,
});

const showModal = ref(false);

const form = useForm(
    props.fields
        ? props.fields.reduce((acc, field) => ({ ...acc, [field]: '' }), {
              id: null,
          })
        : { id: null },
);

const openEditModal = (row: any) => {
    form.id = row.id;
    if (props.fields) {
        props.fields.forEach((field) => {
            form[field] = row[field] || '';
        });
    }
    showModal.value = true;
};

const closeModal = () => {
    showModal.value = false;
    form.reset();
};

const updateRow = () => {
    form.put(`${props.item}/${form.id}`, {
        onSuccess: () => closeModal(),
    });
};

const deleteRow = (id: number) => {
    if (confirm('¿Estás seguro de eliminar este proyecto?')) {
        router.delete(`${props.item}/${id}`);
    }
};
</script>

<template>
    <Modal :show="showModal" @close="closeModal()">
        <div class="p-6">
            <h3 class="mb-4 text-lg font-bold">Modificar {{ item }}</h3>

            <form @submit.prevent="updateRow" class="space-y-4">
                <div v-for="field in fields" :key="field">
                    <label class="block text-sm font-medium">{{ field }}</label>
                    <input
                        type="text"
                        v-model="form[field]"
                        class="input w-full rounded border p-2"
                    />
                    <textarea v-if="field.includes('description')">

                    </textarea>
                </div>
                <!--                <div>-->
                <!--                    <label class="block text-sm font-medium">Nombre</label>-->
                <!--                    <input-->
                <!--                        v-model="form.name"-->
                <!--                        type="text"-->
                <!--                        class="w-full rounded border p-2"-->
                <!--                        required-->
                <!--                    />-->
                <!--                    <div v-if="form.errors.name" class="text-xs text-red-500">-->
                <!--                        {{ form.errors.name }}-->
                <!--                    </div>-->
                <!--                </div>-->

                <!--                <div>-->
                <!--                    <label class="block text-sm font-medium">Descripción</label>-->
                <!--                    <textarea-->
                <!--                        v-model="form.description"-->
                <!--                        class="w-full rounded border p-2"-->
                <!--                    ></textarea>-->
                <!--                </div>-->

                <div class="mt-4 flex justify-end gap-2">
                    <button
                        type="button"
                        @click="closeModal"
                        class="btn rounded border px-4 py-2"
                    >
                        Cancelar
                    </button>
                    <button
                        type="submit"
                        @click="updateRow"
                        class="rounded bg-blue-600 px-4 py-2 text-white hover:bg-blue-700"
                        :disabled="form.processing"
                    >
                        {{
                            form.processing ? 'Guardando...' : 'Guardar Cambios'
                        }}
                    </button>
                </div>
            </form>
        </div>
    </Modal>

    <div class="overflow-x-auto">
        <table class="table">
            <thead>
                <tr>
                    <th v-for="field in fields" :key="field">
                        {{ field }}
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="row in rows?.data" :key="row.id">
                    <td v-for="field in fields" :key="field">
                        {{ row[field] }}
                    </td>
                    <td>
                        <button
                            @click="openEditModal(row)"
                            class="rounded bg-yellow-500 px-3 py-1 text-sm text-white transition hover:bg-yellow-600"
                        >
                            Modificar
                        </button>
                    </td>
                    <td>
                        <button
                            @click="deleteRow(row.id)"
                            class="btn btn-primary"
                        >
                            Eliminar
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>

        <div class="mt-6 flex items-center justify-center space-x-2">
            <template v-for="(link, index) in rows?.links" :key="index">
                <span
                    v-if="!link.url"
                    v-html="link.label"
                    class="cursor-not-allowed rounded border px-4 py-2 text-gray-400 shadow-sm"
                ></span>

                <Link
                    v-else
                    :href="link.url"
                    class="rounded border px-4 py-2 shadow-sm transition-colors hover:bg-gray-50"
                    :class="{
                        'bg-blue-600 font-bold text-white hover:bg-blue-700':
                            link.active,
                    }"
                >
                    <span v-html="link.label"></span>
                </Link>
            </template>
        </div>
    </div>
</template>

<style scoped></style>
