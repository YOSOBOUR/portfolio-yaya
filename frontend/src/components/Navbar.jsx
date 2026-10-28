import { useState } from 'react';

const links = [
  ['accueil', 'Accueil'],
  ['competences', 'Compétences'],
  ['realisations', 'Réalisations'],
  ['parcours', 'Parcours'],
  ['cv', 'Mon CV'],
  ['contact', 'Me contacter'],
];

export default function Navbar({ name }) {
  const [open, setOpen] = useState(false);
  return (
    <header className="navbar">
      <a href="#accueil" className="logo">{name?.toUpperCase()}</a>
      <button className="burger" onClick={() => setOpen(!open)} aria-label="Menu">☰</button>
      <nav className={open ? 'open' : ''} onClick={() => setOpen(false)}>
        {links.map(([id, label]) => (
          <a key={id} href={`#${id}`}>{label}</a>
        ))}
      </nav>
    </header>
  );
}
