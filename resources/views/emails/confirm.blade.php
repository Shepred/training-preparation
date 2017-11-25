@component('mail::message')

Thank you for your booking.

Below you'll find an overview of the data we have registered.

- Callsign: {{ $booking->callsign }}
- Origin: {{ $booking->origin }}
- Destination: {{ $booking->destination }}
- Aircraft: {{ $booking->aircraft }}
@if(count($booking->sobt) > 0)
- Schedules Off-Block Time: {{ $booking->sobt }}
@else
- Estimated Time of Arrival: {{ $booking->eta }}
@endif
@if(count($booking->remarks) > 0)
- Remarks: {{ $booking->remarks }}
@endif

Once the event nears, we will send you another e-mail with the dispatch information for your flight.

If you are not able to participate, kindly click the button below to go to our website and cancel your booking.

@component('mail::button', ['url' => 'https://cphlive-vatsim.net/booking'])
Cancel Booking
@endcomponent

We look forward to seeing you!

Kind regards,<br><br>
The {{ config('app.name') }} Team
@endcomponent
