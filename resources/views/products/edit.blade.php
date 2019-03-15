@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
        @include('includes.errors')

            <div class="card">
                <div class="card-header">Edit Product</div>
                <div class="card-body">
                <form action="{{route('product.update',['product' => $product->id])}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                <label for="name">Name</label>
                <input type="text" placeholder="Product Name" value="{{$product->name}}" name="name" class="form-control">
                </div>
                <div class="form-group">
                <img class="rounded border border-info" src="{{asset($product->image)}}" size="100px" height="70px" alt="">
                </div>
                <div class="form-group">
                <label for="image">Image</label>
                <input type="file" name="image" class="form-control-file">
                </div>
                <div class="form-group">
                <label for="price">Price</label>
                <input type="text" value="{{$product->price}}" placeholder="Product Price" name="price" class="form-control">
                </div>
                <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="" cols="5" rows="5" class="form-control">{{$product->description}}</textarea>
                </div>
                <div class="form-group text-center">
                <button type="submit" class="btn btn-sm btn-success">Update Product</button>
                </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection