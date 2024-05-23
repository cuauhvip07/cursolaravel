// Context API
import { createContext, useState } from "react"
import {categorias as categoriasDB} from '../data/categorias'

const QuioscoContext = createContext();

// Toma un prop llamado children
const QuioscoProvider = ({children}) => {

    // 1.Retorna dos valores y lo nombras como quieres
    // 2. Funcion que modifica el state (simepre se utiliza esa funcion)
    // 3. Ocurre en el useState 
    const [categorias, setCategorias ] = useState(categoriasDB);
    const [categoriaActual, setCategoriaActual] = useState(categorias[0]);

    // Cuando hay un click o submit debe de empezar con handle
    // Ese sero es por que si vas a trabaajar con objetos mantente con objetos, no combinar arreglos y objetos, el [0] es para obtener la inforacion de la posicion 0 del arreglo 
    const handleClickCategoria = id => {
        const categoria = categorias.filter(categoria => categoria.id === id)[0]
        setCategoriaActual(categoria)
    }
    
   
    return (
        <QuioscoContext.Provider 
            value={{
                categorias,
                categoriaActual,
                handleClickCategoria,

            }}
        >{children}</QuioscoContext.Provider>
    )
}

export {
    QuioscoProvider
}
export default QuioscoContext