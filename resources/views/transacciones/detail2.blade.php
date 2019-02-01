@extends('layouts.app')

@section('content')

<div class="container">
    <br>
    <h3 style="text-align: center">RANKING DE VENTAS</h3>
    
    <div style="text-align: center; ">
        <br>
        <br>
        <center>
        <table style="width:50%; float:center;" class="table">
            <thead>
            <tr>
                <td><strong>USUARIO</strong></td>
                <td><strong>VALORACION</strong></td>
                <td></td>
            </tr>
            </thead>
            <tbody>
                @foreach($usuarios as $usuario)
                    <tr>
                        @foreach($usuario as $cont)                          
                            <td>{{$cont}}</td>              
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
        </center>
    </div>
</div>
@endsection
