@extends('layouts.myapp')

@section('content')
    <h1>Изменение данных о клиенте</h1>
    {!! Form::open(['action' => ['ClientsController@saveEditClient', $client[0]->client_id ], 'method' => 'post']) !!}
        <div class='form-group'>
            {{Form::label('name', 'Client`s name: ' )}}
            {{Form::text('name', $client[0]->name , ['class' => 'form-control'] )}}
        </div>
        <div class='form-group'>
            {{Form::label('gender', 'Client`s gender: ' )}}
            {{Form::text('gender', $client[0]->gender, ['class' => 'form-control'] )}}
        </div>
        <div class='form-group'>
            {{Form::label('phone', 'Client`s phone number: ' )}}
            {{Form::text('phone', $client[0]->phone, ['class' => 'form-control'] )}}
        </div>
        <div class='form-group'>
            {{Form::label('adress', 'Client`s adress: ' )}}
            {{Form::text('adress', $client[0]->adress, ['class' => 'form-control'] )}}
        </div>
        {{Form::hidden('_method', 'put')}}
        {{Form::submit('Сохранить изменения', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection