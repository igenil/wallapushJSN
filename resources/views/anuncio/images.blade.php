@extends('layouts.app')

@section('content')

<br>
<center>
        <br>
        @if(\Session::has('success'))
            <center><div class="alert alert-danger" style="width:30%;"> <center>{!! \Session::get('success') !!} </center></div></center>
            <br>
        @endif
        <br>
    <form method="POST" action="{{route ('addimagen', ['id'=> $imagenes[0]->id_anuncio])}}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type=file  name="uploadedfile"/>
        <br><br>
        <button class="btn btn-success" type="submit">Añadir</button>
    </form>
    <br><br>
    @foreach($imagenes as $imagen)
        <div style="border:solid 1px #000; border-radius:10px; width: 20%;">
            <img src="{{asset('../storage/app/public/anuncio/'. $imagen->img )}}" style="width:180px; height:200px;" alt="...">
            <br><br>
            <a class="btn btn-danger" href="{{ route ('eliminarimages', ['id'=> $imagen->id]) }}" style="color:blanchedalmond">Eliminar</a><br><br>
        </div>
        <br>
    @endforeach

</center>

@endsection