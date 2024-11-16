import { parseStringStyle } from "@vue/shared";

export default class ApiService {
    constructor(baseURL) {
      this.baseURL = baseURL;
    }
  
    async getProductos() {
      try {
        const response = await fetch(`${this.baseURL}/getProductos.php`);
        return await response.json();
      } catch (error) {
        console.error("Error fetching products:", error);
        throw error;
      }
    }

    async getProductoID(id) {
      try {
        const response = await fetch(`${this.baseURL}/getProductoID.php?id=${id}`);
        const data = await response.json(); 
        console.log(data)
        return data
      } catch (error) {
        console.error("Error fetching products:", error);
        throw error;
      }
    }

    async deleteProducto(id){
      console.log("eliminardo producto")
      try {
        const response = await fetch(`${this.baseURL}/deleteProducto.php`, {
          method: "DELETE",
          body: JSON.stringify({
            "id": id
          })
        });
      } catch (error) {
          console.error("Error fetching products:", error);
      }
    }

    async login(email, contrasena){
      try {
        const response = await fetch(`${this.baseURL}/login.php`, {
          method: "POST",
          body: JSON.stringify({
            "mail": email,
            "contraseña": contrasena
          })
        });
        const dataText = await response.text();
        const dataJson = JSON.parse(dataText)
        return dataJson
      } catch (error) {
        console.error("Error fetching products:", error);

      }
    }
    async registrer(nombre, apellido, email, contrasena){
      console.log(nombre, apellido, email, contrasena)
      try {
        const response = await fetch(`${this.baseURL}/registrer.php`, {
          method: "POST",
          body: JSON.stringify({
            "mail": email,
            "contraseña": contrasena,
            "nombre": nombre,
            "apellido": apellido
          })
        });
        return response
      } catch (error) {
        console.error("Error fetching products:", error);
      }
    }
  }