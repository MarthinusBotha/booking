<script setup>

import { computed } from 'vue'
import BookingsList from '@/Components/Dashboard/BookingsList.vue'
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'

</script>

<template>
    <AuthenticatedLayout>
        <div class="flex flex-col">
            <h1 class="text-3xl font-bold">Bookings</h1>
            <BookingsList :bookingItems="$page.props.userBookingItems" />
        </div>
    </AuthenticatedLayout>
</template>
