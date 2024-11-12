<script setup>
import Header from './components/Header.vue';
import Footer from './components/Footer.vue';
import { useAuth } from './store/useAuth';
import { provide, reactive } from 'vue';
const auth = useAuth();
provide('auth', reactive(auth));
</script>
<template>
  <Header />
    <RouterView class="vista"/>
  <Footer />
</template>

<style scoped>
  
html {
  scroll-behavior: smooth; 
}

</style>
