@component('mail::message')

It's almost time for Copenhagen Live 2017!

We look forward to seeing you tomorrow on the 16th of September, 2017.

As you have booked your flight through our website, we have prepared your slot as well as stand at Copenhagen.

Below you'll find an overview of what you have booked.

- Callsign: {{ $booking->callsign }}
- Origin: {{ $booking->origin }}
- Destination: {{ $booking->destination }}
- Aircraft: {{ $booking->aircraft }}
@if(count($booking->sobt) > 0)
- Scheduled Off-Block Time: {{ $booking->sobt }} Z
@else
- Estimated Time of Arrival: {{ $booking->eta }} Z
@endif
@if(count($booking->remarks) > 0)
- Remarks: {{ $booking->remarks }}
@endif

We have assigned you stand **{{ $booking->stand }}** for your flight.<br><br>If you are arriving into Copenhagen, we will guide you towards this stand. If you are departing, please make sure that you load in at the assigned stand - or the nearest one, should your stand be occupied by non-event traffic.

@if(count($booking->ctot) > 0)
As you are departing Copenhagen during a peak in traffic, you have been assigned the following Calculated Take-Off Time (CTOT): **{{ $booking->ctot }} Z**. For more information on this, please see [here](https://cphlive-vatsim.net/briefing).
@endif

@if(count($booking->admin_remarks) > 0)
Dispatch remarks:

- {{ $booking->admin_remarks }}
@endif


We look forward to seeing you!
<br><br>
Kind regards,<br><br>
The {{ config('app.name') }} Team
@endcomponent
