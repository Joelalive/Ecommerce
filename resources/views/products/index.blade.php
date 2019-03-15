@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Products</div>

                <div class="card-body">
                <table class="table table-hover">
                <thead>
                <th>Name</th>
                <th>Image</th>
                <th>Price</th>
                <th>Edit</th>
                <th>Delete</th>
                </thead>
                <tbody>
                @foreach($products as $product)
                <tr>
                <td>{{ $product->name }}</td>
                <td><img src="{{asset($product->image)}}" alt="" width="50px" height="40px"></td>
                <td>{{ $product->price }}</td>
                <td><a href="{{route('product.edit',['product' => $product->id])}}" class="btn btn-sm btn-info">Edit</a></td>
                <td><a href="{{route('product.delete',['product' => $product->id])}}" class="btn btn-sm btn-danger">Delete</a></td>
                </tr>
                @endforeach
                </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
