
import useSWR from "swr"
import clienteAxios from "../config/axios";
import { formatearDinero } from "../helpers";
import { QuioscoProvider } from "../context/QuioscoProvider";
import useQuiosco from "../hooks/useQuiosco";

export default function Ordenes() {

  const token = localStorage.getItem('AUTH_TOKEN');
  const fetcher = () => clienteAxios('/api/pedidos', {
    headers: {
      Authorization: `Bearer ${token}`
    }
  })

  const {data,error,isLoading} = useSWR('/api/pedidos', fetcher, {refreshInterval: 1000})
  // console.log(data)

  const {handleClickCompleatarPedido} = useQuiosco()

  if(isLoading) return 'Cargando...'

  return (
    <div>
        <h1 className=' text-4xl font-black'>Ordenes</h1> 
        <p className=' text-2xl my-10'>Administra las ordenes desde aqui</p>

        <div className=" md:grid md:grid-cols-2 gap-2">
          {data.data.data.map(pedido => (
            <div key={pedido.id} className="p-5 bg-white shadow space-y-2 border-b">
              <p className=" text-xl font-bold text-slate-600">Contenido del pedido:</p>

              {pedido.productos.map(producto => (
                <div key={producto.id} className=" border-b border-b-slate-200 last-of-type:border-none py-4">
                  <p className="text-sm">ID: {producto.id}</p>
                  <p className="text-sm">{producto.nombre}</p>
                  <p >Cantidad: {''}
                    <span className=" font-bold">{producto.pivot.cantidad}</span>
                  </p>
                </div>
              ))}

              <p className=" text-lg font-bold text-slate-600">
                Cliente: {''}
                <span className="font-normal">{pedido.user.name}</span>
              </p>

              <p className="text-lg font-bold text-amber-500">
                Total a pagar: {''}
                <span className="font-normal text-slate-600">{formatearDinero(pedido.total)}</span>
              </p>

              <button 
                type="button" 
                className='bg-indigo-600  hover:bg-indigo-800 cursor-pointer px-5 py-2 rounded uppercase font-bold text-white text-center w-full'
                onClick={() => handleClickCompleatarPedido(pedido.id)}
              >Completar</button>
            </div>
          ))}

         
        </div>
    </div>
  )
}
