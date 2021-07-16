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
                                class="block py-3 px-4"
                                href="#"
                            >
                                <div class="flex justify-between items-center">
                                    <h3 class="flex-1 text-xl font-semibold truncate">
                                        {{ entry.sender }}
                                    </h3>

                                    <div class="ml-6">
                                        {{ relativeTime(entry.createdAt) }}
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

            <div class="flex justify-between items-center px-6 mt-8 sm:px-0">
                <div class="text-gray-600">
                    {{ entries.total }} Entries
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
import {DateTime} from "luxon";

import AppLayout from "@/Layouts/AppLayout";

export default {
    data() {
        return {}
    },
    mounted() {
        // Maybe update time ago on interval?
    },
    methods: {
        relativeTime(t) {
            return DateTime.fromISO(t).toRelative();
        }
    },
    props: {
        form: Object,
        entries: Object,
    },
    components: {
        AppLayout,
    },
};
</script>
