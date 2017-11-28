@component('mail::message')
# Welcome to Overcode

Hi, {{ $user->name }}! It's good to see you joining us. Before you can travel around our world,  make sure you have <strong>completed the account activation procedure</strong> by clicking the button below:

@component('mail::button', ['url' => route('account.activate').'?email='.$user->email.'&verify_token='.$user->verify_token])
Click to activate
@endcomponent

See you later!<br>
{{ config('app.name') }}
@endcomponent
