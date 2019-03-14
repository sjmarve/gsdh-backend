@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><a href="{{route('products.index')}}" class="btn btn-link btn-sm">< Back</a> Edit Product Data: #{{$product->id}}</div>

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
                    <p>
                        <small>Created At: {{$product->created_at}}</small>
                        <br>
                        <small>Updated At: {{$product->updated_at}}</small>
                    </p>
                    {{ Form::model($product, array('files' => true, 'route' => array('products.update', $product->id))) }}
                        <div class="form-group">
                            <label for="title">Title:</label>
                            {{Form::text('title', $product->title, [ 'class'=>"form-control", 'required' => true])}}
                          </div>
                          <div class="form-group">
                            <label for="sub_title">Sub Title:</label>
                             {{Form::text('sub_title', $product->sub_title, [ 'class'=>"form-control", 'required' => true])}}
                          </div>
                          <div class="form-group">
                            <label for="description">Description:</label>

                            {{Form::textarea('description', $product->description, ['rows'=>3, 'class'=>"form-control", 'required' => true])}}

                          </div>
                          <div class="form-group">
                            <label for="picture">Product image:</label>
                            @if($product->img_url)
                            <div>
                                <img width="200" src="{{$product->img_url}}" class="img-responsive">
                            </div>
                            @endif
                            {{Form::file('picture', ['class'=>"form-control"])}}
                          </div>


                          {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
                            <input type="hidden" name="_method" value="patch">

                    {{ Form::close() }}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
