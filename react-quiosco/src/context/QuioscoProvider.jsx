// Context API
import { createContext, useState, useEffect} from "react"
import { toast } from "react-toastify";
import clienteAxios from "../config/axios";

const QuioscoContext = createContext();

// Toma un prop llamado children
const QuioscoProvider = ({children}) => {

    // 1.Retorna dos valores y lo nombras como quieres
    // 2. Funcion que modifica el state (simepre se utiliza esa funcion)
    // 3. Ocurre en el useState 
    const [categorias, setCategorias ] = useState([]);
    const [categoriaActual, setCategoriaActual] = useState({});
    const [modal, setModal] = useState(false);
    const [producto, setProducto] = useState({});
    const [pedido, setPedido] = useState([]);
    const [total, setTotal] = useState(0);

    useEffect(() => {
        const nuevoTotal = pedido.reduce((total,producto) => total + (producto.precio * producto.cantidad),0)
        setTotal(nuevoTotal)
    },[pedido])

    // Consumiendo la informacion de la API con Axios

    const obtenerCategorias = async () => {
        try {
            // Traer la url que esta en el .env.local y despues se pasa al src/config/axios.js
            // const {data} = await axios(`${}/api/categorias`)  esta es una manera de usar axios
            const {data} = await clienteAxios('/api/categorias') ;
            setCategorias(data.data);
            setCategoriaActual(data.data[0])
        } catch (error) {
            console.log(error)
        }
    }

    // Mandar a llamar la funcion cuando se cargue
    useEffect(() => {
        obtenerCategorias()
    },[])


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
    const handleAgregarPedido = ({categoria_id,  ...producto}) => {
        

        if(pedido.some( pedidoState => pedidoState.id === producto.id)){
            const pedidoActualizado = pedido.map( pedidoState => pedidoState.id === producto.id ? producto : pedidoState)
            setPedido(pedidoActualizado)
            // Uso de toastify
            toast.success('Pedido Actualizado Correctamente',{
                draggable:true
            })
        }else{
            setPedido([...pedido, producto]);
            toast.success('Agregado al Pedido',{
                draggable:true
            })
        }
       
    }

    const handleEditarCantidad = id => {
        const productoActulizar = pedido.filter(producto => producto.id === id)[0]
        setProducto(productoActulizar)
        setModal(!modal)
    }

    const handleEliminarProductoPedido = id => {
        const pedidoActualizado = pedido.filter(producto => producto.id !== id)
        setPedido(pedidoActualizado)
        toast.success('Eliminado del pedido',{
            droggable:true
        })
    }

    const handleSubmitNuevaOrden = async () => {
        const token = localStorage.getItem('AUTH_TOKEN')
        try {
            await clienteAxios.post('/api/pedidos',{
                // Se mandan los valores al back
                total
            }, // Aqui se envia la peticion autenticada 
            {
                headers: {
                    Authorization: `Bearer ${token}`
                }
            })

        } catch (error) {
            console.log(error)
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
                handleEditarCantidad,
                handleEliminarProductoPedido,
                total,
                handleSubmitNuevaOrden,

            }}
        >{children}</QuioscoContext.Provider>
    )
}

export {
    QuioscoProvider
}
export default QuioscoContext