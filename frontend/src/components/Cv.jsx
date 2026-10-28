export default function Cv({ profile }) {
  return (
    <section id="cv" className="section">
      <p className="eyebrow">CURRICULUM VITAE</p>
      <h2 className="title">Mon CV</h2>
      <div className="cv-box">
        <p>Retrouvez mon parcours, mes compétences et mes expériences dans mon CV.</p>
        {profile.cv_url ? (
          <>
            <div className="actions center-actions">
              <a href={profile.cv_url} target="_blank" rel="noreferrer" className="btn">👁️ Consulter</a>
              <a href={profile.cv_url} download className="btn btn-outline">📄 Télécharger (PDF)</a>
            </div>
            <iframe className="cv-frame" src={profile.cv_url} title="Aperçu du CV" />
          </>
        ) : (
          <p>Le CV sera bientôt disponible.</p>
        )}
      </div>
    </section>
  );
}
