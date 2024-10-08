<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
</head>

<body>
    <div class="container">
        <h4>Edit Product</h4>
        <hr>

        @if (session('message'))
            <div class="alert alert-success" role="alert">
                {{ session('message') }}
            </div>
        @endif
        
        <form method="POST" action='{{ route("admin.products.update", $product->id) }}' enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <input class="form-control" type="text" name="title" placeholder="Title" value="{{$product->title}}">
                @error('title')
                <label class="text-danger">{{ $message }}</label>
                @enderror
            </div>

            <div class="form-group">
                <a class="btn btn-danger mr-1" href='{{ route("admin.products.index") }}' type="submit">Cancel</a>
                <button class="btn btn-success" type="submit">Save</button>
            </div>
        </form>
    </div>
</body>

</html>