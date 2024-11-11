<script setup>
defineProps({
  id: {
    type: Number,
    required:  true
  },
  nombre: {
    type: String,
    required: true
  },
  precio: {
    type: String,
    required: true
  },
  imagen: { 
    type: String,
    required: true
  }
})

// Método de ejemplo para el botón "Detalle del producto"
const verDetalleProducto = () => {
  console.log("Detalle del producto: aún sin funcionalidad implementada");
}
</script>

<template>
  <div class="card mb-4 shadow">
    <div class="card-img-container">
      <img :src="imagen" class="card-img-top" alt="Imagen del producto">
    </div>
    <div class="card-body d-flex flex-column justify-content-center align-items-center">
      <h5 class="card-title">{{ nombre }}</h5>
      <p class="card-text">$ {{ precio }}</p>
      <button class="btn btn-outline-dark mb-2" @click="agregarAlCarrito(producto)">Agregar al carrito</button>
      <RouterLink class="btn btn-outline-dark" :to="{path: '/producto', query: {id: id}}">Detalle del producto</RouterLink>
    </div>
  </div>
</template>
