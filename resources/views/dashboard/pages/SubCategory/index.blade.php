@extends('dashboard.layouts.master')
@section('title', __('index-dash.SubCategory Index Page'))
@section('main-content')

<div class="row">
    <div class="col-12 grid-margin">
        <div class="d-flex justify-content-end flex-wrap">
            <div class="d-flex justify-content-between align-items-end flex-wrap">
                <h4>Sub Categories ({{ $subcategories_count }})</h4>
                <a href="{{ route('subcategories.create') }}" class="btn btn-custom1 my-3 text-light font-weight-bold">
                    <span>{{ __('index-dash.Add SubCategory') }}</span>
                </a>
            </div>
        </div>
    </div>
</div>

@include('dashboard.pages.Category.indexmessages.messages')

<!-- Responsive Table -->
<div class="table-responsive">
    <table class="table table-striped-custom">
        <thead>
            <tr>
                <th scope="col">{{__('index-dash.#')}}</th>
                <th scope="col">ID</th>
                <th scope="col" class="text-truncate">{{__('index-dash.Title')}}</th>
                <th scope="col">{{__('index-dash.Description')}}</th>
                <th scope="col">{{__('index-dash.Category')}}</th>
                <th scope="col">{{__('index-dash.Created By')}}</th>
                <th scope="col">{{__('index-dash.Updated By')}}</th>
                <th scope="col">{{__('index-dash.Created At')}}</th>
                <th scope="col">{{__('index-dash.Updated At')}}</th>
                <th scope="col">{{__('index-dash.Action')}}</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($subcategories as $subcategory)
            <tr>
                <td class="font-weight-bold">{{$loop->iteration}}</td>
                <td class="font-weight-bold">{{$subcategory->id}}</td>
                <td class="text-truncate" style="max-width: 200px;">{{$subcategory->title}}</td>
                <td>{{ $subcategory->description == null ? 'N/A' : Str::words($subcategory->description, 3, '...') }}</td>
                <td>{{$subcategory->category->title ?? '-'}}</td>
                <td>{{$subcategory->create_user->name ?? '-'}}</td>
                <td>{{$subcategory->update_user->name ?? '-'}}</td>
                <td>{{$subcategory->created_at}}</td>
                <td>{{$subcategory->updated_at ?? 'N/A'}}</td>
                <td>
                    <form action="{{ route('subcategories.destroy', $subcategory->id) }}" method="POST" class="d-flex justify-content-between align-items-center">
                        @csrf
                        @method('DELETE')
                        <a href="{{ route('subcategories.show', $subcategory->id) }}" class="btn btn-warning btn-sm font-weight-bold fs-6 custom-btn-space">{{ __('index-dash.Show') }}</a>
                        @if(auth()->user()->user_type == 'admin')
                            <a href="{{ route('subcategories.edit', $subcategory->id) }}" class="btn btn-success btn-sm font-weight-bold fs-6 custom-btn-space">{{ __('index-dash.Edit') }}</a>
                            <button type="submit" class="btn btn-danger btn-sm font-weight-bold fs-6 custom-btn-space">{{ __('index-dash.Delete') }}</button>
                        @endif
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="9" class="text-center">
                    <div class="alert alert-danger-custom my-5 w-75 mx-auto">
                        <span>There are no subcategories yet! <a href="{{ route('subcategories.create') }}" class="fw-bold text-danger">Add SubCategories From Here</a></span>
                    </div>
                </td>
            </tr>
            @endforelse

        </tbody>
    </table>
</div>
<!-- End Responsive Table -->

<!-- Pagination -->
<div class="my-4 pagination-custom d-flex justify-content-center">
    {{ $subcategories->links() }}
</div>

@endsection
