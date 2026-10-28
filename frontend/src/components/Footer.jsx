export default function Footer({ profile }) {
  return (
    <footer className="footer">
      <div>
        <strong>{profile.full_name.toUpperCase()}</strong>
        <p>{profile.job_title}</p>
      </div>
      <nav>
        <a href="#accueil">Accueil</a>
        <a href="#competences">Compétences</a>
        <a href="#realisations">Réalisations</a>
        <a href="#parcours">Parcours</a>
        <a href="#cv">Mon CV</a>
        <a href="#contact">Contact</a>
      </nav>
      <div className="socials">
        {profile.github && <a href={profile.github} target="_blank" rel="noreferrer">GitHub</a>}
        {profile.linkedin && <a href={profile.linkedin} target="_blank" rel="noreferrer">LinkedIn</a>}
        <a href={`mailto:${profile.email}`}>E-mail</a>
      </div>
      <p className="copy">© {new Date().getFullYear()} {profile.full_name}. Tous droits réservés.</p>
    </footer>
  );
}
