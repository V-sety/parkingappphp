@extends('layouts.myapp')

@section('content')
    <h1> Автомобили на стоянке: </h1>
    @if (count($cars) > 0 )
        @foreach($cars as $car)
            <div class = 'well'>
                <table class='table'>
                    <tr class="table-primary"> 
                        <th scope="row"> Номер</th>
                        <td>{{$car->slate}}</td>
                    </tr>
                    <tr><th scope="row"> Марка</th>
                        <td>{{$car->brand}}</td></tr>
                    <tr><th scope="row"> Модель</th>
                        <td>{{$car->model}}</td></tr>
                    <tr><th scope="row">Цвет</th>
                        <td>{{$car->color}}</td></tr>
                    <tr><th scope="row">Находится на стоянке</th>
                        <td>{{ $car->parked ? 'yes': 'no'}}</td></tr>
                </table>
            </div>
        @endforeach
        {{$cars->links()}}
    @else
        <h2>There is no cars on the parking lot right now :(</h2>
    @endif
    
@endsection