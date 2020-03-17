@extends('consolaPrincipal')
@section('consola')
    <template v-if="menu==0">
        
        <slider-component></slider-component>
    </template>
    <template v-if="menu==1">

        <productos-component></productos-component>
    </template>
    <template v-if="menu==2">
        <categorias-component></categorias-component>
    </template>
    <template v-if="menu==3">
        <h1>Cambiar contraseña</h1>
    </template>
    <template v-if="menu==4">
        <h1>menu 4</h1>
    </template>
@endsection
