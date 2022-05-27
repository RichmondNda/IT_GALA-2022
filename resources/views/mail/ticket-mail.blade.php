@component('mail::message')
# {{ $maildata['title'] }}

Bonjour {{ $maildata['personne']->nom }} {{ $maildata['personne']->prenom  }} !

Le bureau du C2E tient à vous remercier pour l'achat de votre ticket de participation au GALA.
Vous trouverez votre ticket de participation en pièce jointe.

Rendez-vous le samedi 11 juin à 18h30!

Cordialement,<br>

Le Bureau du C2E

{{-- @component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }} --}}

@endcomponent

