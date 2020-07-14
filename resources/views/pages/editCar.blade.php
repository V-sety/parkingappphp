@extends('layouts.myapp')

@section('content')
<h1>Изменение данные об автомобиле # {{$car[0]->slate}}</h1>
    {!! Form::open(['action' => ['DBController@saveEditCar', $car[0]->slate], 'method' => 'post']) !!}
        
        <div class='form-group'>
            {{Form::label('brand', 'Brand: ' )}}
            {{Form::text('brand', $car[0]->brand, ['class' => 'form-control'] )}}
        </div>
        <div class='form-group'>
            {{Form::label('model', 'Model: ' )}}
            {{Form::text('model', $car[0]->model, ['class' => 'form-control'] )}}
        </div>
        <div class='form-group'>
            {{Form::label('color', 'Color: ' )}}
            {{Form::text('color', $car[0]->color, ['class' => 'form-control'] )}}
        </div>
        <div class='form-group'>
            {{Form::label('parked', 'Parked: ' )}}
            {{Form::checkbox('parked', 1, $car[0]->parked )}}
        </div>
        <div class='form-group'>
            {{Form::label('client_id', 'Chose the owner: ' )}}
            <select name='client_id' class='form-control' >
                @foreach ($clients as $client)
            <option value="{{$client->client_id}}">{{$client->name}}</option>
                @endforeach
            </select>
        </div>
        {{Form::hidden('_method', 'put')}}
        {{Form::submit('Сохранить изменения', ['class' => 'btn btn-primary'])}}
        
    {!! Form::close() !!}
@endsection