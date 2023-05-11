<x-layout>
    <x-slot:title>
        Users
    </x-slot:title>

    <form action = "/result" method="POST">
        @csrf
        Name <input name="name">
        Surname <input name="surname">
        City <input name="city">
        Salary <input name="salary">
        <input type="submit">
    </form>
</x-layout>
