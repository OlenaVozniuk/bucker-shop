@extends('admin.layout.layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Subcategory: {{ $subcategory->name }}</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-warning mb-3" href="{{ url()->previous() }}"> Back</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Id:</strong>
                {{ $subcategory->id }}
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Category:</strong>
                <a class="btn btn-primary"
                   href="{{ route('admin.categories.show', $subcategory->category) }}"> {{ $subcategory->category->name }}</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $subcategory->name }}
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Products:</strong>
                @foreach($subcategory->products as $product)
                    <ul>
                        <li><a href="{{ route('admin.products.show', $product->id) }}">{{ $product->name }}</a></li>
                    </ul>
                @endforeach
            </div>
        </div>
    </div>

</div>
@endsection


