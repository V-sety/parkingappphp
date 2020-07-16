@extends('layouts.myapp')

@section('content')
    <h1>Добавить клиента: </h1>
    {!! Form::open(['action' => 'ClientsController@saveInfo', 'method' => 'post']) !!}
        <div class='form-group'>
            {{Form::label('name', 'Имя: ' )}}
            {{Form::text('name', '', ['class' => 'form-control'] )}}
        </div>
        <div class='form-group'>
            {{Form::label('gender', 'Пол: ' )}}
            {{Form::text('gender', '', ['class' => 'form-control'] )}}
        </div>
        <div class='form-group'>
            {{Form::label('phone', 'Телефон: ' )}}
            {{Form::text('phone', '', ['class' => 'form-control'] )}}
        </div>
        <div class='form-group'>
            {{Form::label('adress', 'Адрес: ' )}}
            {{Form::text('adress', '', ['class' => 'form-control'] )}}
        </div>
        {{Form::submit('Добавить клиента', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection