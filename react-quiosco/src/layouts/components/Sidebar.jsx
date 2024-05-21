
import { categorias } from "../../data/categorias"
import Categoria from "./Categoria"



export default function Sidebar() {
  return (
    <aside className=" md:w-72 ">
        <div className=" p-4">
            <img 
                className="w-40" 
                src="img/logo.svg" 
                alt="Imagen logo" />
        </div>

        <div className=" mt-1">
            {categorias.map( categoria => (
                <Categoria 
                    categoria={categoria}
                />
            ))}
        </div>

        <div className=" mt-5 px-5">
            <button 
                type="button"
                className=" text-center bg-red-500 w-full p-3 font-bold text-white truncate cursor-pointer">
                Cancelar Orden
            </button>
        </div>
    
    </aside>
  )
}
