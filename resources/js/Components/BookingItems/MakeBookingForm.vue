<script setup>

import { reactive } from 'vue'
import { router } from '@inertiajs/vue3'

defineProps({
    bookingItem: {
        type: Object,
        required: true,
    }
})

const userBookingState = reactive({
    booking_item_id: bookingItem.id,
    full_name: '',
    email: '',
    guests: 1,
    check_in: '',
    check_out: '',
    _token: this.$page.props.csrf_token,
})

function submit() {
    router.post('store-booking', userBookingState)
}

</script>

<template>
    <form @submit.prevent="submit">
        <input type="hidden" name="booking_item_id" v-model="userBookingState.booking_item_id">
        <label for="full_name" class="sr-only">Full Name</label>
        <input
            id="full_name"
            name="full_name"
            type="text"
            v-model="userBookingState.full_name"
            class="block w-full px-3 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md"
            placeholder="Full Name">
        <label for="email" class="sr-only">Email</label>
        <input
            id="email"
            name="email"
            type="email"
            v-model="userBookingState.email"
            class="block w-full px-3 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md"
            placeholder="Email">
        <label for="guests" class="sr-only">Guests</label>
        <input
            id="guests"
            name="guests"
            type="number"
            v-model="userBookingState.guests"
            class="block w-full px-3 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md"
            placeholder="Guests">
        <label for="check_in" class="sr-only">Check-in</label>
        <input
            id="check_in"
            name="check_in"
            type="date"
            v-model="userBookingState.check_in"
            class="block w-full px-3 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md"
            placeholder="Check-in">
        <label for="check_out" class="sr-only">Check-out</label>
        <input
            id="check_out"
            name="check_out"
            type="date"
            v-model="userBookingState.check_out"
            class="block w-full px-3 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md"
            placeholder="Check-out">
        <button type="submit" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
            Make Booking
            <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
            </svg>
        </button>
    </form>
</template>
