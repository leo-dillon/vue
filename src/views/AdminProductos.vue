<script>
import ApiService from '@/API/apiService';

export default {
    data () {
        return{
            productos: []
        }
    },
    created(){
        this.apiService = new ApiService("http://127.0.0.1/basevue");
        const id = this.$route.query.id;
        this.loadProductos()
    },
    methods: {
        async loadProductos() {
            try {
                this.productos = await this.apiService.getProductos();
            } catch {
                alert("Error al cargar productos");
            }
        }, 
        editarProducto(producto) {
        },
        borrarProducto(id) {
        },
    }
}
</script>
<template>
    <div class="table-responsive col-11">
      <table class="table table-striped table-bordered">
        <thead>
          <tr>
            <th>Nombre</th>
            <th>ID</th>
            <th>Precio</th>
            <th>Imagen</th>
            <th>Descripción</th>
            <th>Categoría</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="producto in productos" :key="producto.id">
            <td >{{ producto.nombre }}</td>
            <td >{{ producto.id }}</td>
            <td >{{ producto.precio }}</td>
            <td ><img :src="producto.imagen" alt="Imagen del producto" class="img-thumbnail" style="max-width: 100px;"/></td>
            <td class="description">{{ producto.descripcion }}</td>
            <td >{{ producto.categoria }}</td>
            <td >
              <button @click="editarProducto(producto)" class="btn btn-primary btn-sm">Editar</button>
              <button @click="borrarProducto(producto.id)" class="btn btn-danger btn-sm">Borrar</button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </template>
  <style scoped>
  .img-thumbnail {
    max-height: 48px;
  }
  .table-responsive{
    margin: 0 auto;
  }
  td{
    text-align: center;
    line-height: 42px;
  }
  td.description{
    width: min-content;
    font-size: .8rem;
  }
  </style>