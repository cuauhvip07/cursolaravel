
import useSWR from 'swr';
import Producto from '../layouts/components/Producto'
import useQuiosco from '../hooks/useQuiosco'
import clienteAxios from '../config/axios';

export default function Inicio() {
  const { categoriaActual } = useQuiosco();

  // Ayuda a filtar los productos y despues pasarlos al state 
  // Consulta SWR
  const fetcher = () => clienteAxios('/api/productos').then(data => data.data);
  const { data, error, isLoading } = useSWR('/api/productos', fetcher,{
    refreshInterval: 1000
  })
 
  // isLoading es para que aparezca mientras carga la pagina
  if(isLoading) return 'Cargando...'
  // Es data.data por que se trae un arreglo de objetos

  const productos = data.data.filter(producto => producto.categoria_id === categoriaActual.id)
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
