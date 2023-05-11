@extends('admin.layout.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Subcategories Editor</h2>
            </div>
            <div class="pull-right">
                <form action="{{ route('admin.subcategories.index' )}}" method="GET" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <div class="form-group">
                                    <strong><label for="subcategories">Filter by name:</label></strong>
                                    <input type="text" name="name" value="{{ request('name') }}" class="form-control"
                                           placeholder="Write subcategory name"
                                           style="margin-top:5px">
                                    @error('name')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <strong><label for="categories">Filter by category:</label></strong>
                                <select name="category_id"
                                        data-categories="{{$subcategoriesJson}}"
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
                            <input class="btn btn-warning" style="margin-top:7px" type="submit">
                        </div>
                    </div>
                </form>

                <br>
                <a class="btn btn-success" href="{{ route('admin.subcategories.create') }}"> Create New Subcategory</a>
            </div>
        </div>
    </div>
    <br>

    <table class="table table-bordered">
        <tr>
            <th width="10px">Id</th>
            <th width="280px">Name</th>
            <th width="280px">Category</th>
            <th width="200px">Action</th>
        </tr>
        @foreach ($subcategories as $subcategory)
            <tr>
                <td>{{ $subcategory->getKey() }}</td>
                <td><a href="{{ route('admin.subcategories.show', $subcategory->id) }}">{{ $subcategory->name }}</a></td>
                <td><a href="{{ route('admin.categories.show', $subcategory->category) }}"
                       target="_blank">{{ $subcategory->category->name }}</a></td>
                <td>
                    <form action="{{ route('admin.subcategories.destroy',$subcategory->id) }}" method="POST">
                        <a class="btn btn-primary" href="{{ route('admin.subcategories.edit',$subcategory->id) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    <br>
    {!! $subcategories->links() !!}
@endsection
