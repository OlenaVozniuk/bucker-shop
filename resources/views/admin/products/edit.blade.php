@extends('admin.layout.layout')

@section('content')
<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Product: {{$product->name}}</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('admin.products.index') }}" enctype="multipart/form-data"> Back</a>
            </div>
        </div>
    </div>
    @if(session('status'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('status') }}
        </div>
    @endif
    <form action="{{ route('admin.products.update',$product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Product Name:</strong>
                    <input type="text" name="name" value="{{ $product->name }}" class="form-control"
                           placeholder="Product name">
                    @error('name')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                    <strong>Price:</strong>
                    <input type="text" name="price" value="{{ $product->price }}" class="form-control"
                           placeholder="Product price">
                    @error('price')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                    <strong>Model:</strong>
                    <input type="text" name="model" value="{{ $product->model }}" class="form-control"
                           placeholder="Product model">
                    @error('model')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror

                    <strong><label for="categories">Choose a category:</label></strong>
                    <select name="category_id"
                            data-categories="{{$subcategories->toJson()}}"
                            class="form-control category_select">
                        @foreach($categoriesAll as $category)
                            <option
                                {{ $product->subcategory->category_id === $category->id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>

                        @endforeach
                    </select>
                    <strong><label for="subcategories">Choose a subcategory:</label></strong>
                    <select name="subcategory_id" class="form-control subcategory_select">
                        @foreach($subcategories->all() as $subcategory)
                            <option
                                {{ $product->subcategory_id === $subcategory->id ? 'selected' : '' }} value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                        @endforeach
                    </select>
                    @error('subcategory_id')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror

                    <div class="form-group">
                        <strong>Image:</strong>
                        <input type="file" name="image" class="form-control" placeholder="image">
                        <img src="{{ asset('storage/uploads').'/'.$product->image }}" style="margin-top:15px"
                             width="200px">

                    </div>
                    @error('image')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <button type="submit" class="btn btn-primary ml-3">Submit</button>
        </div>
    </form>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(document).on('change', '.category_select', function (e) {
        e.preventDefault();

        let categorySelectedId = $(this).val();
        let subcategories = $(this).data('categories');

        $('.subcategory_select').empty();
        $.each(subcategories, function (index, subcategory) {
            if (subcategory.category_id === parseInt(categorySelectedId)) {
                $('.subcategory_select').append($("<option></option>").attr("value", subcategory.id).text(subcategory.name))
            }
        });
    })
</script>
@endsection

