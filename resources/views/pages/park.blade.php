@extends('layouts.myapp')
@section('content')
<h1>Добавить машину на стоянку</h1>
{!! Form::open(['action' => 'CarsController@parkCar', 'method' => 'post']) !!}
    <div class='form-group'>
            {{Form::label('client_id', 'Выберите владельца: ' )}}
            <select name='client_id' class='form-control' >
                @foreach ($clients as $client)
            <option value="{{$client->client_id}}">{{$client->name}}</option>
                @endforeach
            </select>
            {{Form::label('car', 'Выберите машину: ' )}}
            <select name="car" class='form-control'></select>
    </div>
    {{Form::hidden('_method', 'put')}}
    {{Form::submit('Добавить', ['class' => 'btn btn-primary'])}}
{!! Form::close() !!}
@endsection
@section('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
     $(document).ready(function() {
    $('select[name="client_id"]').on('change', function() {
        var client_id = $(this).val();
            if(client_id) {
            $.ajax({
                url: '/park/ajax/'+encodeURI(client_id),
                type: "GET",
                dataType: "json",
                success:function(data) {
                    console.log(data)
                $('select[name="car"]').empty();
                $.each(data, function(key, value) {
                    $('select[name="car"]').append('<option value="'+ value.slate +'">'+ value.model +'</option>');
                    });
                }
            });
            }else{
            $('select[name="car"]').empty();
              }
           });
        })
</script>

@endsection