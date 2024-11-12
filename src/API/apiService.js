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

    async login(email, contrasena){
      try {
        const response = await fetch(`${this.baseURL}/login.php`, {
          method: "POST",
          body: JSON.stringify({
            "mail": email,
            "contraseña": contrasena
          })
        });
        const data = await response.json();
        return data
      } catch (error) {
          console.error("Error fetching products:", error);

        }
    }
  }