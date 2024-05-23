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
    const handleClickCategoria = () => {
        console.log('click en categoria')
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