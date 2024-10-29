<script setup>
defineProps({
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
</script>
<template>
    <div class="card mb-4 shadow">
        <div class="card-img-container">
            <img :src="imagen" class="card-img-top" alt="Imagen del producto">
        </div>
        <div class="card-body d-flex flex-column justify-content-center align-items-center">
            <h5 class="card-title">{{ nombre }}</h5>
            <p class="card-text">$ {{ precio }}</p>
            <button class="btn btn-outline-dark" @click="agregarAlCarrito(producto)">Agregar al carrito</button>
        </div>
    </div>
</template>