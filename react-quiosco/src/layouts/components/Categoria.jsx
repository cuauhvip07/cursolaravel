
import useQuiosco from "../../hooks/useQuiosco"

export default function Categoria({categoria}) {
    const { handleClickCategoria } = useQuiosco();
    const {icono,nombre} = categoria
    return (
        <div className=" flex items-center gap-4 border w-full p-3 hover:bg-amber-400 cursor-pointer">
            <img 
                className=" w-12"
                src={`/img/icono_${icono}.svg`} 
                alt="Imagen icono" 
            />
            {/* el onClick se puede cambiar, hay varios tipos y los puedes ver poniendo solo on  */}
            <button 
                className=" text-lg font-bold cursor-pointer truncate"
                type="button"
                onClick={handleClickCategoria}>
                {nombre}
            </button>

        </div>
    )
}
