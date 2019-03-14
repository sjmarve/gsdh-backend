@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Product List</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a href="{{route('products.create')}}" class="btn btn-success">Add Product</a>
                    <br><br>

                    <table class="table table-striped table-sm">

                        <tr>
                            <th>Id</th>
                            <th>Title</th>
                            <th>Sub Title</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>Actions</th>
                        </tr>

                        @forelse($products as $product)
                        <tr>
                            <td>{{$product->id}}</td>
                            <td>{{$product->title}}</td>
                            <td>{{$product->sub_title}}</td>
                            <td>{{$product->created_at}}</td>
                            <td>{{$product->updated_at}}</td>
                            <td>
                                <a class="btn btn-primary btn-sm" href="{{route('products.edit', ['id' => $product->id])}}">Edit</a>
                                <form method="post" action="{{route('products.destroy', ['id' => $product->id])}}" class="d-inline">
                                    @csrf
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('Are you sure you want to delete product with id of {{$product->id}}?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                            <caption class="text-center">No products added</caption>
                        @endforelse
                    </table>
                    <hr>
                    <p><small>Total products: {{$products->count()}}</small></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
