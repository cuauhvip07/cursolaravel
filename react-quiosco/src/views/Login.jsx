import { Link } from 'react-router-dom'
import { createRef, useState } from 'react'
import clienteAxios from '../config/axios'
import Alerta from '../layouts/components/Alerta'

export default function Login() {

  const emailRef  = createRef()
  const passwordRef  = createRef()

  const [errores, setErrores] = useState([]);

  // Enviar los datos POST hacia Laravel
  const handleSubmit = async e => {
    e.preventDefault();

    // Acceder a los datos si le das console.log(nameRef) aparece current por eso se ocupa ese
    const datos = {
      email: emailRef.current.value,
      password: passwordRef.current.value,
    }
    try {
      // Se accede a data para acceder a la informacion de la API y obtener el token
      // Los datos son los que se envian al back
      const {data} = await clienteAxios.post('/api/login', datos);
      console.log(data.token)
      // Limpia los errores si la solicitud es exitosa
      setErrores([]);
    } catch (error) {
      // console.log(error)
      if (error.response && error.response.data && error.response.data.errors) {
        // Los errores vienen en un objeto tipo error entonces se pasan a array 
        setErrores(Object.values(error.response.data.errors));
      } 
    }
  }


  return (
    <>
      <h1 className=" text-4xl font-black">Iniciar Sesión</h1>
      <p>Para crear un pedido debes de iniciar sesión</p>

      <div  className=" bg-white shadow-md rounded-md mt-10 px-5 py-10">
        <form
          onSubmit={handleSubmit}
        >
            

          <div className=" mb-4">
              <label 
                  className=" text-slate-800"
                  htmlFor="email">

                  Email:
              </label>

              <input 
                  type="email" 
                  id="email"
                  className=" mt-2 block p-3 bg-gray-50 w-full"
                  name="email"
                  placeholder="Tu email"
                  ref={emailRef}
              />

          </div>

          <div className=" mb-4">
              <label 
                  className=" text-slate-800"
                  htmlFor="password">

                  Password:
              </label>

              <input 
                  type="password" 
                  id="password"
                  className=" mt-2 block p-3 bg-gray-50 w-full"
                  name="password"
                  placeholder="Tu password"
                  ref={passwordRef}
              />

          </div>

            

          <input 
              type="submit"   
              value="Iniciar Sesión" 
              className=" bg-indigo-600 hover:bg-indigo-800 w-full text-white mt-5 p-3 uppercase font-bold cursor-pointer"
          />

        </form>
      </div>

      <nav className=" mt-5">
        <Link to="/auth/registro">
          ¿No tienes cuenta? Crea Una
        </Link>
      </nav>
    </>
  )
}
