import React from 'react'
import ReactDOM from 'react-dom/client'
import './index.css'
import { RouterProvider } from 'react-router-dom' // Se importa el router provider
import router from './router' // Se manda a traer el router.jsx con el router que se declaaro

ReactDOM.createRoot(document.getElementById('root')).render(
  <React.StrictMode>
    {/* Se soloca el router.jsx que declaramos arriba el cual contiene el cretaeBrowserRouter  */}
    <RouterProvider router={router} /> 
  </React.StrictMode>,
)
