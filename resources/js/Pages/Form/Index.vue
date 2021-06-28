<template>
  <app-layout>
    <template #header>
      <h2 class="text-xl font-semibold leading-tight text-gray-800">Forms</h2>
    </template>

    <div
      class="flex flex-col flex-1 w-full min-h-0 py-8 mx-auto sm:py-12 max-w-7xl sm:px-6 lg:px-8"
    >
      <div ref="scrollContainer" class="flex-1 overflow-auto">
        <ul>
          <li
            class="border-t first:border-t-0"
            v-for="form in allForms.data"
            :key="form.id"
          >
            <inertia-link
              class="block px-6 py-4 bg-white group focus:outline-none hover:outline-none"
              :href="route('form.show', { id: form.id })"
            >
              <h3 class="text-lg font-semibold text-gray-800 group-focus:underline group-hover:underline">
                {{ form.name }}
              </h3>
            </inertia-link>
          </li>
        </ul>

        <div
          v-if="allForms.next_page_url"
          class="px-6 py-4 text-center bg-white"
        >
          Loading...
        </div>
      </div>

      <div class="flex items-center justify-between px-6 mt-8 sm:px-0">
        <div class="text-gray-600">
          {{ allForms.total }} Forms
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
  data() {
    return {
      allForms: this.forms,
    }
  },
  mounted() {
    this.$refs.scrollContainer.onscroll = () => {
      const el = this.$refs.scrollContainer;

      if (el.scrollTop + el.clientHeight >= el.scrollHeight) {
        if (!this.allForms.next_page_url) return;

        axios.get(this.allForms.next_page_url)
          .then(response => {
            this.allForms = {
              ...response.data,
              data: [
                ...this.allForms.data,
                ...response.data.data,
              ]
            }
          })
      }
    }
  },
  props: {
    forms: Object,
  },
  components: {
    AppLayout,
  },
};
</script>
