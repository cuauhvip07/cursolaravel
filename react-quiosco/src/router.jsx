
import { createBrowserRouter } from "react-router-dom"; // Importamos el createBrowserRouter
import Layout from "./layouts/Layout"; // Importamos la pagina de layout
import AuthLayout from "./layouts/AuthLayout";
import Inicio from "./views/Inicio";
import Login from "./views/Login";
import Registro from "./views/Registro";
import AdminLayout from "./layouts/AdminLayout";
import Ordenes from "./views/Ordenes";
import Productos from "./views/Productos";


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
    {
        path: '/admin',
        element: <AdminLayout/>,
        children: [
            {
                index: true,
                element: <Ordenes/>
            },
            {
                path: '/admin/productos',
                element: <Productos/>
            }
        ]
    }
])

export default router;