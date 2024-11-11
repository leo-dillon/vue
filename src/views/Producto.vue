<script>
import ApiService from '@/API/apiService';

export default {
    data () {
        return{
            producto: []
        }
    },
    created(){
        this.apiService = new ApiService("http://127.0.0.1/basevue");
        const id = this.$route.query.id;
        this.loadProductoID(id)
    },
    methods: {
        async loadProductoID(id){
            try{
                this.producto = await this.apiService.getProductoID(id)
            } catch {
                alert("Error al cargar el producto");
            }
            finally{
                console.log(this.producto[0])
            }
        }
    }
}
</script>
<template>
    <div class="container mt-4">
      <div v-if="producto.length > 0">
        <div class="row">
          <div class="col-md-4">
            <img :src="producto[0].imagen" alt="Imagen del producto" class="img-fluid rounded">
          </div>
          <div class="col-md-8">
            <h2>{{ producto[0].nombre }}</h2>
            <p><strong>Precio:</strong> ${{ producto[0].precio }}</p>
            <p><strong>Descripción:</strong> {{ producto[0].descripcion }}</p>
            <p><strong>Categoría:</strong> {{ producto[0].categoria }}</p>
            <button class="btn btn-outline-dark mb-2" @click="agregarAlCarrito(producto)">Agregar al carrito</button>
          </div>
        </div>
      </div>
      <div v-else-if="producto.length == 0">
      <div class="alert alert-danger" role="alert">
        <strong>Error:</strong> El producto no existe.
      </div>
    </div>
      <div v-else>
        <p>Cargando producto...</p>
      </div>
    </div>
  </template>