import useSWR from "swr";
import clienteAxios from "../config/axios";
import { useNavigate} from 'react-router-dom'
import { useEffect } from "react";

export const useAuth = ({middleware, url}) => {

    const token = localStorage.getItem('AUTH_TOKEN')
    const navigate = useNavigate()

    // useSWR y el cliente axios deben de ser la misma url
    const {data: user,error, mutate} = useSWR('/api/user', () =>
        clienteAxios('/api/user', {
            // Con axios se debe de pasar mediante headers
            headers: {
                Authorization: `Bearer ${token}`
            }
        })
        // Se debe de usar promises ya que no es asincrono
        // El res da respuestas y en data esta la informacion del usuario
        .then(res => res.data)
        .catch(error => {
            throw Error(error?.response?.data?.errors)
        })
    )

    const login = async (datos,setErrores) => {

       

        try {

            const {data} = await clienteAxios.post('/api/login', datos);
        
            // Se almacena el token en localStorage
            localStorage.setItem('AUTH_TOKEN',data.token)
            setErrores([]);
            // mutate forza la revalidacion de los usuarios
            await mutate()
        } catch (error) {

            if (error.response && error.response.data && error.response.data.errors) {
                setErrores(Object.values(error.response.data.errors));
            } 
        }
    }

    const registro = () => {

    }

    const logout = () => {

    }

    // console.log(user)
    // console.log(error)
    // console.log(user)  Aparece que esta en guest por eso asi esta la validacion 

    // Se manda al usuario a la pagina para generar los pedidos 
    useEffect(() => {
        if(middleware === 'guest' && url && user){
            navigate(url)
        }

        // Manda al usuario al login en caso de no haber iniciado la sesion
        if(middleware === 'auth' && error){
            navigate('/auth/login')
        }
    },[user,error])


    return {
        login,
        registro,
        logout,
        user,
        error
    }
}