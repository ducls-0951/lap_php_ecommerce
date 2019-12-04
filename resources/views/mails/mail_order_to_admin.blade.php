@component('mail::message')
<h3>{{ __('mail.order_process') }} {{ $countOrder }}</h3>
<h3>{{ __('mail.please') }}</h3>
@component('mail::button', ['url' => route('admin.index_order')])
<h3>{{ __('mail.detail') }}</h3>
@endcomponent
@endcomponent
