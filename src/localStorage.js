export default {
  getCarrito() {
    return JSON.parse(localStorage.getItem('carrito')) || [];
  },
  
  setCarrito(carrito) {
    localStorage.setItem('carrito', JSON.stringify(carrito));
  },

  agregarProducto(producto) {
    const carrito = this.getCarrito();
    const index = carrito.findIndex((item) => item.id === producto.id);
    
    if (index > -1) {
      carrito[index].cantidad += 1;
    } else {
      carrito.push({ ...producto, cantidad: 1 });
    }

    this.setCarrito(carrito);
  },

  eliminarProducto(id) {
    const carrito = this.getCarrito().filter((item) => item.id !== id);
    this.setCarrito(carrito);
  },

  obtenerCantidadProductos() {
    const carrito = this.getCarrito();
    return carrito.reduce((total, item) => total + item.cantidad, 0);
  },
};
