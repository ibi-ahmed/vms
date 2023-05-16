<x-mail::message>
# Appointment Created!

Hello {{ $staffName }},  

A visitation appointment for **{{ $appointment->first_name.' '.$appointment->last_name }}** from **{{ $appointment->company }}** has been created for you.
Click the button below to *view* the appointment details. 

<x-mail::button :url="'https://vms.nmdpra.gov.ng'">
View Appointment
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
