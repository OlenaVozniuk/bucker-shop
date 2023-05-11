@extends('admin.layout.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Products Editor</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('admin.products.create') }}"> Create New Product</a>
            </div>
        </div>
    </div>
    <br>

    <form action="{{ route('admin.products.index' )}}" method="GET" enctype="multipart/form-data">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">

                    <strong>Filter by name:</strong>
                    <input type="text" name="name" value="{{ request('name') }}" class="form-control"
                           placeholder="Write product name"
                           style="margin-top:5px">
                    @error('name')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <strong><label for="categories">Filter by category:</label></strong>
                    <select name="category_id" data-categories="{{$subcategories->toJson()}}"
                            class="form-control category_select">
                        <option value="">Choose category</option>
                        @foreach($categoriesAll as $category)
                            <option
                                {{request('category_id') == $category->id ? 'selected' : ''}} value="{{$category->id}}">{{$category->name}} </option>
                        @endforeach
                    </select>
                    @error('category_id')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <strong><label for="subcategories">Filter by subcategory:</label></strong>
                    <select name="subcategory_id"
                            class="form-control subcategory_select">
                        <option value="">Choose subcategory</option>
                        @foreach($subcategories->all() as $subcategory)
                            <option
                                {{request('subcategory_id') == $subcategory->id ? 'selected' : ''}} value="{{$subcategory->id}}">{{$subcategory->name}} </option>
                        @endforeach
                    </select>
                    @error('subcategory_id')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
                <input type="submit" class="btn btn-warning" style="margin-top:7px">

            </div>
        </div>
    </form>

    <table class="table table-bordered" style="margin-top:10px">
        <tr>
            <th>Id</th>
            <th>Image</th>
            <th>Name</th>
            <th>Price</th>
            <th>Model</th>
            <th>Subcategory</th>
            <th>Category</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($products as $product)
            <tr>
                <td>{{ $product->getKey() }}</td>
                <td><img src="{{ asset('storage/uploads').'/'.$product->image }}" width="100px"></td>
                <td><a href="{{ route('admin.products.show', $product->id) }}">{{ $product->name }}</a></td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->model }}</td>
                <td>
                    <a href="{{ route('admin.subcategories.show', $product->subcategory) }}">{{ $product->subcategory->name }}</a>
                </td>
                <td>
                    <a href="{{ route('admin.categories.show', $product->subcategory->category) }}">{{ $product->subcategory->category->name }}</a>
                </td>

                <td>
                    <form action="{{ route('admin.products.destroy',$product->id) }}" method="POST">

                        <a class="btn btn-primary" href="{{ route('admin.products.edit',$product->id) }}">Edit</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {!! $products->links() !!}



    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
            integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function () {
            let categorySelectedId = $('.category_select').val();
            let subcategories = $('.category_select').data('categories');

            $('.subcategory_select').empty();
            $('.subcategory_select').append($("<option></option>").attr("value", '').text('Choose subcategory'))

            $.each(subcategories, function (index, subcategory) {
                if (subcategory.category_id === parseInt(categorySelectedId)) {
                    $('.subcategory_select').append($("<option></option>").attr("value", subcategory.id).text(subcategory.name))
                }
            })
        })

        $(document).on('change', '.category_select', function (e) {
            e.preventDefault();

            let categorySelectedId = $(this).val();
            let subcategories = $(this).data('categories');

            $('.subcategory_select').empty();
            $('.subcategory_select').append($("<option></option>").attr("value", '').text('Choose subcategory'))

            $.each(subcategories, function (index, subcategory) {
                if (subcategory.category_id === parseInt(categorySelectedId)) {
                    $('.subcategory_select').append($("<option></option>").attr("value", subcategory.id).text(subcategory.name))
                }
            });
        })
    </script>
@endsection
