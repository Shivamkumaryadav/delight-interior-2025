<script setup lang="ts">
import AdminLayout from '@/Pages/Layouts/AdminLayout.vue';

</script>

<template>
    <AdminLayout>
    <div class="max-w-6xl mx-auto bg-white rounded-xl shadow p-6">
    <!-- Header -->
    <div class="mb-6">
      <h1 class="text-2xl font-bold">All Films</h1>
    </div>

    <!-- Filters and Search -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-6">
      <input
        type="text"
        placeholder="Search films..."
        class="w-full md:w-1/3 px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500"
      />

      <div class="flex flex-wrap gap-2">
        <select class="px-4 py-2 border rounded-md">
          <option>All Categories</option>
          <option>Automotive</option>
          <option>Residential</option>
          <option>Commercial</option>
        </select>

        <select class="px-4 py-2 border rounded-md">
          <option>UV Block %</option>
        </select>

        <select class="px-4 py-2 border rounded-md">
          <option>Sort</option>
        </select>
      </div>
    </div>

    <!-- Table -->
    <div class="overflow-x-auto rounded-lg shadow">
      <table class="min-w-full text-sm text-left text-gray-700 whitespace-nowrap">
        <thead class="bg-gray-100 text-xs uppercase font-semibold">
          <tr>
            <th class="px-6 py-4">Film ID</th>
            <th class="px-6 py-4">Name</th>
            <th class="px-6 py-4">Thumbnail</th>
            <th class="px-6 py-4">Category</th>
            <th class="px-6 py-4">UV Block %</th>
            <th class="px-6 py-4">Actions</th>
          </tr>
        </thead>
        <tbody>
          <tr class="border-t">
            <td class="px-6 py-4">#12345</td>
            <td class="px-6 py-4">Solar Shield 5000</td>
            <td class="px-6 py-4">
              <img src="https://via.placeholder.com/40" alt="Thumbnail" class="w-10 h-10 rounded object-cover" />
            </td>
            <td class="px-6 py-4">Automotive</td>
            <td class="px-6 py-4">99%</td>
            <td class="px-6 py-4">
              <div class="flex space-x-2">
                <button class="text-blue-600 hover:underline">Edit</button>
                <button class="text-red-600 hover:underline">Delete</button>
              </div>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
    </AdminLayout>
</template>