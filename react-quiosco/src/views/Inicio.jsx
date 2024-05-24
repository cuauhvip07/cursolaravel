
import { productos as data } from '../data/productos'
import Producto from '../layouts/components/Producto'
import useQuiosco from '../hooks/useQuiosco'

export default function Inicio() {
  const { categoriaActual } = useQuiosco();
  // Ayuda a filtar los productos y despues pasarlos al state 
  const productos = data.filter(producto => producto.categoria_id === categoriaActual.id)
  return (
    <>
      <h1 className=' text-4xl font-black'>{categoriaActual.nombre}</h1> 
      <p className=' text-2xl my-10'>Elije y personaliza tu pedido a continuacion</p>

      <div className=' grid gap-4 grid-cols-1 md:grid-cols-2 lg:grid-cols-3'>
        {productos.map( producto => (
          <Producto 
            key={producto.imagen}
            producto={producto}
          />
        ))}
      </div>
    </>
  )
}
