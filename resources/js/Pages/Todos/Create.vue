<template>
  <div class="p-6">
    <h1 class="text-2xl font-bold mb-4">Create Todo</h1>

    <form @submit.prevent="submit">
      <div class="mb-4">
        <label class="block mb-1 font-semibold">Title</label>
        <input v-model="form.title" type="text" class="w-full border px-3 py-2 rounded" required />
      </div>

      <div class="mb-4">
        <label class="block mb-1 font-semibold">Description</label>
        <textarea v-model="form.description" class="w-full border px-3 py-2 rounded"></textarea>
      </div>

      <div class="mb-4">
        <label class="block mb-1 font-semibold">Reminder Time</label>
        <input v-model="form.remind_at" type="datetime-local" class="w-full border px-3 py-2 rounded" required />
      </div>

      <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
        Create
      </button>
    </form>
  </div>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3'
import { router } from '@inertiajs/vue3'

const form = useForm({
  title: '',
  description: '',
  remind_at: '',
})

function submit() {
  form.post('/todos', {
    onSuccess: () => {
      router.visit('/todos')
    },
  })
}
</script>