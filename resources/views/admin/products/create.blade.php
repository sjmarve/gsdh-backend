@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><a href="{{route('products.index')}}" class="btn btn-link btn-sm">< Back</a> Create Product</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{route('products.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="email">Title:</label>
                            <input type="text" class="form-control" name="title" required>
                          </div>
                          <div class="form-group">
                            <label for="sub_title">Sub Title:</label>
                            <input type="text" class="form-control" name="sub_title" required>
                          </div>
                          <div class="form-group">
                            <label for="description">Description:</label>
                            <textarea name="description" rows="3" class="form-control" required></textarea>
                          </div>
                          <div class="form-group">
                            <label for="picture">Product image:</label>
                            <input name="picture" type="file" class="form-control" required></input>
                          </div>

                          <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
