@extends('dashboard.layouts.master')
@section('title' ,__('index-dash.Deleted sub_categories'))
@section('main-content')

@include('dashboard.pages.Category.indexmessages.messages')

<!-- Table with stripped rows -->
<div class="table-responsive">
    <table class="table table-striped w-100 m-auto">
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
                <th scope="col">{{__('index-dash.Deleted At')}}</th>
                @if(auth()->user()->user_type == "admin")
                <th class="col">{{ __('index-dash.Action') }}</th>
                @endif
            </tr>
        </thead>

        <tbody>
            @forelse ($subcategories as $subcategory)
            <tr>
                <td class="font-weight-bold">{{$loop->iteration}}</td>
                <td class="font-weight-bold">{{$subcategory->id}}</td>
                <td>{{$subcategory->title}}</td>
                <td>{{Str::words($subcategory->description, '3', '...') ?? 'N/A'}}</td>
                <td>{{ $subcategory->category->title ?? 'N/A'}}</td>
                <td>{{ $subcategory->create_user->name ?? 'N/A' }}</td>
                <td>{{ $subcategory->update_user->name ?? 'N/A' }}</td>
                <td>{{ $subcategory->created_at->format('Y-m-d H:i') }}</td>
                <td>{{ $subcategory->updated_at ? $subcategory->updated_at->format('Y-m-d H:i') : 'N/A' }}</td>
                <td>{{ $subcategory->deleted_at ? $subcategory->deleted_at->format('Y-m-d H:i') : 'N/A' }}</td>
                @if(auth()->user()->user_type == "admin")
                <td class="text-center">
                    <div class="d-flex justify-content-between">
                        <form action="{{ route('subcategories.restore', $subcategory->id) }}" method="GET">
                            <button type="submit" class="btn btn-sm btn-success font-weight-bold fs-6 mx-1">{{__('index-dash.Restore')}}</button>
                        </form>

                        <form action="{{ route('subcategories.forceDelete', $subcategory->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger font-weight-bold fs-6 mx-1">{{__('index-dash.permanentDelete')}}</button>
                        </form>
                    </div>
                </td>
                @endif
            </tr>
            @empty
            <tr>
                <td colspan="{{ auth()->user()->user_type == 'admin' ? 9 : 8 }}" class="text-center">
                    <div class="alert alert-danger my-5 w-50 mx-auto">
                        <span>There are no trashed categories yet!</span>
                    </div>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="d-flex justify-content-center my-4">
    <div class="me-6">
        {{ $subcategories->links() }}
    </div>
</div>

<!-- End Table with stripped rows -->
@endsection
