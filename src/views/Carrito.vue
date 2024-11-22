<script>
import localStorageHelper from '@/localStorage';

export default {
  data() {
    return {
      carrito: [],
    };
  },
  created() {
    this.carrito = localStorageHelper.getCarrito();
  },
  methods: {
    eliminarProducto(id) {
      localStorageHelper.eliminarProducto(id);
      this.carrito = localStorageHelper.getCarrito();
    },
    totalCarrito() {
      return this.carrito.reduce((total, item) => total + item.precio * item.cantidad, 0).toFixed(2);
    },
  },
};
</script>

<template>
  <div class="container mt-4 d-flex flex-column">
    <h1>Mi Carrito</h1>
    <div v-if="carrito.length">
      <div v-for="item in carrito" :key="item.id" class="row mb-3">
        <div class="col-md-2">
          <img :src="item.imagen" alt="Imagen del producto" class="img-fluid rounded" />
        </div>
        <div class="col-md-6">
          <h5>{{ item.nombre }}</h5>
          <p>Cantidad: {{ item.cantidad }}</p>
        </div>
        <div class="col-md-2">
          <p>$ {{ (item.precio * item.cantidad).toFixed(2) }}</p>
        </div>
        <div class="col-md-2">
          <button class="btn btn-danger" @click="eliminarProducto(item.id)">Eliminar</button>
        </div>
      </div>
      <div class="text-end">
        <h3>Total: $ {{ totalCarrito() }}</h3>
      </div>
    </div>
    <div v-else>
      <p>El carrito está vacío.</p>
    </div>
  </div>
</template>
