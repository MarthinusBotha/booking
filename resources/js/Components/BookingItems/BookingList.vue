<!-- Make card style booking items using tailwind CSS for each booking item -->
<script setup>

import { computed } from 'vue'

app.config.globalProperties.$route = route

defineProps({
    bookingItems: {
        type: Array,
        required: true,
    },
})

const hasRows = computed(() => {
    return bookingItems.value.length > 0;
})

const singularPlural = computed((value, string) => {
    return value > 1 ? `${value} ${string}s` : `${value} ${string}`;
})

</script>

<template>
    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full overflow-hidden sm:px-6 lg:px-8">

                <div v-if="hasRows" v-for="bookingItem in bookingItems" class="max-w-sm bg-white border border-gray-800 rounded-lg shadow">
                    <a :href="$route('make-booking', bookingItem.id)">
                        <img class="rounded-t-lg" :src="`https://placehold.co/600x400/orange/white?text${bookingItem.title}`" :alt="bookingItem.title" />
                    </a>
                    <div class="p-5">
                        <a :href="$route('make-booking', bookingItem.id)">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">{{ bookingItem.title }}</h5>
                        </a>
                        <p class="mb-3 text-sm font-medium text-gray-500">{{ singularPlural(bookingItem.guests, 'guest') }}, {{ singularPlural(bookingItem.bedrooms, 'bedroom') }}, {{ singularPlural(bookingItem.bathrooms, 'bathroom') }}, {{ singularPlural(bookingItem.garages, 'garages') }}</p>
                        <p class="mb-3 text-sm font-medium text-gray-500">{{ bookingItem.price }}</p>
                        <p class="mb-3 font-normal text-gray-700">{{ bookingItem.description }}</p>
                        <a :href="$route('make-booking', bookingItem.id)" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                            Make Booking
                            <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                            </svg>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</template>
