import { Outlet } from "react-router-dom";
import AdminSidebar from "./components/AdminSidebar";
import { useAuth } from "../hooks/useAuth";



export default function AdminLayout() {

    useAuth({middleware: 'admin'});

  return (
    <div className='md:flex'>
        <AdminSidebar />

        <main className=' flex-1 h-screen overflow-auto bg-gray-50 p-3'>
            {/* Pasamos el COMPONENTE para que podamos poner elementos hijos  */}
            <Outlet />
        </main>

    </div>
  )
}
