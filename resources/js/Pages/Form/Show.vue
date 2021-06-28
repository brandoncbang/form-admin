<template>
  <app-layout>
    <template #header>
      <h2 class="text-xl font-semibold leading-tight text-gray-800">Forms > {{ form.name }}</h2>
    </template>

    <div
      class="flex flex-col flex-1 w-full min-h-0 py-8 mx-auto sm:py-12 max-w-7xl sm:px-6 lg:px-8"
    >
      <ul ref="scrollContainer" class="flex-1 overflow-auto">
        <li
          class="border-t first:border-t-0"
          v-for="entry in entries.data"
          :key="entry.id"
        >
          From: {{ entry.sender }} - "{{ entry.subject }}"
        </li>
      </ul>
    </div>
  </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";

export default {
  props: {
    form: Object,
    entries: Object,
  },
  components: {
    AppLayout,
  },
};
</script>