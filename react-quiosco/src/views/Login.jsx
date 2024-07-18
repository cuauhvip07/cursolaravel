import { Link } from 'react-router-dom'
import { createRef, useState } from 'react'
import Alerta from '../layouts/components/Alerta'
import { useAuth } from '../hooks/useAuth'

export default function Login() {

  const emailRef  = createRef()
  const passwordRef  = createRef()

  const [errores, setErrores] = useState([]);
  // En useAuth se le pasan esos parametrs ya que en el hook se requuieren
  const {login} = useAuth({
    middleware: 'guest',
    url: '/'
  })

  // Enviar los datos POST hacia Laravel
  const handleSubmit = async e => {
    e.preventDefault();

    // Acceder a los datos si le das console.log(nameRef) aparece current por eso se ocupa ese
    const datos = {
      email: emailRef.current.value,
      password: passwordRef.current.value,
    }

    // Se le pasan los valores al hook de la funcion de login
    login(datos,setErrores)
    
  }


  return (
    <>
      <h1 className=" text-4xl font-black">Iniciar Sesión</h1>
      <p>Para crear un pedido debes de iniciar sesión</p>

      <div  className=" bg-white shadow-md rounded-md mt-10 px-5 py-10">
        <form
          onSubmit={handleSubmit}
        >
          {errores ? errores.map((error, id) => <Alerta key={id}>{error}</Alerta>) : null}
            

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
