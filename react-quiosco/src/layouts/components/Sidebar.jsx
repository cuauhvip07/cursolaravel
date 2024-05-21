
import { categorias } from "../../data/categorias"
import Categoria from "./Categoria"



export default function Sidebar() {
  return (
    <aside className=" md:w-72 ">
        <div className=" p-4">
            <img 
                className="w-40" 
                src="img/logo.svg" 
                alt="" />
        </div>

        <div className=" mt-1">
            {categorias.map( categoria => (
                <Categoria 
                    categoria={categoria}
                />
            ))}
        </div>
    
    </aside>
  )
}
