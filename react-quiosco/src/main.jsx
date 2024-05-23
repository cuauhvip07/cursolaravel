import React from 'react'
import ReactDOM from 'react-dom/client'
import './index.css'
import { RouterProvider } from 'react-router-dom' // Se importa el router provider
import { QuioscoProvider } from './context/QuioscoProvider' // Lo traemos de la carpeta context
import router from './router' // Se manda a traer el router.jsx con el router que se declaaro

ReactDOM.createRoot(document.getElementById('root')).render(
  <React.StrictMode>
    {/* El QuioscoProvider hace que nuestra informacion este disponible de manera global  */}
    <QuioscoProvider>
      {/* Se soloca el router.jsx que declaramos arriba el cual contiene el cretaeBrowserRouter  */}
      <RouterProvider router={router} /> 
    </QuioscoProvider>
  </React.StrictMode>,
)
