
import { createBrowserRouter } from "react-router-dom"; // Importamos el createBrowserRouter
import Layout from "./layouts/Layout"; // Importamos la pagina de layout
import AuthLayout from "./layouts/AuthLayout";
import Inicio from "./views/Inicio";
import Login from "./views/Login";
import Registro from "./views/Registro";


const router = createBrowserRouter([
    {
        path: '/',
        element: <Layout />,
     // El children tra otras paginas de layout
        children:
        [
            {
                index:true,
                element: <Inicio/>,
            },
        ]   
    },
    {
        path:'/auth',
        element: <AuthLayout />,
        children: 
        [
            {
                path: '/auth/login',
                element: <Login />
            },
            {
                path: '/auth/registro',
                element: <Registro />
            }
        ]
    },
])

export default router;