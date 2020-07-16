@extends('layouts.myapp')

@section('content')
<h1>{{$client[0]->name}}`s cars: </h1>
    @if (count($currentCars) > 0 )
        @foreach($currentCars as $car)
            <div class = 'well'>
               <div class = 'well'>
                <table class='table'>
                    <tr class="table-primary"> 
                        <th scope="row"> Номер</th>
                        <td>{{$car->slate}}</td>
                        <td>
                        <a href="/clients/car/{{$car->slate}}/edit" class='btn btn-warning float-right'>Редактировать</a>

                        {!! Form::open(['action' => ['CarsController@deleteCar', $car->slate ], 'method' => 'post', 'class'=>'float-right']) !!}
                            {{Form::hidden('_method', 'delete')}}
                            {{Form::submit('Удалить', ['class' => 'btn btn-danger'])}}
                        {!!Form::close()!!}
                        </td>
                    </tr>
                    <tr><th scope="row"> Марка</th>
                        <td>{{$car->brand}}</td></tr>
                    <tr><th scope="row"> Модель</th>
                        <td>{{$car->model}}</td></tr>
                    <tr><th scope="row">Цвет</th>
                        <td>{{$car->color}}</td></tr>
                    <tr><th scope="row">Находится на стоянке</th>
                        <td>{{ $car->parked ? 'Да': 'Нет'}}</td></tr>
                </table>
            </div>
        @endforeach
        {{$currentCars->links()}}
    @endif
@endsection