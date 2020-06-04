@extends('principal')
@section('contenido')
    <template v-if="menu==0">
        <index-component></index-component>
    </template>
    <template v-if="menu==1">
        <avisoprivacidad-component></avisoPrivacidad-component>
    </template>
    <template v-if="menu==2">
        <soluciones-component></soluciones-component>
    </template>
    <template v-if="menu==3">
        <nosotros-component></nosotros-component>
    </template>
    <template v-if="menu==4">
        <outlet-component></outlet-component>
    </template>
    <template v-if="menu==5">
        <contacto-component></contacto-component>
    </template>
    <template v-if="menu==6">
        <computadoras-component></computadoras-component>
    </template>
    <template v-if="menu==7">
        <laptops-component><Laptops-component>
    </template>
    <template v-if="menu==8">
        <servidores-component><servidores-component>
    </template>
    <template v-if="menu==9">
        <monitores-component><monitores-component>
    </template>
@endsection