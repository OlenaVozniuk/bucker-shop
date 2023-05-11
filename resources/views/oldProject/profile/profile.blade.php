<x-layout>
    <x-slot:title>
        Profiles
    </x-slot:title>

    <table>
        <caption>Profiles</caption>
        <tr>
            <th>ID</th>
            <th>Update Data</th>
            <th>Create Date</th>
            <th>Name</th>
            <th>Surname</th>
            <th>Email</th>

        </tr>
        @foreach($profiles as $profile)
            <tr>
                <td>{{$profile->user->id}} </td>
                <td>{{$profile->created_at}} </td>
                <td>{{$profile->updated_at}} </td>
                <td>{{$profile->name}} </td>
                <td>{{$profile->surname}} </td>
                <td>{{$profile->email}} </td>
            </tr>
        @endforeach
    </table>
</x-layout>
