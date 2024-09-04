<x-mail::message>
Bonjour {{$user_prenom}} {{$user_nom}}<br>
cliquez ici pour réinitialiser le mot de passe
<x-mail::button :url="route('getResetPassword',$reset_code)">
réinitialiser
</x-mail::button>
Merci<br>

software
</x-mail::message>
