@extends('dashboard.layouts.master') 
@section('title')
    All Users {{ $users->count() }}
@endsection
@section('main-content')
@if($successMsg = Session::get('success'))
    <div class="alert alert-success text-center mt-3">
        {{ $successMsg }}
    </div>
@endif
@if($unauthorizedAction = Session::get('unauthorized_action'))
    <div class="alert alert-danger text-center mt-3">
        {{ $unauthorizedAction }}
    </div>
@endif
<div class="row">
    <div class="col-12 grid-margin">
        <div class="d-flex justify-content-end flex-wrap">
            <div class="d-flex justify-content-between align-items-end flex-wrap">
                <a href="{{ route('users.create') }}" class="btn btn-custom1 my-3 text-light font-weight-bold">
                    <span>Add User: </span>
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Table with stripped rows -->
<table class="table table-striped-custom w-100 mx-auto">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">ID</th>
            <th scope="col">Username</th>
            <th scope="col">Email</th>
            <th scope="col">User_type</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    
    <tbody>
        @forelse ($users as $user)
        <tr>
            <td class="font-weight-bold">{{ $loop->iteration }}</td>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name}}</td>
            <td>{{ $user->email }}</td>
            <td>{{ ucfirst($user->user_type) }}</td>
            <td>
                
                <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="d-flex justify-content-center align-items-center">
                    <a href="{{ route('users.show', $user->id) }}" class="btn btn-warning fs-6">Show</a>
                @if(auth()->user()->user_type == 'admin')
                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-success fs-6">Edit</a>
                @endif
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger fs-6" onclick='return confirm("Are you sure that you want to delete this user: {{ $user->name }}")'>Delete</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="8" class="text-center">
                <div class="alert alert-danger-custom my-5 w-50 mx-auto">
                    <span>There are no users yet! <a href="{{ route('users.create') }}" class="fw-bold text-danger">Add Users From Here</a></span>
                </div>
            </td>
        </tr>
        @endforelse
    </tbody>
</table>
<!-- End Table with stripped rows -->

<!-- Pagination -->
<div class="my-4 pagination-custom d-flex justify-content-center">
    {{ $users->links() }}
</div>

@endsection
