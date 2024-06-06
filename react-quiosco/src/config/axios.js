import axios from "axios";

// Creacion del cliente cuando se busque la libreria siempre se hara el llamdo

const clienteAxios = axios.create({
    baseURL: import.meta.env.VITE_API_URL, // url que esta en el .env.local

})

export default clienteAxios;