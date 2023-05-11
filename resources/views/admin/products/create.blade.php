@extends('admin.layout.layout')

@section('content')
<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left mb-2">
                <h2>Add new product</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('admin.products.index') }}"> Back </a>
            </div>
        </div>
    </div>
    @if(session('status'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('status') }}
        </div>
    @endif
    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Product Name:</strong>
                    <input type="text" name="name" value="{{old('name')}}" class="form-control" placeholder="Product Name">
                    @error('name')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                    <strong>Price:</strong>
                    <input type="text" value="{{old('price')}}" name="price" class="form-control" placeholder="Product price">
                    @error('price')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                    <strong>Model:</strong>
                    <input type="text" name="model" class="form-control" placeholder="Product model">
                    @error('model')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                    <strong><label for="categories">Choose a Category:</label></strong>
                    <select name="category_id" data-categories="{{\App\Models\Subcategory::query()->get()->toJson()}}"
                            class="form-control category_select">
                        <option>Select category</option>
                        @foreach($categoriesAll as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                    <strong><label for="subcategories">Choose a Subcategory:</label></strong>
                    <select name="subcategory_id" class="form-control subcategory_select">
                        <option>Select subcategory</option>
{{--                        @foreach(\App\Models\Subcategory::query()->get()->all() as $subcategory)--}}
{{--                            <option value="{{$subcategory->id}}">{{$subcategory->name}}</option>--}}
{{--                        @endforeach--}}
                    </select>
                    @error('subcategory_id')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror

                        <div class="form-group">
                            <strong>Download image:</strong>
                            <input type="file" name="image" class="form-control" placeholder="image">
                        </div>
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

