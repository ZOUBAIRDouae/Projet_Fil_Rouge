<!-- resources/js/Pages/TestPage.vue -->
<script setup lang="ts">
import { Head,  router } from '@inertiajs/vue3';
import { ref } from 'vue';

// Define the Product type
interface Product {
  id: number;
  name: string;
  description: string;
  quantity: number;
}

// Receive the products prop from the Inertia response
// If no products are passed, default to an empty array.
const { products = [] } = defineProps<{ products: Product[] }>();

// Control modal visibility
const isModalOpen = ref(false);

// Simple form data to capture new product input
const form = ref({
  name: '',
  description: '',
  quantity: '',
});

// Function to toggle the modal
function toggleModal() {
  isModalOpen.value = !isModalOpen.value;
}

// Function to submit the form
function submitForm() {
  // Post the new product data to the store route
  router.post(
    route('product.store'),
    {
      name: form.value.name,
      description: form.value.description,
      quantity: form.value.quantity,
    },
    {
      onSuccess: (response) => {
        // Close modal and reset form fields
        isModalOpen.value = false;
        form.value.name = '';
        form.value.description = '';
        form.value.quantity = '';
      
        products.push(response.props.product);
      }
    }
  );
}
</script>

<template>
  <Head title="Test Page" />
  <div class="min-h-screen bg-gray-100 p-8">
    <h1 class="text-3xl font-bold mb-4">Test Page</h1>
    <p class="mb-4">
      Below is the list of products fetched from the database.
    </p>

    <!-- Button to open modal -->
    <button
      @click="toggleModal"
      class="block mt-4 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5"
      type="button"
    >
      Add New Product
    </button>

    <!-- Modal: show/hide with v-show -->
    <div
      v-show="isModalOpen"
      class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-50"
    >
      <div class="p-4 w-full max-w-md bg-white rounded-lg shadow">
        <div class="flex justify-between items-center p-4 border-b">
          <h3 class="text-lg font-semibold">Create New Product</h3>
          <button @click="toggleModal" class="text-gray-400 hover:bg-gray-200 rounded-lg text-sm w-8 h-8">
            <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 14 14">
              <path d="M1 1l6 6m0 0l6 6M7 7l6-6M7 7l-6 6"/>
            </svg>
          </button>
        </div>

        <div class="p-4">
          <form @submit.prevent="submitForm">
            <div class="mb-4">
              <label class="block text-sm font-medium">Product Name</label>
              <input
                v-model="form.name"
                type="text"
                class="w-full border p-2 rounded"
                placeholder="Enter product name"
              />
            </div>
            <div class="mb-4">
              <label class="block text-sm font-medium">Description</label>
              <input
                v-model="form.description"
                type="text"
                class="w-full border p-2 rounded"
                placeholder="Enter product description"
              />
            </div>
            <div class="mb-4">
              <label class="block text-sm font-medium">Quantity</label>
              <input
                v-model="form.quantity"
                type="number"
                class="w-full border p-2 rounded"
                placeholder="Enter product quantity"
              />
            </div>
            <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 rounded-lg px-5 py-2.5">
              Add Product
            </button>
          </form>
        </div>
      </div>
    </div>

    <!-- Products table -->
    <div class="relative overflow-x-auto mt-8">
      <table class="w-full text-sm text-left text-gray-500">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
          <tr>
            <th class="px-6 py-3">Product Name</th>
            <th class="px-6 py-3">Description</th>
            <th class="px-6 py-3">Quantity</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="product in products" :key="product.id" class="bg-white border-b">
            <td class="px-6 py-4 font-medium text-gray-900">{{ product.name }}</td>
            <td class="px-6 py-4">{{ product.description }}</td>
            <td class="px-6 py-4">{{ product.quantity }}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<style scoped>
table {
  width: 100%;
  border-collapse: collapse;
}
th,
td {
  padding: 8px;
  border: 1px solid #ddd;
}
th {
  background-color: #f4f4f4;
}
</style>