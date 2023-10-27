<script setup>

defineProps({
    bookingItem: {
        type: Object,
        required: true,
    },
})

</script>

<!-- Display booking item details: full_name, email, guests, price, check-in, check-out, etc. -->
<template>
    <p>Full Name: {{ bookingItem.full_name }}</p>
    <p>Email: {{ bookingItem.email }}</p>
    <p>Guests: {{ bookingItem.guests }}</p>
    <p>Price: {{ bookingItem.price }}</p>
    <p>Check-in: {{ bookingItem.check_in }}</p>
    <p>Check-out: {{ bookingItem.check_out }}</p>
</template>
