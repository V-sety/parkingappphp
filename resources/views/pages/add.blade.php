@extends('layouts.myapp')

@section('content')
    <h1>Добавить автомобиль: </h1>
    {!! Form::open(['action' => 'CarsController@saveCar', 'method' => 'post']) !!}
        <div class='form-group'>
            {{Form::label('slate', 'Номер: ' )}}
            {{Form::text('slate', '', ['class' => 'form-control'] )}}
        </div>
        <div class='form-group'>
            {{Form::label('brand', 'Марка: ' )}}
            {{Form::text('brand', '', ['class' => 'form-control'] )}}
        </div>
        <div class='form-group'>
            {{Form::label('model', 'Модель: ' )}}
            {{Form::text('model', '', ['class' => 'form-control'] )}}
        </div>
        <div class='form-group'>
            {{Form::label('color', 'Цвет: ' )}}
            {{Form::text('color', '', ['class' => 'form-control'] )}}
        </div>
        <div class='form-group'>
            {{Form::label('parked', 'Находится на стоянке: ' )}}
            {{Form::checkbox('parked' )}}
        </div>
        <div class='form-group'>
            {{Form::label('client_id', 'Выберите владельца: ' )}}
            <select name='client_id' class='form-control' >
                @foreach ($clients as $client)
            <option value="{{$client->client_id}}">{{$client->name}}</option>
                @endforeach
            </select>
        </div>
        {{Form::submit('Добавить автомобиль', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection