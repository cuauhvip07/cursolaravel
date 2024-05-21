


export default function Categoria({categoria}) {

    const {nombre,precio,id} = categoria
    console.log(nombre)
  return (
    <div>
     <p>{nombre}</p>
    </div>
  )
}
