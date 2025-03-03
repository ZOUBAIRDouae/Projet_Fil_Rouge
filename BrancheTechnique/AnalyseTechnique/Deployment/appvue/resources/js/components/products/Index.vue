

<script setup>
    import axios from 'axios';
    import { useRouter } from 'vue-router'
    import { ref , onMounted } from 'vue';

        const router = useRouter()

        let products = ref([])

        onMounted(async () => {
            getProducts()
        })

        const newProduct = () => {
           router.push('/products/create')
        }

        const ourImage = (img) => {
            return "/upload/"+img 
        }

        const getProducts = async () => {
            let response = await axios.get('/api/products')
             .then((response) => {
                products.value = response.data.products
             })
        }

</script>



<template>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<div class="container">
      
      <div class="products__list table  my-3">
                
          <div class="customers__titlebar dflex justify-content-between align-items-center">
              <div class="customers__titlebar--item">
                  <h1 class="my-1">Products</h1>
              </div>
              <div class="customers__titlebar--item">
                  <button class="btn btn-secondary my-1"   @click="newProduct" >
                      Add Product
                  </button>
              </div>
          </div>
  
          <div class="table--heading mt-2 products__list__heading " style="padding-top: 20px;background:#FFF">
              <!-- <p class="table--heading--col1">&#32;</p> -->
              <p class="table--heading--col1">image</p>
              <p class="table--heading--col2">
                  Product
              </p>
              <p class="table--heading--col4">Type</p>
              <p class="table--heading--col3">
                  Inventory
              </p>
              <!-- <p class="table--heading--col5">&#32;</p> -->
              <p class="table--heading--col5">actions</p>
          </div>
  
          <!-- product 1 -->
          <div class="table--items products__list__item" v-for="product in products" :key="product.id">
              <div class="products__list__item--imgWrapper">
                  <img class="products__list__item--img" :src="ourImage(product.image)"  style="height: 40px;" >
              </div>
                <p> {{ product.name }} </p>
              <p class="table--items--col2">
                  {{product.type}}
              </p>
              <p class="table--items--col3">{{product.quantity}}</p>     
              <div>     
                  <button class="btn-icon btn-icon-success" >
                      <i class="fas fa-pencil-alt"></i>
                  </button>
                  <button class="btn-icon btn-icon-danger" >
                      <i class="far fa-trash-alt"></i>
                  </button>
              </div>
          </div>
  
      </div>

</div>







</template>