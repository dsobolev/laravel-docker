@extends ('layout')

@section ('content')
<h1>Press to Pay</h1>
<form method="POST" action="/payments">

    @csrf

    <div class="container">
        <input type="text" name="amount">                
        <button
            type="submit"
            class="btn btn-green"
        >
            Payment
        </button>
    </div>
@endsection