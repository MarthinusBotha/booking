<script setup>

import MakeBookingForm from '@/Components/BookingItems/MakeBookingForm.vue'
import GuestLayout from '@/Layouts/GuestLayout.vue'

defineProps({
    bookingItem: {
        type: Object,
        required: true,
    }
})

</script>

<template>
    <GuestLayout>
        <div class="flex flex-col">
            <h1 class="text-3xl font-bold">Make Booking</h1>
            <MakeBookingForm :bookingItem="bookingItem" />
        </div>
    </GuestLayout>
</template>
