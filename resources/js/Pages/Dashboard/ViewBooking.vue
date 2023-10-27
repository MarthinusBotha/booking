<script setup>

import { computed } from 'vue'
import BookingItem from '@/Components/BookingItems/BookingItem.vue'
import BookingItemForm from '@/Components/Dashboard/BookingItemForm.vue'
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'

</script>

<template>
    <AuthenticatedLayout>
        <div class="flex flex-col">
            <h1 class="text-3xl font-bold">View Booking</h1>
            <BookingItemForm :bookingItem="$page.props.bookingItem" />
            <BookingItem :bookingItem="$page.props.bookingItem" />
        </div>
    </AuthenticatedLayout>
</template>
