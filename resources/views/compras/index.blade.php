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
                            <td><a class="btn btn-outline-warning" data-toggle="modal" data-target="#ValorarModal"><i class="far fa-star"></i> Valorar</a></td> 
                        @endif                  
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="modal fade" id="ValorarModal"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <form method="POST" action="{{url('/addValoracion')}}">
                                {{ csrf_field() }}
                                <div>
                                    <p>Gracias por querer valorar este producto, agradecemos su valoración.<br>
                                        Selecciona una puntuación siendo 1 la más baja y 5 la más alta.
                                    </p>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="valoracion1" id="valoracion1" value="option1">
                                    <label class="form-check-label" for="exampleRadios1">
                                        1
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="valoracion2" id="valoracion2" value="option2">
                                    <label class="form-check-label" for="exampleRadios2">
                                        2
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="valoracion3" id="valoracion3" value="option3">
                                    <label class="form-check-label" for="exampleRadios3">
                                        3
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="valoracion4" id="valoracion4" value="option4">
                                    <label class="form-check-label" for="exampleRadios4">
                                        4
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="valoracion5" id="valoracion5" value="option5">
                                    <label class="form-check-label" for="exampleRadios5">
                                        5
                                    </label>
                                </div>
                                <br>
                                <br>
                                <button type="submit" name="addcategoria" class="btn btn-warning">{{ __("Valorar") }}</button> &nbsp;           
                                <a href="{{ url('compras/') }}" class="btn btn-danger">Cancelar</a> &nbsp;
                            </form>
                            <br>  
                        </div>
                    </center>
                </div>
                </div>
            </div>
        </div>
</div>
@endsection