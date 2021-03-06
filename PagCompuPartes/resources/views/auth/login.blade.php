@extends('auth.contenido')
@section('login')

<form class="col s12 l12 was-validated " method="POST" action="{{ route('login') }}">
{{ csrf_field() }}
<div class="row" >
         <div class="center input-field col s12 l6  offset-l3 {{ $errors->has('email' ? 'has-error' : '' ) }}">
            <i class="material-icons prefix black-text">person</i>
             <input  value="{{old('email')}}"  name="email" id="email" type="text" class="validate" autofocus>
             <label for="email">Correo</label>
             {!! $errors->first('email','<span class="help-block">:message</span>') !!}
        </div>
    </div>
    <div class="row">
        <div class="center input-field col s12 l6  offset-l3 {{$errors->has('password' ? 'has-error': '' ) }}">
            <i class="material-icons prefix black-text">lock</i>
            <input id="password" name="password" id="password" type="password" class="validate">
            <label for="password">Contraseña</label>
            {!! $errors->first('password','<span class="help-block">:message</span>') !!}

            <!-- {!!$errors->first('password','<span class="invalid-feedback">:message</span>')!!} -->

        </div>
    </div>
        <div class="col s6 center">
        <button type="submit" class="waves-effect  btn  deep-orange lighten-4  white-text">Ingresar</button>

        </div>
</form>
@endsection