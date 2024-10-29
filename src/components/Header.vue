<template>
    <header class="">
        <nav class="col-12 px-4 navbar navbar-expand-lg navbar-dark" style="background-color: #4a4a4a;">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.html">Tech Store</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Contenedor para el buscador y "Mi Carrito" -->
                <div class="d-flex align-items-center ms-auto">
                    <!-- Buscador -->
                    <form class="d-flex me-3" role="search">
                        <input class="form-control me-2" type="search" placeholder="Buscar producto" aria-label="Search" >
                    </form>

                    <!-- Enlace al carrito -->
                    <a class="nav-link text-light" href="#miCarrito">Mi Carrito <i class="fa-solid fa-bag-shopping"></i></a>
                </div>
            </div>
        </nav>
    </header>
</template>
