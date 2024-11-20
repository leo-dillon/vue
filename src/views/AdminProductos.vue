<script setup>
  if(!localStorage.getItem('user')){
    location = "/"
  }
</script> 
<script >
import ApiService from '@/API/apiService';
import router from '@/router';
import Swal from 'sweetalert2';
export default {
    data () {
        return{
            productos: [],
            nombreProducto: "",
            precioProducto: 0 ,
            imagenProducto: "",
            descripcionProducto: "",
            categoriaProducto: "",
            idProducto: ""
        }
    },
    created(){
        this.apiService = new ApiService("http://127.0.0.1/basevue");
        const id = this.$route.query.id;
        this.loadProductos()
    },
    methods: {
        async idSeleccionado(id){
          this.idProducto = id
        },
        async loadProductos() {
            try {
                this.productos = await this.apiService.getProductos();
            } catch {
                alert("Error al cargar productos");
            }
        }, 
        async editarProducto() {
          console.log(this.idProducto)
            try {
                const response = await this.apiService.actualizarProducto(this.idProducto, this.nombreProducto, this.precioProducto, "public/error.jpg", this.descripcionProducto, this.descripcionProducto)
                if(response.status == 200){
                    Swal.fire({
                        title: 'Producto editado satisfactoriamente',
                        icon: 'success',
                        timer: 2000,
                        showConfirmButton: false,
                    }).then( () => {
                        location.reload(true)
                    })
                }
            } catch (error){
                alert('Error inesperado: Intente nuevamente.')
                console.error(error)
            }
          }
        },
        borrarProducto(id) {
          Swal.fire({
            title: '¿Quieres eliminar este producto?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Eliminar',
            cancelButtonText: 'Cancelar',
            }).then((result) => {
              if (result.isConfirmed) {
                this.apiService.deleteProducto(id)
                Swal.fire({
                    title: 'producto eliminado',
                    icon: 'success',
                    timer: 2000,
                    showConfirmButton: false,
                }).then(()=>{
                  router.push('/')
                })
              }
        });
        },
        async nuevoProducto() {
          console.log('nuevo producto')
            try {
                const response = await this.apiService.crearProducto(this.nombreProducto, this.precioProducto, "public/error.jpg", this.descripcionProducto, this.descripcionProducto)
                if(response.status == 200){
                    Swal.fire({
                        title: 'Producto creado satisfactoriamente',
                        icon: 'success',
                        timer: 2000,
                        showConfirmButton: false,
                    }).then( () => {
                        location.reload(true)
                    })
                }
            } catch (error){
                alert('Error inesperado: Intente nuevamente.')
                console.error(error)
            }
          }
    }
</script>
<template>
    <div class="table-responsive col-11 p-4 d-flex flex-column align-items-end">
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
              <button @click="idSeleccionado(producto.id)" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editarItemModal">Editar</button>
              <button @click="borrarProducto(producto.id)" class="btn btn-danger btn-sm">Borrar</button>
            </td>
          </tr>
        </tbody>
      </table>
      <button type="button" class="btn btn-success col-3" data-bs-toggle="modal" data-bs-target="#createItemModal">
        Crear nuevo producto
      </button> 
      <div class="modal fade" id="createItemModal" tabindex="-1" aria-labelledby="createItemModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="createItemModalLabel">Crear Producto</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form id="createItemForm" @submit.prevent="nuevoProducto">
                <div class="mb-3">
                  <label for="nombreProducto" class="form-label" >Nombre</label>
                  <input type="text" class="form-control" id="nombreProducto" v-model="nombreProducto" required>
                </div>
                
                <div class="mb-3">
                  <label for="precioProducto" class="form-label">Precio</label>
                  <input type="number" class="form-control" id="precioProducto" v-model="precioProducto" required>
                </div>
                
                <div class="mb-3">
                  <label for="imagen" class="form-label">Imagen</label>
                  <input type="file" class="form-control" id="imagen" accept="image/*" required>
                </div>
                
                <div class="mb-3">
                  <label for="descripcionProducto " class="form-label">Descripción</label>
                  <textarea class="form-control" id="descripcionProducto  " v-model="descripcionProducto" rows="3" required></textarea>
                </div>
                
                <div class="mb-3">
                  <label for="categoria" class="form-label">Categoría</label>
                  <select class="form-select" id="categoria" v-model="categoriaProducto" required>
                    <option value="" selected disabled>Selecciona una categoría</option>
                    <option value="Televisores">Televisores</option>
                    <option value="Notebooks">Notebooks</option>
                    <option value="Juguetes">Juguetes</option>
                  </select>
                </div>
                
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                  <button type="submit" class="btn btn-primary">Crear Producto</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="modal fade" id="editarItemModal" tabindex="-1" aria-labelledby="createItemModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="createItemModalLabel">Editar Producto</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form id="createItemForm" @submit.prevent="editarProducto">
                <div class="mb-3">
                  <label for="nombreProducto" class="form-label" >Nombre</label>
                  <input type="text" class="form-control" id="nombreProducto" v-model="nombreProducto" required>
                </div>
                
                <div class="mb-3">
                  <label for="precioProducto" class="form-label">Precio</label>
                  <input type="number" class="form-control" id="precioProducto" v-model="precioProducto" required>
                </div>
                
                <div class="mb-3">
                  <label for="imagen" class="form-label">Imagen</label>
                  <input type="file" class="form-control" id="imagen" accept="image/*" required>
                </div>
                
                <div class="mb-3">
                  <label for="descripcionProducto " class="form-label">Descripción</label>
                  <textarea class="form-control" id="descripcionProducto  " v-model="descripcionProducto" rows="3" required></textarea>
                </div>
                
                <div class="mb-3">
                  <label for="categoria" class="form-label">Categoría</label>
                  <select class="form-select" id="categoria" v-model="categoriaProducto" required>
                    <option value="" selected disabled>Selecciona una categoría</option>
                    <option value="Televisores">Televisores</option>
                    <option value="Notebooks">Notebooks</option>
                    <option value="Juguetes">Juguetes</option>
                  </select>
                </div>
                
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                  <button type="submit" class="btn btn-primary">Editar Producto</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
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