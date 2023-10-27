<script setup>

import { computed } from 'vue'

app.config.globalProperties.$route = route

defineProps({
    bookingItems: {
        type: Array,
        required: true,
    },
})

const oddEven = computed(() => {
    return bookingItems.map((bookingItem, index) => {
        return index % 2 === 0 ? 'bg-white' : 'bg-gray-50';
    });
})

const rows = computed(() => {
    return bookingItems.map((bookingItem) => {
        return {
            full_name: bookingItem.full_name,
            email: bookingItem.email,
            guests: bookingItem.guests,
            check_in: bookingItem.check_in,
            check_out: bookingItem.check_out,
            status: bookingItem.status,
        };
    });
})

const hasRows = computed(() => {
    return rows.value.length > 0;
})

</script>

<!-- Generate booking items done from frontend Booking Item => full_name, email, guests, price, check-in, check-out, status as button dropdown to update status to aapproved or not  -->
<template>
    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full overflow-hidden sm:px-6 lg:px-8">
                <!-- <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg"> -->
                <table v-if="hasRows" class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Bookee
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Details
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Guests
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Check-in
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Check-out
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Status
                            </th>
                            <th scope="col" class="relative px-6 py-3">
                                <span class="sr-only">Edit</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(bookingItem, index) in bookingItems" :key="bookingItem.id" :class="oddEven[index]">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                {{ bookingItem.full_name }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ bookingItem.email }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ bookingItem.guests }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ bookingItem.check_in }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ bookingItem.check_out }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 capitalize">
                                {{ bookingItem.status }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <a :href="$route('view-booking')" class="text-indigo-600 hover:text-indigo-900">Update Booking</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div v-else class="bg-white px-4 py-5 border-b border-gray-200 sm:px-6">
                    <div class="text-sm text-gray-900">
                        No bookings found.
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style>
    .capitalize {
        text-transform: capitalize;
    }
</style>
