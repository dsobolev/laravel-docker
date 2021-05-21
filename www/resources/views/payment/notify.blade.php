@extends ('layout')

@section ('content')
<h1>Successful pyments</h1>
<div class="container">        
    <ul>
        @forelse ($notifications as $item)
            @if ( 'App\Notifications\PaymentReceived' === $item->type )
                <li>
                    Successful payment at {{ $item->created_at }}
                    @if ( ! empty($item->data['amount']) )
                        <span>(${{ $item->data['amount'] }})</span>
                    @endif
                </li>
            @endif
        @empty
            <p>No new notifications received yet...</p>
        @endforelse
    </ul>
</div>
@endsection