@extends('admin.layout.layout')

@section('content')

    <div class="row">
        <div class="container mt-2">
            <div class="pull-left">
                <h2>Users List</h2>
                <form action="{{ route('admin.users.index') }}" method="GET" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong><label for="users">Search:</label></strong>
                                <input type="text" name="search" value="{{ request('search') }}" class="form-control"
                                       placeholder="Start search"
                                       style="margin-top:5px">
                                @error('search')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <input type="submit" class="btn btn-warning mb-3" style="margin-top:10px">
                        </div>
                    </div>
                </form>

                <table class="table">
                    <tr>
                        <th width="300px">User Name</th>
                        <th width="280px">E-mail</th>
                        <th width="280px">Status</th>
                        <th width="300px">Action</th>
                    </tr>
                    @foreach ($users as $user)
                        <tr>
                            <td><a href="{{ route('admin.users.show', $user->id) }}">{{ $user->name }}</a></td>
                            <td><a>{{$user->email}}</a></td>
                            <td><a>{{$user->is_active ? 'Active' : 'Blocked'}}</a></td>
                            <td>
                                @if(\Illuminate\Support\Facades\Auth::id() !== $user->getKey())
                                    <form action="{{ route('admin.users.destroy', $user->id) }}" method="Post">
                                        <a class="btn btn-{{$user->is_active ? 'warning' : 'success'}}"
                                           href="{{ route('admin.user.status', $user) }}">{{$user->is_active ? 'Blocked' : 'Unblocked'}}</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
        {!! $users->links() !!}
    </div>

@endsection
