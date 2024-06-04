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
    const [modal, setModal] = useState(false);
    const [producto, setProducto] = useState({});
    const [pedido, setPedido] = useState([]);

    // Cuando hay un click o submit debe de empezar con handle
    // Ese sero es por que si vas a trabaajar con objetos mantente con objetos, no combinar arreglos y objetos, el [0] es para obtener la inforacion de la posicion 0 del arreglo 
    const handleClickCategoria = id => {
        const categoria = categorias.filter(categoria => categoria.id === id)[0]
        // No se modifica direcamente la categoriaActual, se debe de llamar la funcion en este caso setCategoriaActual
        setCategoriaActual(categoria)
    }

    const handleClickModal = () => {
        // el !modal hace que cuando este en true lo cambia a false y viceversa 
        setModal(!modal);
    }

    const handleSetProducto = producto => {
        setProducto(producto);
    }

    //  object method solo devuelva lo que tiene producto y no los primeros dos
    const handleAgregarPedido = ({categoria_id, imagen,  ...producto}) => {
        

        if(pedido.some( pedidoState => pedidoState.id === producto.id)){
            const pedidoActualizado = pedido.map( pedidoState => pedidoState.id === producto.id ? producto : pedidoState)
            setPedido(pedidoActualizado)
        }else{
            setPedido([...pedido, producto]);
        }
       
    }
    
   
    return (
        <QuioscoContext.Provider 
            value={{
                categorias,
                categoriaActual,
                handleClickCategoria,
                modal,
                handleClickModal,
                producto,
                handleSetProducto,
                pedido,
                handleAgregarPedido,


            }}
        >{children}</QuioscoContext.Provider>
    )
}

export {
    QuioscoProvider
}
export default QuioscoContext