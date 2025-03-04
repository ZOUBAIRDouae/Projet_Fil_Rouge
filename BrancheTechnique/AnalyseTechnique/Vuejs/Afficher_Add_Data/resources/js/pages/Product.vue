<!-- resources/js/pages/Test.vue -->
<script setup lang="ts">
import { Head, Link, router } from '@inertiajs/vue3';
import { ref } from 'vue';

// Define the Product type
interface Product {
  id: number;
  name: string;
  description: string;
}

// Récupère la prop passée par le contrôleur
const props = defineProps<{ products: Product[] }>();

// Crée une copie réactive locale de la liste des produits
const localProducts = ref<Product[]>([...props.products]);

// Contrôle de la visibilité du modal
const isModalOpen = ref(false);

// Données simples du formulaire
const form = ref({
  name: '',
  description: ''
});

// Fonction pour basculer le modal
function toggleModal() {
  isModalOpen.value = !isModalOpen.value;
}

// Soumission du formulaire pour ajouter un produit
function submitForm() {
  router.post(
    '/Product',
    {
      name: form.value.name,
      description: form.value.description
    },
    {
      onSuccess: (response: any) => {
        // Ferme le modal et réinitialise le formulaire
        isModalOpen.value = false;
        form.value.name = '';
        form.value.description = '';
        // Ajoute le nouveau produit à la copie réactive locale
        if (response.props && response.props.product) {
          const newProduct = response.props.product as Product;
          localProducts.value.push(newProduct);
        } else {
          // Optionnel : recharger la page pour mettre à jour la liste
          router.reload();
        }
      }
    }
  );
}
</script>

<template>
  <Head title="Product" />
  <div class="min-h-screen bg-gray-100 p-8">
    <h1 class="text-3xl font-bold mb-4 text-gray-600">Product Page</h1>
    <p class="mb-4">This is the test page content.</p>
  
    <div class="relative overflow-x-auto mt-4">
      <!-- Bouton pour ouvrir le modal -->
      <button
        @click="toggleModal"
        class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5"
        type="button"
      >
        Add Product
      </button>

      <!-- Modal (affiché quand isModalOpen est true) -->
      <div
        v-show="isModalOpen"
        class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-50"
      >
        <div class="p-4 w-full max-w-md bg-white rounded-lg shadow">
          <!-- En-tête du modal -->
          <div class="flex justify-between items-center p-4 border-b">
            <h3 class="text-lg font-semibold">Create New Product</h3>
            <button @click="toggleModal" class="text-gray-400 hover:bg-gray-200 rounded-lg text-sm w-8 h-8">
              <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 14 14">
                <path d="M1 1l6 6m0 0l6 6M7 7l6-6M7 7l-6 6"/>
              </svg>
            </button>
          </div>

          <!-- Formulaire du modal -->
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
                <label class="block text-sm font-medium">Product Description</label>
                <input
                  v-model="form.description"
                  type="text"
                  class="w-full border p-2 rounded"
                  placeholder="Enter product description"
                />
              </div>
              <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 rounded-lg px-5 py-2.5">
                Add Product
              </button>
            </form>
          </div>
        </div>
      </div>

      <!-- Tableau des produits -->
      <table class="w-full text-sm text-left mt-4">
        <thead class="text-xs uppercase bg-gray-50">
          <tr>
            <th class="px-6 py-3">Product name</th>
            <th class="px-6 py-3">Description</th>
          </tr>
        </thead>
        <tbody>
          <tr
            v-for="product in localProducts"
            :key="product.id"
            class="bg-white border-b"
          >
            <td class="px-6 py-4">{{ product.name }}</td>
            <td class="px-6 py-4">{{ product.description }}</td>
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
  border: 1px solid #000000;
  color: #000000; /* Couleur du texte par défaut pour th et td */
}
th {
  background-color: #000000;
  color: #ffffff; /* Texte en blanc pour les en-têtes */
}

tbody tr:nth-child(even) {
  background-color: #f3f4f6; /* Gris clair */
}

button {
  color: white;
}

input {
  color: black;
  background-color: white;
  border: 1px solid #ccc;
}


</style>
