@extends('admin.layout.layout')

@section('content')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Show Products:</strong>
                @foreach($products as $product)
                    <ul>
                        <li><a href="{{ route('admin.products.show', $product->id) }}">{{ $product->name}} </a></li>
                    </ul>
                @endforeach
            </div>
        </div>
    </div>
@endsection
