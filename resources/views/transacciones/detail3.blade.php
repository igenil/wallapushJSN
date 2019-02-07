@extends('layouts.app')

@section('content')

<div class="container">
    <br>
    <h3 style="text-align: center">Ventas (Categoría y fecha)</h3>
    
    <div style="text-align: center; ">
        <br>
        <br>
        <center>
            <form method="POST" action="{{url('/categoriafecha')}}">
                @csrf   
                <table style="width:80%;">
                    <thead>
                        <tr>
                            <td>
                                Categoria:<select id="categoria"  name = "categoria" class="form-control">
                                    @foreach($categorias as $categoria)
                                        <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td>Desde:<input id="fecha1"  name = "fecha1" type="date" class="form-control" ></td>
                            <td>Hasta:<input id="fecha2"  name = "fecha2" type="date" class="form-control" ></td>
                            <td><br><button type="submit" class="btn btn-primary"> Buscar </button></td>
                        </tr>
                    </thead>
                </table>
            </form>
            <br>
            <form action="{{route('pdfs', ['categoria'=> $cat[0]->id,'fecha1'=> $fecha1, 'fecha2' => $fecha2])}}">
                @csrf
                <button  type="submit" class = "btn btn-primary"><span class="fas fa-print"></button>
            </form>
            <br>
        <table style="width:50%; float:center;" class="table">
            <thead>
            <tr>
                <td><strong>ANUNCIO</strong></td>
                <td><strong>CATEGORIA</strong></td>
                <td><strong>FECHA</strong></td>
                <td></td>
            </tr>
            </thead>
            <tbody>
                @foreach($trans as $tran)
                    @foreach($tran as $tra)
                        @foreach($tra as $tr)
                            <tr>                         
                                <td>{{$tr->anuncio->producto}}</td>   
                                <td>{{$tr->anuncio->categoria->nombre}}</td>  
                                <td>{{$tr->created_at->format('d/m/Y')}}</td>        
                            </tr>
                        @endforeach
                    @endforeach
                @endforeach
            </tbody>
        </table>
        </center>
    </div>
</div>
@endsection
