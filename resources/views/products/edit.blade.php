<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Edit a product</h1>

    <div>
        @if($errors->any())
        <ul>
            {{-- Imprimir todos los errores --}}
            @foreach ($errors->all() as $error )
                <li>{{$error}}</li>
            @endforeach
        </ul>
            
        @endif
    </div>
    <form action="{{ route('product.update', ['product' => $product]) }}" method="POST">
        {{-- Para la seguridad --}}
        @csrf
        @method('put')
        {{-- Con value, mostramos el valor que tiene la tabla antes de ser editada --}}
        <div>
            <label for="name">Product name</label>
            <input type="text" name="name" placeholder="Name" value="{{$product->name}}">
        </div>
        <div>
            <label for="name">Qty</label>
            <input type="text" name="qty" placeholder="Qty" value="{{$product->qty}}">
        </div>
        <div>
            <label for="name">Price</label>
            <input type="text" name="price" placeholder="Price" value="{{$product->price}}">
        </div>
        <div>
            <label for="name">Description</label>
            <input type="text" name="description" placeholder="Description" value="{{$product->description}}">
        </div>
        <div>
            <input type="submit" value="update product">
        </div>

    </form>
</body>
</html>