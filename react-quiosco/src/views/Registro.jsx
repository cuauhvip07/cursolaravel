import { Link } from 'react-router-dom'
import { createRef, useState } from 'react'
import clienteAxios from '../config/axios'
import Alerta from '../layouts/components/Alerta'

export default function Registro() {

  const nameRef  = createRef()
  const emailRef  = createRef()
  const passwordRef  = createRef()
  const passwordConfirma  = createRef()

  const [errores, setErrores] = useState([]);

  // Enviar los datos POST hacia Laravel
  const handleSubmit = async e => {
    e.preventDefault();

    // Acceder a los datos si le das console.log(nameRef) aparece current por eso se ocupa ese
    const datos = {
      name: nameRef.current.value,
      email: emailRef.current.value,
      password: passwordRef.current.value,
      password_confirmation: passwordConfirma.current.value
    }
    try {
      // Se accede a data para acceder a la informacion de la API y obtener el token
      // Los datos son los que se envian al back
      const {data} = await clienteAxios.post('/api/registro', datos);
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
      <h1 className=" text-4xl font-black">Crea tu Cuenta</h1>
      <p>Crea tu cuenta llenando el formulario</p>

      <div className=" bg-white shadow-md rounded-md mt-10 px-5 py-10">
        <form onSubmit={handleSubmit} noValidate>
          {errores ? errores.map((error, id) => <Alerta key={id}>{error}</Alerta>) : null}

          <div className=" mb-4">
            <label 
              className=" text-slate-800"
              htmlFor="name">
              Nombre:
            </label>
            <input 
              type="text" 
              id="name"
              className=" mt-2 block p-3 bg-gray-50 w-full"
              name="name"
              placeholder="Tu nombre"
              ref={nameRef}
            />
          </div>

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

          <div className=" mb-4">
            <label 
              className=" text-slate-800"
              htmlFor="password_confirmation">
              Repetir Password:
            </label>
            <input 
              type="password" 
              id="password_confirmation"
              className=" mt-2 block p-3 bg-gray-50 w-full"
              name="password_confirmation"
              placeholder="Confirma tu password"
              ref={passwordConfirma}
            />
          </div>

          <input 
            type="submit"   
            value="Crear Cuenta" 
            className=" bg-indigo-600 hover:bg-indigo-800 w-full text-white mt-5 p-3 uppercase font-bold cursor-pointer"
          />
        </form>
      </div>

      {/* Aqui se ocupa el Link que importamos y en lugar de href se le pone "to" */}
      <nav className=" mt-5">
        <Link to="/auth/login">
          ¿Ya tienes cuenta? Inicia Sesión.
        </Link>
      </nav>
    </>
  )
}
