@extends('admin.layout.layout')

@section('content')
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Show Subcategory:</strong>
                    @foreach($subcategories as $subcategory)
                        <ul>
                            <li><a href="{{ route('admin.subcategories.show', $subcategory->id) }}">{{ $subcategory->name}} </a></li>
                        </ul>
                    @endforeach
                </div>
            </div>
        </div>
@endsection
