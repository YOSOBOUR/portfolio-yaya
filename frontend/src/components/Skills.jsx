import { useState } from 'react';

function Icon({ slug, name }) {
  const [failed, setFailed] = useState(!slug);
  if (failed) return <div className="skill-fallback">{name.slice(0, 2)}</div>;
  return (
    <img
      src={`https://cdn.simpleicons.org/${slug}/e8553d`}
      alt=""
      onError={() => setFailed(true)}
    />
  );
}

export default function Skills({ skills }) {
  const [filter, setFilter] = useState('Toutes');
  const categories = ['Toutes', ...new Set(skills.map((s) => s.category))];
  const list = filter === 'Toutes' ? skills : skills.filter((s) => s.category === filter);

  return (
    <section id="competences" className="section">
      <p className="eyebrow">COMPÉTENCES</p>
      <h2 className="title">Ce que je maîtrise (et ce que j'apprends)</h2>
      <div className="filters">
        {categories.map((c) => (
          <button key={c} className={`chip ${filter === c ? 'active' : ''}`} onClick={() => setFilter(c)}>
            {c}
          </button>
        ))}
      </div>
      <div className="skills">
        {list.map((s) => (
          <div className="skill" key={s.id}>
            <Icon slug={s.icon} name={s.name} />
            <h3>{s.name}</h3>
            <small>{s.level}</small>
          </div>
        ))}
      </div>
    </section>
  );
}
