function Column({ title, items }) {
  return (
    <div>
      <h3 className="col-title">{title}</h3>
      <div className="tl">
        {items.map((e) => (
          <div className="item" key={e.id}>
            <h4>{e.title}</h4>
            <div className="org">{e.organization} — {e.period}</div>
            {e.description && <p>{e.description}</p>}
          </div>
        ))}
      </div>
    </div>
  );
}

export default function Parcours({ experiences }) {
  return (
    <section id="parcours" className="section">
      <p className="eyebrow">PARCOURS</p>
      <h2 className="title">Mon parcours académique et professionnel</h2>
      <div className="cols">
        <Column title="Parcours académique" items={experiences.filter((e) => e.type === 'academic')} />
        <Column title="Parcours professionnel" items={experiences.filter((e) => e.type === 'professional')} />
      </div>
    </section>
  );
}
