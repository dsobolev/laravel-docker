@extends ('layout')

@section ('content')
    <table class="border-collapse border-2 border-gray-500">
        <tr>
            <td>Name</td>
            <td>Email</td>
            <td>Role</td>
        </tr>
        @forelse ($users as $user)
            <tr>
                <td class="border border-gray-400 px-4 py-2">
                    <a href="{{ route('users.update', $user) }}">{{ $user->name }}</a>
                </td>
                <td class="border border-gray-400 px-4 py-2">{{ $user->email }}</td>
                <td class="border border-gray-400 px-4 py-2"><strong>{{ $user->getRoleLabel() }}</strong></td>
            </li>
        @empty
            <li>No users yet</li>
        @endforelse
    </table>
@endsection
