<x-layout>
    <x-slot:title>
        {{ $arr['title'] }}
    </x-slot:title>

    <p>{{ $arr['name'] }}</p>
    <p>{{ $arr['salary'] }}</p>
    <p>{{ $arr['age'] }}</p>
    <p>{{ count($arr) }}</p>
    <p>{{ $location['city'] ?? 'Lviv'}}</p>
    <p>{{ $location['country'] ?? 'Ukraine'}}</p>
    <p>{{ !isset($year) || !isset($month) || !isset($day) ? date('m.d.y') : "$year/$month/$day" }}</p>
    <p> Дата: {{ date('m.d.y') }}</p>
    <p> {!! $str !!} </p>
    {{--    @if($arr['age']>18)--}}
    {{--        <p> Возраст {{ $arr['age'] }} </p>--}}
    {{--    @elseif($arr['age']==18)--}}
    {{--        <p> Вам ровно 18 лет </p>--}}
    {{--    @else--}}
    {{--        <p> Вы не достигли совершеннолетия </p>--}}
    {{--    @endif--}}
    @unless($arr['age']>18)
        <p>Вы не достигли совершеннолетия </p>
    @endunless

    @if(count($number)>0)
        <p>Сума чисел {{array_sum($number)}} </p>
    @else
        <p> нет записей </p>
    @endif


    <ul>
        @foreach($number as $elem)
            <li>{{ $elem**2 }}</li>
        @endforeach
    </ul>

    <ul>
        @foreach($number as $key => $elem)
            <li>{{ $key+1}} => {{$elem}}</li>
        @endforeach
    </ul>

    <ul>
        @foreach($number as $elem)
            @if($elem % 2 == 0)
                <li>{{$elem}}</li>
            @endif
        @endforeach
    </ul>

    @if(is_array($data))
        <ul>
            @foreach($data as $elem)
                <li>{{$elem}}</li>
            @endforeach
        </ul>
    @else
        <p> {{$data}} </p>
    @endif


    <table>
        <caption> Массив чисел</caption>
        <tbody>
        <tr>@foreach($array as $number)
                @foreach($number as $elem)
                    <td> {{$elem}} </td>
                @endforeach</tr>
        @endforeach
        </tbody>
    </table>

    <ul>
        @foreach($employees as $employee)
            <li> {{$employee['name']}} {{$employee['surname']}} {{$employee['salary']}} </li>
        @endforeach
    </ul>

    <table>
        <caption> Employees</caption>
        <tr>
            <th>Name</th>
            <th>Surname</th>
            <th>Salary</th>
        </tr>

        @foreach($employees as $employee)
            <tr>
                <td>{{$employee['name']}} </td>
                <td>{{$employee['surname']}} </td>
                <td>{{$employee['salary']}} </td>
            </tr>
        @endforeach

        <ul>
            @foreach($employees as $employee)
                <li> {{$employee['name']}} {{$employee['surname']}} {{$employee['salary']}} </li>
            @endforeach
        </ul>
    </table>

    @forelse($users as $user)
        <p>{{$user}}</p>
    @empty
        <p>Массив пустой</p>
    @endforelse


    <ul>
        @foreach($strings as $string)
{{--            @php--}}
{{--                $class = '';--}}
{{--            @endphp--}}
{{--            @if($loop->first)--}}
{{--                @php $class = 'class="first"'; @endphp--}}
{{--            @elseif($loop->last)--}}
{{--                @php $class = 'class="last"'; @endphp--}}
{{--            @endif--}}

{{--        @php $class = $loop->first || $loop->last ? ($loop->first ? 'class="first"' : 'class="last"') : '' @endphp--}}

{{--            <li {{$class}} {{$string}} </li>--}}

            @if($loop->first)
                <li class="first">{{$string}}</li>
            @elseif($loop->last)
                <li class="last">{{$string}}</li>
            @else
                <li>{{$string}}</li>
            @endif
        @endforeach
    </ul>
    <style>
        .first {
            color:red;
        }
        .last{
            color: blue;
        }
    </style>

    @for ($i = 0; $i <= 10; $i++)
      <p> значение счетчика: {{ $i }}</p>
    @endfor
</x-layout>

