<template>
  <div>
    <h1 class="text-xl font-bold">My Todos</h1>
    <Link href="/todos/create" class="btn">Create Todo</Link>

    <ul>
      <li v-for="todo in todos" :key="todo.id">
        {{ todo.title }} - {{ todo.remind_at }}
        <Link :href="`/todos/${todo.id}/edit`">Edit</Link>
        <form :action="`/todos/${todo.id}`" method="POST" @submit.prevent="deleteTodo(todo.id)">
          <input type="hidden" name="_method" value="DELETE">
          <button type="submit">Delete</button>
        </form>
      </li>
    </ul>
  </div>
</template>

<script setup>
import { Link, router } from '@inertiajs/vue3';
defineProps({ todos: Array });

function deleteTodo(id) {
  if (confirm('Delete this todo?')) {
    router.delete(`/todos/${id}`);
  }
}
</script>
