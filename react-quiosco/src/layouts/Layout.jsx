
import { Outlet } from 'react-router-dom' // Este es un COMPONENTE 
import Sidebar from './components/Sidebar'
import Resumen from './components/Resumen'


export default function Layout() {
  return (
    <div className='md:flex'>
      <Sidebar />
      <main className=' flex-1 h-screen overflow-auto bg-gray-50 p-3'>
        {/* Pasamos el COMPONENTE para que podamos poner elementos hijos  */}
        <Outlet /> 
      </main>
    
      <Resumen />
    </div>
  )
}
