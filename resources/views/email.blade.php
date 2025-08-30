<x-mail::message>
    <x-slot name="header">
        <h1>Welcome to Our Service!</h1>
    </x-slot>

    <p>Thank you for signing up. We are excited to have you on board!</p>

    <x-slot name="footer">
        <p>&copy; {{ date('Y') }} Our Service. All rights reserved.</p>
        {{config('app.name')}}
    </x-slot>
</x-mail::message>

