<template>
    <app-layout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">Forms > {{ form.name }}</h2>
        </template>

        <div
            class="flex flex-col flex-1 py-8 mx-auto w-full max-w-7xl min-h-0 sm:py-12 sm:px-6 lg:px-8"
        >
            <div class="flex items-stretch min-h-0 border">
                <div
                    ref="scrollContainer"
                    class="overflow-auto flex-1"
                >
                    <ul>
                        <li
                            class="border-t first:border-t-0"
                            v-for="entry in entries.data"
                            :key="entry.id"
                        >
                            <inertia-link
                                class="block py-3 px-6"
                                href="#"
                            >
                                <div class="flex justify-between">
                                    <h3 class="text-xl font-semibold">
                                        {{ entry.sender }}
                                    </h3>

                                    <div>
                                        {{ entry.createdAt }}
                                    </div>
                                </div>

                                <div class="mt-2 text-gray-400 truncate">
                                    {{ entry.subject }}
                                </div>
                            </inertia-link>
                        </li>
                    </ul>

                    <div v-if="entries.data.length === 0" class="">
                        No entries yet!
                    </div>
                </div>

                <div class="flex-1 py-3 px-6 bg-gray-200">
                    Open an entry to view its contents here.
                </div>
            </div>
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
