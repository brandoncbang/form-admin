<template>
    <app-layout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Forms
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                    <ul>
                        <li v-for="form in forms.data" :key="form.id">
                            <inertia-link
                                :href="route('form.show', {'id': form.id})"
                            >
                                <h3>{{ form.name }}</h3>
                            </inertia-link>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'

    export default {
        props: {
            forms: Object,
        },
        components: {
            AppLayout,
        },
    }
</script>
