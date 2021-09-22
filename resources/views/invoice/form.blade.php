@extends('layout')
@section('content')
@section('title' , 'Nueva Factura')
@section('h1' , 'Nueva Factura')

<form action="" method="post">
    @csrf
    <div class="row">
        <div class="col-sm-3"><b>Producto</b></div>
        <div class="col-sm-3"><b>Cantidad</b></div>
        <div class="col-sm-3"><b>Precio</b></div>
        <div class="col-sm-3"><b>Total</b></div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            <select name="product[]" id="product" class="form-select">
                @foreach ($products as $product)
                <option value="{{ $product->id }}">{{ $product->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-sm-3">
<input type="number" name="quantity[]" id="quantity" min="1"
value="1"  class="form-control">
        </div>
        <div class="col-sm-3">
            <input type="number" name="price[]" id="price" min="1"
             class="form-control">
                    </div>
                    <div class="col-sm-3">
                        <input type="text" readonly id="total" class="form-control-plaintext">
                                </div>
    </div>
</form>
@endsection

@section('scripts')
<script>
    const products = @json($products);
    console.log(products);

    const productsList = document.querySelector('.form-select');
    const priceElement = document.querySelector('#price');
    const quantityElement = document.querySelector('#quantity');


    productsList.addEventListener('change', (event) => {
        let productId = event.target.value
        let product = products.filter( product => product.id == productId)
        console.log(product)
        document.getElementById('price').value = product[0].price
    })

    priceElement.addEventListener('change', (event) => {
       totalProducto()
    })

    quantityElement.addEventListener('change', (event) => {
       totalProducto()
    })

    function totalProducto(){
        let quantity = document.getElementById('quantity').value
        let price = document.getElementById('price').value
        total = price * quantity
        document.getElementById('total').value = total
    }
    </script>
    @endsection