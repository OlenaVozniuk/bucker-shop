<x-layout>
    <x-slot:title>
        Users
    </x-slot:title>

    <table>
        <caption>Users</caption>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Age</th>
            <th>Salary</th>
            <th>Create Date</th>
        </tr>
        @foreach($users as $user)
            <tr>
                <td>{{$user->id}} </td>
                <td>{{$user->name}} </td>
                <td>{{$user->email}} </td>
                <td>{{$user->age}} </td>
                <td>{{$user->salary}} </td>
                <td>{{$user->created_at}} </td>
            </tr>
        @endforeach
    </table>

    </x-layout>
