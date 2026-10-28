import { useState } from 'react';

export default function Projects({ projects }) {
  const [filter, setFilter] = useState('Toutes');
  const tags = ['Toutes', ...new Set(projects.flatMap((p) => p.tag_list))];
  const list = filter === 'Toutes' ? projects : projects.filter((p) => p.tag_list.includes(filter));

  return (
    <section id="realisations" className="section">
      <p className="eyebrow">PORTFOLIO</p>
      <h2 className="title">Mes réalisations</h2>
      <div className="filters">
        {tags.map((t) => (
          <button key={t} className={`chip ${filter === t ? 'active' : ''}`} onClick={() => setFilter(t)}>
            {t}
          </button>
        ))}
      </div>
      <div className="projects">
        {list.map((p) => (
          <article className="project" key={p.id}>
            {p.image_url ? (
              <img className="pimg" src={p.image_url} alt={p.title} />
            ) : (
              <div className="pimg placeholder">🖼️</div>
            )}
            <div className="pbody">
              <h3>{p.title}</h3>
              <p>{p.description}</p>
              <div className="ptags">
                {p.tag_list.map((t) => <span key={t}>{t}</span>)}
              </div>
              {p.link && (
                <a href={p.link} target="_blank" rel="noreferrer">Voir le projet →</a>
              )}
            </div>
          </article>
        ))}
      </div>
    </section>
  );
}
