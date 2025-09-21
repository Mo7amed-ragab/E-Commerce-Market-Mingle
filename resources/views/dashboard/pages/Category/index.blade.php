@extends('dashboard.layouts.master')
@section('title', __('index-dash.Index Page'))
@section('main-content')

<div class="row">
    <div class="col-12 grid-margin">
        <div class="d-flex justify-content-end flex-wrap">
            <div class="d-flex justify-content-between align-items-end flex-wrap">
                <a href="{{ route('categories.create') }}" class="btn btn-custom1 my-3 text-light font-weight-bold">
                    <span>{{__('index-dash.Add Category')}}</span>
                </a>
            </div>
        </div>
    </div>
</div>

@include('dashboard.pages.Category.indexmessages.messages')

<!-- Table with stripped rows -->
<div class="table-responsive">
<table class="table table-striped-custom w-100 mx-auto">
    <thead>
        <tr>
            <th scope="col">{{__('index-dash.#')}}</th>
            <th scope="col">{{__('index-dash.Title')}}</th>
            <th scope="col">{{__('index-dash.Description')}}</th>
            <th scope="col" style="white-space: nowrap;">{{__('index-dash.Created By')}}</th>
            <th scope="col" style="white-space: nowrap;">{{__('index-dash.Updated By')}}</th>
            <th scope="col" style="white-space: nowrap;">{{__('index-dash.Created At')}}</th>
            <th scope="col" style="white-space: nowrap;">{{__('index-dash.Updated At')}}</th>
            <th scope="col">{{__('index-dash.Action')}}</th>
        </tr>
    </thead>
    
    <tbody>
        @forelse ($categories as $category)
        <tr>
            <td class="font-weight-bold">{{ $loop->iteration }}</td>
            <td>{{ $category->title }}</td>
            <td>{{ Str::words($category->description, 3, '...') }}</td>
            <td>{{ $category->create_user->name ?? '...' }}</td>
            <td>{{ $category->update_user->name ?? 'N/A' }}</td>
            <td>{{ $category->created_at->format('Y-m-d H:i') }}</td>
            <td>{{ $category->updated_at ? $category->updated_at->format('Y-m-d H:i') : 'N/A' }}</td>
            <td>
                <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="d-flex justify-content-center align-items-center">
                    @csrf
                    @method('DELETE')
                    <a href="{{ route('categories.show', $category->id) }}" class="btn btn-warning btn-sm font-weight-bold fs-6 custom-btn-space">{{ __('index-dash.Show') }}</a>
                    @if(auth()->user()->user_type == 'admin')
                        <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-success btn-sm font-weight-bold fs-6 custom-btn-space">{{ __('index-dash.Edit') }}</a>
                        <button type="submit" class="btn btn-danger btn-sm font-weight-bold fs-6 custom-btn-space">{{ __('index-dash.Delete') }}</button>
                    @endif
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="8" class="text-center">
                <div class="alert alert-danger-custom my-5 w-50 mx-auto">
                    <span>There are no categories yet! <a href="{{ route('categories.create') }}" class="fw-bold text-danger">Add Categories From Here</a></span>
                </div>
            </td>
        </tr>
        @endforelse
    </tbody>
</table>
</div>
<!-- End Table with stripped rows -->

<!-- Pagination -->
<div class="my-4 pagination-custom d-flex justify-content-center">
    {{ $categories->links() }}
</div>

@endsection
