<h3>Nouveau message depuis votre portfolio</h3>
<p><strong>Nom :</strong> {{ $msg->name }}</p>
<p><strong>E-mail :</strong> {{ $msg->email }}</p>
<p><strong>Message :</strong></p>
<p>{!! nl2br(e($msg->message)) !!}</p>
