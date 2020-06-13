@component('mail::message')


The body of your message.

@component('mail::button', ['url' => '{{$data->link}}'])
Reset Password link
@endcomponent
{{$data->link}}

<br>
Thanks,<br>
{{ config('app.name') }}
@endcomponent
