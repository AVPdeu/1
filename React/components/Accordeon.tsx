import React from 'react'
type AccordeonProps = {
    title: string;
    text: string;
  };
  const Accordeon: React.FC<AccordeonProps> = ({ title, text }) => {
    const [open, setOpen] = React.useState(false);
    return (
        <section>
          <h2>{title}</h2>
          <button onClick={() => setOpen(!open)}>
            {open ? "Скрыть" : "Показать"}
          </button>
          {open && <div>{text}</div>}
        </section>
      );
    };
    
    export default Accordeon;