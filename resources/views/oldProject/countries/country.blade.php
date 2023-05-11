<x-layout>
    <x-slot:title>
        Countries
    </x-slot:title>

    {{--    <div>--}}
    {{--    @foreach($countries as $country)--}}

    {{--            <h2>{{$country->country_name}}</h2>--}}
    {{--            <ul>--}}
    {{--            @foreach($country->cities as $city)--}}

    {{--                    <li>{{$city->name}}</li>--}}
    {{--                    <li>city12</li>--}}
    {{--                    <li>city13</li>--}}
    {{--                @endforeach--}}
    {{--            @endforeach--}}
    {{--            </ul>--}}
    {{--        </div>--}}

    @foreach($countries as $country)
        <div>
            <h2>{{$country->country_name}}</h2>
            <ul>
                @foreach($country->cities as $city)
                    <li>{{$city->name}}</li>
                @endforeach
            </ul>
        </div>
    @endforeach

</x-layout>
зрз
