@component('mail::message')
<h2>{{ __('mail.thanks') }}</h2>
<h3>{{ __('mail.quantity') }} : {{ $order->total_quantity }}</h3>
<h3>{{ __('mail.price') }} : {{ $order->total_price }} {{ __('mail.$') }}</h3>

@component('mail::button', ['url' =>  route('users.order_detail', $order->id)])
{{ __('mail.detail') }}
@endcomponent
@endcomponent
