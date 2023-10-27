<script setup>

import { computed } from 'vue'
import BookingList from '@/Components/BookingItems/BookingList.vue'
import GuestLayout from '@/Layouts/GuestLayout.vue'

</script>

<template>
    <GuestLayout>
        <div class="flex flex-col">
            <h1 class="text-3xl font-bold">Bookings</h1>
            <BookingList :bookingItems="$page.props.bookingItems" />
        </div>
    </GuestLayout>
</template>
