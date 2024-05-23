// Context API
import { createContext } from "react"

const QuioscoContext = createContext();

// Toma un prop llamado children
const QuioscoProvider = ({children}) => {

    const hola = () => {
        
    }
    return (
        <QuioscoContext.Provider 
            value={{
                hola
            }}
        >{children}</QuioscoContext.Provider>
    )
}

export {
    QuioscoProvider
}
export default QuioscoContext