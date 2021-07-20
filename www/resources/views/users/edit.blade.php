@extends ('layout')

@section ('content')
<h1>{{ $user->name }}</h1>
<div>{{ $user->email }}</div>

<form method="POST" action="{{ route('users.update', $user) }}" name="update">

    @csrf
    @method('PUT')

    <label>Role</label>
    <select>
        @foreach ($roles as $role)
            <option
                value="{{ $role['value'] }}"
                {{ ($role['value'] === $userRole) ? 'selected' : '' }}
            >
                {{ $role['label'] }}
            </option>
        @endforeach
        <!-- $user->role->name; -->
    </select>
</form>

<section>
    <h3>Abilities</h3>
    @if ( empty($permissions) )
        <div>Set role to give permissions</div>
    @else
        <ul>
            @foreach ($permissions as $permission)
                <li>{{ $permission }}</li>
            @endforeach
        </ul>
    @endif
</section>
@endsection