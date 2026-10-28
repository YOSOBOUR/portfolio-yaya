import { useEffect, useState } from 'react';
import { getPortfolio } from './api';
import Navbar from './components/Navbar';
import Hero from './components/Hero';
import Skills from './components/Skills';
import Projects from './components/Projects';
import Parcours from './components/Parcours';
import Cv from './components/Cv';
import Contact from './components/Contact';
import Footer from './components/Footer';

export default function App() {
  const [data, setData] = useState(null);
  const [error, setError] = useState(false);

  useEffect(() => {
    getPortfolio().then(setData).catch(() => setError(true));
  }, []);

  if (error) {
    return (
      <p className="state">
        Impossible de charger le portfolio. Vérifiez que le serveur Laravel est lancé
        (php artisan serve).
      </p>
    );
  }
  if (!data) return <p className="state">Chargement…</p>;

  const { profile, skills, projects, experiences } = data;
  if (!profile) return <p className="state">Aucun profil trouvé. Lancez : php artisan migrate --seed</p>;

  return (
    <>
      <Navbar name={profile.full_name} />
      <main>
        <Hero profile={profile} />
        <Skills skills={skills} />
        <Projects projects={projects} />
        <Parcours experiences={experiences} />
        <Cv profile={profile} />
        <Contact profile={profile} />
      </main>
      <Footer profile={profile} />
    </>
  );
}
