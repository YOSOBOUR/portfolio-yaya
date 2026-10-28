const API = import.meta.env.VITE_API_URL || 'http://127.0.0.1:8000';

export async function getPortfolio() {
  const res = await fetch(`${API}/api/portfolio`, { headers: { Accept: 'application/json' } });
  if (!res.ok) throw new Error('Erreur de chargement');
  return res.json();
}

export async function sendContact(data) {
  const res = await fetch(`${API}/api/contact`, {
    method: 'POST',
    headers: { 'Content-Type': 'application/json', Accept: 'application/json' },
    body: JSON.stringify(data),
  });
  const json = await res.json().catch(() => ({}));
  if (!res.ok) {
    const firstError = json.errors ? Object.values(json.errors)[0]?.[0] : null;
    throw new Error(firstError || json.message || "Échec de l'envoi");
  }
  return json;
}
