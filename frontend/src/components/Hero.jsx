export default function Hero({ profile }) {
  return (
    <section id="accueil" className="hero">
      {profile.photo_url && (
        <div className="frame">
          <img src={profile.photo_url} alt={profile.full_name} />
        </div>
      )}
      <div>
        <h1>{profile.full_name}</h1>
        <h2>{profile.job_title}</h2>
        <p>{profile.bio}</p>
        <p className="kw">{profile.tag_list.join('   ')}</p>
        <div className="actions">
          <a href="#contact" className="btn">Me contacter</a>
          {profile.cv_url && (
            <a href={profile.cv_url} className="btn btn-outline" target="_blank" rel="noreferrer" download>
              📄 Télécharger mon CV
            </a>
          )}
        </div>
      </div>
    </section>
  );
}
