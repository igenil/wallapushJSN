@extends('layouts.app')
@section('content')

<br>
<center>
    @foreach($imagenes as $imagen)
        <div style="border:20px;">
        <img src="{{asset('../storage/app/public/anuncio/'. $imagen->img )}}" style="width:250px; heigth:300px" alt="...">
        </div>
        <br>
    @endforeach
</center>

@endsection