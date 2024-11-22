<script setup>
import { defineProps } from 'vue';
import localStorage from '@/localStorage';  
import Swal from 'sweetalert2';

const props = defineProps({
  id: {
    type: Number,
    required: true,
  },
  nombre: {
    type: String,
    required: true,
  },
  precio: {
    type: String,
    required: true,
  },
  imagen: {
    type: String,
    required: true,
  },
});

const agregarAlCarrito = () => {
  const producto = { 
    id: props.id,        
    nombre: props.nombre, 
    precio: props.precio, 
    imagen: props.imagen  
  };

  localStorage.agregarProducto(producto);  

  //SweetAlert
  Swal.fire({
    title: 'Producto agregado',
    text: `Agregaste "${props.nombre}" al carrito`,
    icon: 'success',
    timer: 2000,
    showConfirmButton: false,
  });
};
</script>

<template>
  <div class="card mb-4 shadow">
    <div class="card-img-container">
      <img :src="imagen" class="card-img-top" alt="Imagen del producto" />
    </div>
    <div class="card-body d-flex flex-column justify-content-center align-items-center">
      <h5 class="card-title">{{ nombre }}</h5>
      <p class="card-text">$ {{ precio }}</p>
      <button class="btn btn-outline-dark mb-2" @click="agregarAlCarrito">
        Agregar al carrito
      </button>
      <RouterLink class="btn btn-outline-dark" :to="{ path: '/producto', query: { id: id } }">
        Detalle del producto
      </RouterLink>
    </div>
  </div>
</template>

<style scoped>
.card.mb-4.shadow{
  max-width: 400px;
}
@media (width < 800px){
  .card.mb-4.shadow{
    max-width: 25 0px;
  } 
}
</style>