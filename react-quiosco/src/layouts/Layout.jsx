
import { Outlet } from 'react-router-dom' // Este es un COMPONENTE
import Modal from 'react-modal';
import Sidebar from './components/Sidebar'
import Resumen from './components/Resumen'
import useQuiosco from '../hooks/useQuiosco'

const customStyles = {
  content: {
    top: "50%",
    left: "50%",
    right: "auto",
    bottom: "auto",
    marginRight: "-50%",
    transform: "translate(-50%, -50%)",
  },
};


export default function Layout() {
  const { modal, handleClickModal } = useQuiosco();
  console.log(modal)
  return (
    <>
      <div className='md:flex'>
        <Sidebar />
        <main className=' flex-1 h-screen overflow-auto bg-gray-50 p-3'>
          {/* Pasamos el COMPONENTE para que podamos poner elementos hijos  */}
          <Outlet />
        </main>

        <Resumen />
      </div>

      {/* Si existe el modal se va a mostar esta informacion */}
      {modal && (
        // Se hace uso del import de Modal 
        <Modal isOpen={modal} style={customStyles}>
          <p>Desde modal</p>
          <button
            onClick={handleClickModal}>Cerrar</button>
        </Modal>
      )}
    </>
  )
}
