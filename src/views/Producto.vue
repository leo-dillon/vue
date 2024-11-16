<script>
import localStorageHelper from '@/localStorage';
import Swal from 'sweetalert2';
import ApiService from '@/API/apiService';

export default {
  data() {
    return {
      producto: null,
    };
  },
  created() {
    this.apiService = new ApiService('http://127.0.0.1/basevue');
    const id = this.$route.query.id;
    this.loadProductoID(id);
  },
  methods: {
    async loadProductoID(id) {
      try {
        const response = await this.apiService.getProductoID(id);
        this.producto = response[0];
      } catch {
        alert('Error al cargar el producto');
      }
    },
    agregarAlCarrito() {
      if (this.producto) {
        localStorageHelper.agregarProducto(this.producto);
        Swal.fire({
          title: 'Producto agregado',
          text: `Agregaste "${this.producto.nombre}" al carrito`,
          icon: 'success',
          timer: 1500,
          showConfirmButton: false,
        });
      }
    },
  },
};
</script>

<template>
  <div class="container mt-4">
    <div v-if="producto">
      <div class="row">
        <div class="col-md-4">
          <img :src="producto.imagen" alt="Imagen del producto" class="img-fluid rounded" />
        </div>
        <div class="col-md-8">
          <h2>{{ producto.nombre }}</h2>
          <p><strong>Precio:</strong> ${{ producto.precio }}</p>
          <p><strong>Descripción:</strong> {{ producto.descripcion }}</p>
          <p><strong>Categoría:</strong> {{ producto.categoria }}</p>
          <button class="btn btn-outline-dark mb-2" @click="agregarAlCarrito">
            Agregar al carrito
          </button>
        </div>
      </div>
    </div>
    <div v-else>
      <p>Cargando producto...</p>
    </div>
  </div>
</template>
