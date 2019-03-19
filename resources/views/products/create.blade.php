@extends('layouts.app')

@section('content')

            <div class="card">
                <div class="card-header">Products</div>
                    <div class="card-body">
                        <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                            <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" name="name" class="form-control">
                            </div>
                            <div class="form-group">
                            <label for="">Price</label>
                            <input type="text" name="price" class="form-control">
                            </div>
                            <div class="form-group">
                            <label for="">Image</label>
                            <input type="file" name="image" class="form-control-file">
                            </div>
                            <div class="form-group">
                            <label for="">Description</label>
                            <textarea name="description" id="" cols="5" rows="5" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                            <button type="submit" class="btn btn-success btn-sm">Store Product</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

@endsection
