<x-mail::message>
# Introduction

The body of your message.
{{ $details['name'] }}
{{ $details['email'] }}
{{ $details['message'] }}

<x-mail::button :url="'http://127.0.0.1:8000/'">
    Go Site
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
