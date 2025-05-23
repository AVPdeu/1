import { useState } from 'react'
import reactLogo from './assets/react.svg'
import viteLogo from '/vite.svg'
import './App.css'
import { WelcomeMessage } from './WelcomeMessage'
import Accordeon from "./components/Accordeon"; 

function App() {
  const [count, setCount] = useState(0)

  return (
    <>
    <WelcomeMessage/>
    </>
  )
}

export default App

function App() {
  const [open, setOpen] = React.useState(false);
  const toggleOpen = () => setOpen((prev) => !prev);
  return ( 
    <div>
      <Accordeon
        title="Партнёры и спонсоры"
        text="Наши партнёры — это компании, организации и просто добрые люди..."
        open={open}
        onToggle={toggleOpen}
        />
    </div>
  );
}

export default App;