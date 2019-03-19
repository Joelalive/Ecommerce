@extends('layouts.app')

@section('content')

            <div class="card">
                <div class="card-header">Products</div>
                <div class="card-body">
                 <table class="table table-hover">
                 <thead>
                 <th>Name</th>
                 <th>Image</th>
                 <th>price</th>
                 <th>Edit</th>
                 <th>Delete</th>
                 </thead>
                 <tbody>
                 @foreach($products as $product)
                 <tr>
                 <td>{{ $product->name }}</td>
                 <td><img src="{{asset($product->image)}}" class="rounded" width="40px" height="40px" alt=""></td>
                 <td>{{ $product->price }}</td>
                 <td><a href="{{route('product.edit',['product'=>$product->id])}}" class="btn btn-info btn-sm">Edit</a></td>
                 <td><a href="{{route('product.delete',['product'=>$product->id])}}" class="btn btn-danger btn-sm">Delete</a></td>
                 </tr>
                 @endforeach
                 </tbody>
                 </table>
                 </div>
                </div>
            </div>

@endsection
