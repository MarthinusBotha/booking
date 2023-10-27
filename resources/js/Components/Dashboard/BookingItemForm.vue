<script setup>

import { reactive } from 'vue'
import { router } from '@inertiajs/vue3'

defineProps({
    bookingItem: {
        type: Object,
        required: true,
    },
    statuses: {
        type: Array,
        required: true,
    },
})

const bookingItemState = reactive({
    booking_item_id: bookingItem.id,
    status: bookingItem.status,
    _token: this.$page.props.csrf_token,
})

function submit() {
    router.put('bookings.update', bookingItemState)
}

</script>

<template>
    <form @submit.prevent="submit">
        <input type="hidden" name="booking_item_id" v-model="bookingItemState.booking_item_id">
        <label for="status" class="sr-only">Status</label>
        <select
            id="status"
            name="status"
            v-model="bookingItemState.status"
            class="block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md capitalize">
            <option v-for="status in statuses" :key="status" :value="status">
                {{ status }}
            </option>
        </select>
    </form>
</template>

<style>
    .capitalize {
        text-transform: capitalize;
    }
</style>
