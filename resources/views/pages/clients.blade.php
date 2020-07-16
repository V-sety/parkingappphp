@extends('layouts.myapp')

@section('content')
    <h1>Клиенты: </h1>
    @if (count($clients) > 0 )
        @foreach($clients as $client)
            <div class = 'well'>
                <table class='table'>
                    <tr class="table-primary"> 
                        <th scope="row"> Имя</th>
                        <td>{{$client->name}}</td>
                        <td>
                        <a href="/clients/{{$client->client_id}}/edit" class='btn btn-warning float-right'>Редактировать</a>

                        {!! Form::open(['action' => ['ClientsController@deleteClient', $client->client_id ], 'method' => 'post', 'class'=>'float-right']) !!}
                            {{Form::hidden('_method', 'delete')}}
                            {{Form::submit('Удалить', ['class' => 'btn btn-danger'])}}
                        {!!Form::close()!!}
                        </td>
                    </tr>
                    <tr><th scope="row"> Пол</th>
                        <td>{{$client->gender}}</td></tr>
                    <tr><th scope="row"> Телефон</th>
                        <td>{{$client->phone}}</td></tr>
                    <tr><th scope="row">Адрес</th>
                        <td>{{$client->adress}}</td></tr>
                    <tr><th scope="row">Машины</th>
                    <td><a href="/clients/{{$client->client_id}}" class='btn btn-primary'>Просмотреть машины</a></td></tr>
                </table>
            </div>
        @endforeach
        {{$clients->links()}}
    @endif
@endsection