@component('mail::message')
# E-chantier

Bonjour {{ $chief_name }} votre Compte a ete creer avec succes <br>
Utiliser le mot de passe par defaut de l'entreprise <br>
Et veuillez changer ce mot de passe dés votre connexion pour des raisons de securité.

@component('mail::button', ['url' => route('index')])
Connexion
@endcomponent

Cordialement,<br>
E-chantier
@endcomponent
