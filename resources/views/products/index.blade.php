<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Product</h1>
    <div>
        @if(session()->has('succes'))
            <div>
                {{session('succes')}} {{-- Este succes es el que tenemos en nuestro controlador --}}
            </div>
        @endif
    </div>
    <div>
        <div>
            <a href="{{ route('product.create') }}"> Create a new product</a>
        </div>
    </div>
    {{-- Obtener toda la data del product controller index() --}}
    <div>
        <table border="1">
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Qty</th>
                <th>Price</th>
                <th>Description</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            {{-- Obtener cada uno de los productos --}}
            @foreach ($products as $product)
                <tr>
                    <td>{{$product->id}}</td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->qty}}</td>
                    <td>{{$product->price}}</td>
                    <td>{{$product->description}}</td>
                    <td>
                        {{-- product viene del route para editar --}}
                        <a href="{{ route('product.edit', ['product' => $product]) }}">Edit</a>
                    </td>
                    <td>
                        <form action="{{ route('product.destroy', ['product' => $product]) }}" method="POST">
                            @csrf
                            @method('delete')
                            <input type="submit" value="delete">
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>

    </div>
</body>
</html>