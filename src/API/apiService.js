let API_URL = "./src/JSON/productosTest.json"

export default class ApiService {
    constructor(baseURL) {
      this.baseURL = baseURL;
    }
  
    async getUsuarios() {
      try {
        const response = await fetch(`${this.baseURL}/getUser.php`);
        return await response.json();
      } catch (error) {
        console.error("Error fetching users:", error);
        throw error;
      }
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
  }