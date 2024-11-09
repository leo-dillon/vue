<script setup>
import { RouterLink, RouterView } from 'vue-router'
import Header from './components/Header.vue';
import { getProductos, test } from './API/userService'
import { ref, onMounted } from 'vue';
import HomeView from './views/HomeView.vue';
import Footer from './components/Footer.vue';


const productos = ref([]);

onMounted(async () => {
  productos.value = await getProductos()
})

</script>

<template>
  <Header />
  <HomeView  :productosMostrar="productos" />

  <p>pepito el pistolero</p>
  <p>pepito el pistolero</p>
  <p>pepito el pistolero</p>
  <p>pepito el pistolero</p>
  <p>pepito el pistolero</p>

  <HomeView  :productosMostrar="productos" />

  <Footer />
  <!-- <header>
    <img alt="Vue logo" class="logo" src="@/assets/logo.svg" width="125" height="125" />

    <div class="wrapper">
      <HelloWorld msg="You did it!" />

      <nav>
        <RouterLink to="/">Home</RouterLink>
        <RouterLink to="/about">About</RouterLink>
      </nav>
    </div>
  </header> -->

  <!-- <RouterView /> -->
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
