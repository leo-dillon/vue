let API_URL = "./src/JSON/productosTest.json"

export function getProductos () {
    return fetch(API_URL)
        .then(res => res.json())
        .then(data => data) 
}
export function test(){
    console.log('a')
}