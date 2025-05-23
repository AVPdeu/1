import React from 'react'
type AccordeonProps = {
    title: string;
    text: string;open: boolean;
    onToggle: () => void;
};
  const Accordeon: React.FC<AccordeonProps> = ({ title, text }) => {
    const [open, setOpen] = React.useState(false);
    <section id="partners" style={{ marginTop: 40 }}>
        <h2>{title}</h2>
        <button onClick={onToggle} className="accordion-button">
            {open ? "▲ Скрыть" : "▼ Показать"}
            </button>
            {open && (
                <div className="accordion-content">
                    <p>{text}</p>
                    </div>
                )}
                </section>
                };
    
    export default Accordeon;