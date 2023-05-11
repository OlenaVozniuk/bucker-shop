<x-layout>
    <x-slot:title>
        Links
    </x-slot:title>
    @foreach($links as $elem)
        <ul>
            <li><a href="http://{{$elem['href']}}">{{$elem['text']}}</a></li>
        </ul>
    @endforeach

    <table>
        <tr>
            <th>№</th>
            <th>Ім"я</th>
            <th>Прізвище</th>
            <th>Зарплата</th>
        </tr>
        @foreach($employees as $data)
            @if($data['salary']==2000)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$data['name']}}</td>
                    <td>{{$data['surname']}}</td>
                    <td>{{$data['salary']}}</td>
                </tr>
            @endif
        @endforeach
    </table>


    <table>
        <tr>
            <th>Ім"я</th>
            <th>Прізвище</th>
            <th>Статус</th>
        </tr>
        @foreach($users as $elem)
            <tr>
                <td>{{$elem['name']}}</td>
                <td>{{$elem['surname']}}</td>
                <td class="{{$elem['banned'] ? 'bunned' : 'active'}}">{{$elem['banned'] ? 'забанен' : 'активен'}}</td>
            </tr>
        @endforeach
    </table>
    <style>
        .bunned {
            color: red;
        }

        .active {
            color: green;
        }

        .notactive {
            color:blue;
        }
    </style>


    <select name="Value">
        @foreach($array as $key => $elem)
            <option value="{{$key}}">{{$elem}}</option>
        @endforeach
    </select>

    @foreach($array as $elem)
        <p><input type="text" value="{{$elem}}"></p>
    @endforeach

    <ul>
        @foreach($days as $elem)
            <li class="{{$elem==$date ? 'active' : 'notactive'}}">{{$elem==$date ? 'active' : $elem}}</li>
        @endforeach
    </ul>


</x-layout>
