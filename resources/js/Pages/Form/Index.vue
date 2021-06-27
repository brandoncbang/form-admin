<template>
  <app-layout>
    <template #header>
      <h2 class="text-xl font-semibold leading-tight text-gray-800">Forms</h2>
    </template>

    <div
      class="flex flex-col flex-1 w-full min-h-0 py-12 mx-auto max-w-7xl sm:px-6 lg:px-8"
    >
      <ul class="flex-1 overflow-auto">
        <li
          class="border-t first:border-t-0"
          v-for="form in forms.data"
          :key="form.id"
        >
          <inertia-link
            class="block px-6 py-4 bg-white focus:shadow-lg focus:relative focus:z-10 hover:shadow-lg hover:relative hover:z-10 hover:outline-none focus:outline-none"
            :href="route('form.show', { id: form.id })"
          >
            <h3 class="text-lg font-semibold text-gray-800">
              {{ form.name }}
            </h3>
          </inertia-link>
        </li>
      </ul>

      <div class="flex items-center justify-between py-6">
        <div class="text-gray-600">
          <span v-text="forms.data.length"></span> Forms
        </div>

        <button
          class="px-6 py-3 text-lg font-semibold text-white bg-indigo-500 rounded shadow-md focus:outline-none focus:ring focus:ring-indigo-400 focus:ring-opacity-50"
        >
          + Create Form
        </button>
      </div>
    </div>
  </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";

export default {
  props: {
    forms: Object,
  },
  components: {
    AppLayout,
  },
};
</script>
