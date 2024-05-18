
import { Outlet } from 'react-router-dom' // Este es un COMPONENTE 

export default function Layout() {
  return (
    <div>
      Layout
    {/* Pasamos el COMPONENTE para que podamos poner elementos hijos  */}
      <Outlet /> 
    </div>
  )
}
