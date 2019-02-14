@extends('layouts.app3')

@section('content')
<br><br><br><br>
<div class="container">
    <div class="row justify-content-center">
            
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verifica tu correo electrónico') }}</div>
                
                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('El email ha sido reenviado satisfactoriamente.') }}
                        </div>
                    @endif

                    {{ __('Antes de seguir, debes verificar tu correo.') }}
                    , <a href="{{ route('verification.resend') }}">{{ __('Si no has recibido el email haz clic en este link') }}</a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
