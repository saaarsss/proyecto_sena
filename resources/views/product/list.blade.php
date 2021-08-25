@extends('layout')
@section('title', 'Lista Productos')
@section('titlee', 'Listado de Productos')
@section('content')
<a href="{{route('product.form')}}" class="btn btn-primary">nuevo Producto</a>
@if(Session::has('message'))
<p class="text-danger">{{Session::get('message')}}</p>
@endif
@if(Session::has('successMessage'))
<p class="text-success">{{Session::get('successMessage')}}</p>
@endif

<table class="table table-striped table-hover">
    <thead>
        <tr>
        <th>Name</th>
        <th>Cost</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Brand</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
        @foreach($list as $product)
        <tr>
            <td>{{$product->name}}</td>
            <td>{{$product->cost}}</td>
            <td>{{$product->price}}</td>
            <td>{{$product->quantity}}</td>
            <td>{{$product->brand->brand}}</td>
            <td>
            <a href="{{ route('product.form', ['id'=> $product->id]) }}" class="btn btn-warning">Editar</a>
            
                <a href="{{ route('product.delete',['id'=>$product->id])}}"
                    class="btn btn-danger">Borrar</a>
                   
                
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection

