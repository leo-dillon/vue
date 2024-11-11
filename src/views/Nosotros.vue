<template>
    <section class="container my-4">
        <h1 class="text-center p-1 pt-2">Acerca de Nosotros</h1>
        <div class="d-flex flex-column-reverse flex-md-row-reverse justify-content-around align-items-center">
            <img class="img-fluid" src="../../public/acercade.png" alt="User tech">
            <p class="px-1 text-center lh-sm me-3">
                En Tech Store, nos apasiona la tecnología y nos dedicamos a ofrecerte lo último en <strong>productos electrónicos</strong>  y gadgets <strong>innovadores</strong>. Desde smartphones y laptops hasta accesorios y dispositivos inteligentes, contamos con una amplia variedad de artículos de alta calidad para satisfacer tus necesidades tecnológicas. Nos esforzamos por brindarte una experiencia de compra <strong>fácil, segura y confiable</strong>, con un equipo de expertos siempre dispuesto a ayudarte a encontrar lo que necesitas. ¡Conéctate al futuro con nosotros y descubre cómo la tecnología puede mejorar tu vida!
            </p>
        </div>
    </section>
    <section  class="my-4 historia">
        <h2 class="text-center p-1 pt-2">Nuestra Historia</h2>
        <div class="d-flex flex-column-reverse flex-md-row justify-content-around align-items-center">
            <img class="img-fluid" src="../../public/moto3.png" alt="Motorola 3">
            <div>
                <p class="px-1 text-center lh-sm">
                    Nuestra tienda nació este año como un proyecto 100% virtual, impulsada por el compromiso de ofrecer una experiencia de compra <strong>moderna y accesible</strong>. Nos especializamos en productos tecnológicos de última generación, seleccionados cuidadosamente para satisfacer las necesidades de nuestros clientes en el mundo digital. A través de nuestra plataforma, buscamos que la tecnología esté al alcance de todos, brindando un servicio confiable y práctico.
                </p>
                <p class="text-center"><em>¡Bienvenidos a nuestra tienda en línea, donde la innovación está a solo un clic de distancia!</em></p>
            </div>
        </div>
    </section>
    <section class="container my-4">
        <h2 class="text-center p-1 pt-2">Nuestro Equipo</h2>
        <div class="d-flex flex-column">
            <div class="d-flex flex-column flex-md-row justify-content-around align-items-center my-2">
                <div class="px-1">
                    <img class="rounded-circle burbuja" src="../../public/nosotros/leo.jpeg" alt="Leonardo Dillon">
                    <p class="py-3 text-center"><strong>Leonardo Dillon</strong></p>
                </div>
                <div class="px-1">
                    <img class="rounded-circle burbuja" src="../../public/nosotros/male.jpg" alt="Malena Caparrós">
                    <p class="py-3 text-center"><strong>Malena Caparrós</strong></p>
                </div>
                <div class="px-1">
                    <img class="rounded-circle burbuja" src="../../public/nosotros/eze.JPEG" alt="Ezequiel Messina">
                    <p class="py-3 text-center"><strong>Ezequiel Messina</strong></p>
                </div>
            </div>
            <div class="col px-2">
                <p class="px-1 text-center lh-sm">
                    Cada miembro de nuestro equipo desempeña un papel fundamental para asegurarse de que nuestros clientes reciban un <strong>servicio excepcional</strong>, desde la selección de los productos más innovadores hasta la buena navegación por nuestra web.
                </p>
                <p class="px-1 text-center lh-sm">
                    Nos enorgullece trabajar en conjunto, aprovechando nuestras habilidades y conocimientos para mejorar continuamente nuestros procesos. Con un enfoque en <strong>la calidad, la innovación y la satisfacción</strong> del cliente, nuestro equipo está siempre listo para ayudarte a encontrar lo que necesitas y hacer de tu experiencia de compra algo único.
                </p>
            </div>
        </div>
    </section>
</template>
<style>
    .burbuja{
        width: 200px;
        height: 200px;       
        object-fit: cover;
    }
    p{
        font-size: 1.2rem;
    }
    .historia{
        background-color:#dbdbdb;
        padding-right: 3.5rem;
        padding-left: 3.5rem;
    }
</style>
