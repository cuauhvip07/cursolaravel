
import useQuiosco from "../../hooks/useQuiosco"

export default function Categoria({categoria}) {
    const { handleClickCategoria, categoriaActual } = useQuiosco();
    const {icono,nombre,id} = categoria
    return (
        <div className={` ${categoriaActual.id === id ? "bg-amber-400" : "bg-white"} flex items-center gap-4 border w-full p-3 hover:bg-amber-400 cursor-pointer`}>
            <img 
                className=" w-12"
                src={`/img/icono_${icono}.svg`} 
                alt="Imagen icono" 
            />
            {/* el onClick se puede cambiar, hay varios tipos y los puedes ver poniendo solo on  */}
            {/* para prevenir un comportamiento no deseado de llamar una funcion, se pone el arrow function en el onClick  */}
            <button 
                className=" text-lg font-bold cursor-pointer truncate"
                type="button"
                onClick={() => handleClickCategoria(id)}
            >
                {nombre}
            </button>

        </div>
    )
}
