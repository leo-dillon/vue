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
  }