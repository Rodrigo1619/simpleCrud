<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Create a product</h1>

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
    <form action="{{ route('product.store')}}" method="POST">
        {{-- Para la seguridad --}}
        @csrf
        <div>
            <label for="name">Product name</label>
            <input type="text" name="name" placeholder="Name">
        </div>
        <div>
            <label for="name">Qty</label>
            <input type="text" name="qty" placeholder="Qty">
        </div>
        <div>
            <label for="name">Price</label>
            <input type="text" name="price" placeholder="Price">
        </div>
        <div>
            <label for="name">Description</label>
            <input type="text" name="description" placeholder="Description">
        </div>
        <div>
            <input type="submit" value="save a new product">
        </div>

    </form>
</body>
</html>