<x-mail::message>
# Password Reset Request

Hi {{ $user->name }},

We received a request to reset your password. Please use the code below to reset your password. This code will expire in 15 minutes.

## Your Reset Code: {{ $reset_code }}

<x-mail::button :url="''">
Reset Your Password
</x-mail::button>

If you did not request a password reset, please ignore this email or contact support if you have questions.

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
