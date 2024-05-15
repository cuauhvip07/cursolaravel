import { createBrowserRouter } from "react-router-dom"; // Importamos el createBrowserRouter
import Layout from "./layouts/Layout"; // Importamos la pagina de layout

const router = createBrowserRouter([
    {
     path: '/',
     element: <Layout /> // Asi se manda a llamar el componente de layout
    }
])

export default router;