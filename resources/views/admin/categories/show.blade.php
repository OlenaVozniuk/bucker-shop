@extends('admin.layout.layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Category: {{$category->name}}</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-warning mb-3" href="{{ route('admin.categories.index') }}"> Back Category Editor</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Id:</strong>
                {{ $category->id }}
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $category->name }}
            </div>
        </div>
    </div>


<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Subcategory:</strong>
            @foreach($category->subcategories as $subcategory)
                <ul>
                    <li><a href="{{ route('admin.subcategories.show', $subcategory->id) }}">{{ $subcategory->name}} </a></li>
                </ul>
            @endforeach
        </div>
    </div>
</div>
@endsection
