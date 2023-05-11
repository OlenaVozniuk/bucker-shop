<x-layout>
    <x-slot:title>
        Posts
    </x-slot:title>
    @foreach ($posts as $post)
        <div>
            <h2>{{ $post->title }}</h2>
            <div>
                {{ $post->slug }}
            </div>
        </div>
    @endforeach
</x-layout>
