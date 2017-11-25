@component('mail::message')

We're sorry to see you go.

Your booking has been deleted from our database. Should you wish to fly anyway, that is entirely possible without a booking.

Should you wish to create another booking, please do so by clicking the button below.

@component('mail::button', ['url' => 'https://cphlive-vatsim.net/booking'])
Create Booking
@endcomponent

Kind regards,<br>
The {{ config('app.name') }} Team
@endcomponent
