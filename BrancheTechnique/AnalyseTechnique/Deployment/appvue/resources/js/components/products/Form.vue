
<script setup>


import { toDisplayString } from 'vue';
import { reactive , ref } from 'vue';

import {useRouter} from 'vue-router'


    const form = reactive({
        name:"",
        description:"",
        image:"",
        type:"",
        quantity:"",
        price:""
    })


    const router = useRouter();

    let errors = ref([])

    const handelSave = () => {
        axios.post('/api/products' , form)
         .then((response) => {
            router.push('/')
            toast.fire({icon: "success" , title:"product Added Successfully"})

         })
         .catch((error) => {
            if(error.response.status === 422){
                errors.value = error.response.data.errors
            }
         })
    }


    const handelFileChange = (e) => {   
        let file = e.target.files[0]
        let reader = new FileReader()
        reader.onloadend = (file) => {
            form.image = reader.result
        }
        reader.readAsDataURL(file)
    }

    const getImage = () => {
        let image = "/upload/no-image.png"
        if(form.image){
            if(form.image.indexOf("base64") != -1){
                image = form.image
            }else{
                image = "/public/upload/" + form.image
            }
        }
        return image
    }




</script>

<template>
<div class="products__create ">
    
    <div class="products__create__titlebar dflex justify-content-between align-items-center">
        <div class="products__create__titlebar--item">
            
            <h1 class="my-1">Add Product</h1>
        </div>
        <div class="products__create__titlebar--item">
            
            <button class="btn btn-secondary ml-1" @click="handelSave" >
                Save
            </button>
        </div>
    </div>

    <div class="products__create__cardWrapper mt-2">
        <div class="products__create__main">
            <div class="products__create__main--addInfo card py-2 px-2 bg-white">
                <p class="mb-1">Name</p>
                <input type="text" class="input" v-model="form.name">
                <small style="color:red" v-if="errors.name">{{errors.name}}</small>

                <p class="my-1">Description (optional)</p>
                <textarea cols="10" rows="5" class="textarea" v-model="form.description"></textarea>
                <small style="color:red" v-if="errors.description">{{errors.description}}</small>
                
                <div class="products__create__main--media--images mt-2">
                   <ul class="products__create__main--media--images--list list-unstyled">
                       <li class="products__create__main--media--images--item">
                           <div class="products__create__main--media--images--item--imgWrapper">
                               <img class="products__create__main--media--images--item--img" alt="" :src="getImage()" />  
                           </div>
                       </li>
                       <!-- upload image small -->
                       <li class="products__create__main--media--images--item">
                           <form class="products__create__main--media--images--item--form">
                               <label class="products__create__main--media--images--item--form--label" for="myfile">Add Image</label>
                               <input class="products__create__main--media--images--item--form--input" :src="getImage()"  type="file" id="myfile"  @change="handelFileChange">
                           </form>
                       </li>
                   </ul>
               </div>
           
            </div>

        </div>
        <div class="products__create__sidebar">
            <!-- Product Organization -->
            <div class="card py-2 px-2 bg-white">
                
                <!-- Product unit -->
                <div class="my-3">
                    <p>Product type</p>
                    <input type="text" class="input" v-model="form.type" >
                </div>
                <hr>

                <!-- Product invrntory -->
                <div class="my-3">
                    <p>Inventory</p>
                    <input type="text" class="input" v-model="form.inventory" >
                </div>
                <hr>

                <!-- Product Price -->
                <div class="my-3">
                    <p>Price</p>
                    <input type="text" class="input" v-model="form.price" >
                </div>
            </div>

        </div>
    </div>
    <!-- Footer Bar -->
    <div class="dflex justify-content-between align-items-center my-3">
        <p ></p>
        <button class="btn btn-secondary" @click="handelSave">Save</button>
    </div>

</div>




</template>