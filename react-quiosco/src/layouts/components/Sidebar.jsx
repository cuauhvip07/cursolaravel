
import useQuiosco from "../../hooks/useQuiosco"
import Categoria from "./Categoria"
import { useAuth } from "../../hooks/useAuth";



export default function Sidebar() {

    const { categorias } = useQuiosco();
    const {logout,user} = useAuth({middleware:'auth'})

  return (
    <aside className=" md:w-72 ">
        <div className=" p-4">
            <img 
                className="w-40" 
                src="img/logo.svg" 
                alt="Imagen logo" />
        </div>

        <p className=" my-10 text-xl text-center">Hola: {user?.name}</p>

        <div className=" mt-1">
            {categorias.map( categoria => (
                <Categoria 
                    key={categoria.id} // Se debe de pasar un key siempre
                    categoria={categoria}
                />
            ))}
        </div>

        <div className=" mt-5 px-5">
            <button 
                type="button"
                className=" text-center bg-red-500 w-full p-3 font-bold text-white truncate cursor-pointer"
                onClick={logout}
            >
                Cancelar Orden
            </button>
        </div>
    
    </aside>
  )
}
