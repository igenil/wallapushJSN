@extends('layouts.app')

@section('content')
<div class="container">
    <br><br>
    <center><h1>LISTADO DE TUS COMPRAS</h1></center>
    <br>
        <table class="table">
            <thead class="thead-light">
                <tr>
                <th><i class="fas fa-cart-arrow-down"></i></th>
                <th scope="col">Producto</th>
                <th scope="col">Precio</th>
                <th scope="col">Acción</th>
                </tr>
            </thead>
            <tbody>
                @foreach($trans as $tran)
                    <tr>      
                        <td style="color: #5dea79;"><b>COMPRADO</b></td>
                        <td>{{$tran->anuncio->producto}}</td>
                        <td>{{$tran->anuncio->precio}} €</td> 
                        @if($tran->valoracion == null)  
                        <td>
                            <a class="btn btn-outline-warning" data-toggle="modal" data-target="#ValorarModal{{$tran->id}}"><i class="far fa-star"></i> Valorar</a>
                            <div class="modal fade" id="ValorarModal{{$tran->id}}"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Valorar este producto</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <center>
                                            <div role="alert">
                                            <form method="POST" action="addValoracion/{{$tran->id}}" id="form">
                                                    {{ csrf_field() }}
                                                    <div>
                                                        <p>Gracias por querer valorar este producto, agradecemos su valoración.<br>
                                                            Selecciona una puntuación siendo 1 la más baja y 5 la más alta.
                                                        </p>
                                                    </div>                          
                                                    <input class="form-check-input" type="radio" name="valoracion" value='1'>1<br>
                                                    <input class="form-check-input" type="radio" name="valoracion" value='2'>2<br>
                                                    <input class="form-check-input" type="radio" name="valoracion" value='3'>3<br>
                                                    <input class="form-check-input" type="radio" name="valoracion" value='4'>4<br>
                                                    <input class="form-check-input" type="radio" name="valoracion" value='5'>5<br>
                                                    <br>
                                                    <br>
                                                    <button type="submit" form='form' name="addValoracion" class="btn btn-warning">{{ __("Valorar") }}</button> &nbsp;           
                                                    <a href="{{ url('compras/') }}" class="btn btn-danger">Cancelar</a> &nbsp;
                                                </form>
                                                <br>  
                                            </div>
                                        </center>
                                    </div>
                                    </div>
                                </div>
                            </div>  
                        </td> 
                        @else
                            <td style="color: #fcb207"><b>VALORADO</b></td>
                        @endif            
                    </tr>
                @endforeach
            </tbody>
        </table>        
</div>
@endsection