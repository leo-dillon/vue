<script setup>
import { RouterLink, RouterView } from 'vue-router'
import Header from './components/Header.vue';
import { ref, onMounted } from 'vue';
import HomeView from './views/HomeView.vue';
import Footer from './components/Footer.vue';
import ApiService from "./API/apiService";
</script>
<script>
export default {
  data() {
    return {
      users: [],
      productos: [],
      name: "",
      email: "",
      password: "",
    };
  },
  created() {
    this.apiService = new ApiService("http://127.0.0.1/basevue");
    this.loadUsers();
    this.loadProductos();
  },
  methods: {
    async loadUsers() {
      try {
        this.users = await this.apiService.getUsuarios();
      } catch {
        alert("Error al cargar usuarios");
      }
    },
    async loadProductos() {
      try {
        this.productos = await this.apiService.getProductos();
      } catch {
        alert("Error al cargar productos");
      }
    },
  },
};
  </script>
<template>
  <Header />
    <RouterView :productosMostrar="productos"/>
  <Footer />
</template>

<style scoped>
  
html {
  scroll-behavior: smooth; 
}

body {
  margin: 0;
  padding: 0;
  font-family: Arial, sans-serif;
}
</style>
