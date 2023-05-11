@extends('admin.layout.layout')

@section('content')
    <div class="row">
        <div class="container mt-2">
            <div class="pull-left">
                <h2>Categories Editor</h2>
                <form action="{{ route('admin.categories.index') }}" method="GET" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong><label for="categories">Filter by name:</label></strong>
                                <input type="text" name="name" value="{{ request('name') }}" class="form-control"
                                       placeholder="Write category name"
                                       style="margin-top:5px">
                                @error('name')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <input type="submit" class="btn btn-warning" style="margin-top:10px">
                        </div>
                    </div>
                </form>

                <div class="pull-right mb-2">
                    <a class="btn btn-success" style="margin-top:10px" href="{{route('admin.categories.create')}}"> Create
                        Category</a>
                </div>
            </div>

            <div class="card">
                <div class="card-body">


                    <table class="table">
                        <tr>
                            <th width="300px">Category Name</th>
                            <th width="280px">Action</th>
                        </tr>
                        @foreach ($categories as $category)
                            <tr>
                                <td><a href="{{ route('admin.categories.show', $category) }}">{{ $category->name }}</a>
                                </td>
                                <td>
                                    <form action="{{ route('admin.categories.destroy',$category->id) }}" method="Post">
                                        <a class="btn btn-primary" href="{{ route('admin.categories.edit', $category) }}">Edit</a>
                                        <a class="btn btn-warning" href="{{ route('admin.categories.subcategories', $category) }}">Subcategories</a>
                                        <a class="btn btn-success" href="{{ route('admin.categories.products', $category) }}">Products</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
            {!! $categories->links() !!}
        </div>
    </div>

@endsection
