import { useState } from 'react';
import { sendContact } from '../api';

export default function Contact({ profile }) {
  const [form, setForm] = useState({ name: '', email: '', message: '' });
  const [status, setStatus] = useState({ type: '', text: '' });
  const [loading, setLoading] = useState(false);

  const change = (e) => setForm({ ...form, [e.target.name]: e.target.value });

  const submit = async (e) => {
    e.preventDefault();
    setLoading(true);
    setStatus({ type: '', text: '' });
    try {
      const r = await sendContact(form);
      setStatus({ type: 'ok', text: '✅ ' + r.message });
      setForm({ name: '', email: '', message: '' });
    } catch (err) {
      setStatus({ type: 'err', text: '❌ ' + err.message });
    } finally {
      setLoading(false);
    }
  };

  return (
    <section id="contact" className="section">
      <p className="eyebrow">CONTACT</p>
      <h2 className="title">Me contacter</h2>
      <div className="contact-wrap">
        <div className="contact-info">
          <p>Une idée, un projet, une opportunité ? N'hésitez pas à m'écrire, je réponds rapidement.</p>
          <a href={`mailto:${profile.email}`}>📧 {profile.email}</a>
          {profile.phone && (
            <a href={`tel:${profile.phone.replace(/\s/g, '')}`}>📱 {profile.phone}</a>
          )}
          {profile.github && <a href={profile.github} target="_blank" rel="noreferrer">🔗 GitHub</a>}
          {profile.linkedin && <a href={profile.linkedin} target="_blank" rel="noreferrer">💼 LinkedIn</a>}
        </div>

        <form onSubmit={submit}>
          <input name="name" placeholder="Votre nom" value={form.name} onChange={change} required />
          <input name="email" type="email" placeholder="Votre e-mail" value={form.email} onChange={change} required />
          <textarea name="message" rows="5" placeholder="Votre message" value={form.message} onChange={change} required />
          <button className="btn" disabled={loading}>{loading ? 'Envoi…' : 'Envoyer'}</button>
          {status.text && <p className={`status ${status.type}`}>{status.text}</p>}
        </form>
      </div>
    </section>
  );
}
