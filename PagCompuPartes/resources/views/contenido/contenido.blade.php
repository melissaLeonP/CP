@extends('principal')
@section('contenido')
    <template v-if="menu==0">
        <index-component></index-component>
    </template>
    <template v-if="menu==1">
        <nosotros-component></nosotros-component>
    </template>
    <template v-if="menu==2">
        <soluciones-component></soluciones-component>
    </template>
    <template v-if="menu==3">
        <outlet-component></outlet-component>
    </template>
    <template v-if="menu==4">
    <contacto-component></contacto-component>

    </template>
@endsection
