@extends('dashboard.layouts.master')
@section('title', __('index-dash.Products Page'))
@section('main-content')


<div class="row">
    <div class="col-12 grid-margin">
        <div class="d-flex justify-content-end flex-wrap">
            <div class="d-flex justify-content-between align-items-end flex-wrap">
                <a href="{{ route('products.create') }}" class="btn btn-custom1 my-3 text-light font-weight-bold">
                    <span>{{__('index-dash.Add Product')}}</span>
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
            <th scope="col">{{__('index-dash.Image')}}</th>
            <th scope="col">{{__('index-dash.Description')}}</th>
            <th scope="col">{{__('index-dash.Price')}}</th>
            <th scope="col">{{__('index-dash.Available Quantity')}}</th>
            <th scope="col">{{__('index-dash.Subcategory')}}</th>
            <th scope="col" style="white-space: nowrap;">{{__('index-dash.Created By')}}</th>
            <th scope="col" style="white-space: nowrap;">{{__('index-dash.Updated By')}}</th>
            <th scope="col" style="white-space: nowrap;">{{__('index-dash.Created At')}}</th>
            <th scope="col" style="white-space: nowrap;">{{__('index-dash.Updated At')}}</th>
            <th scope="col">{{__('index-dash.Action')}}</th>
        </tr>
    </thead>

    <tbody>
        @forelse ($products as $product)
        <tr>
            <td class="font-weight-bold">{{ $loop->iteration }}</td>
            <td>{{ $product->title }}</td>
            <td>
                @if($product->image)
                <img src="{{ asset('assets/images/' . $product->image)}}" alt="Product Image" class="img-fluid" style="max-width: 100px; max-height: 100px;">
                @else
                    <span>No Image</span>
                @endif
                <br>
            </td>
            <td>{{ Str::words($product->description, 3, '...') }}</td>
            <td>${{ number_format($product->price, 2) }}</td>
            <td>{{ $product->available_quantity }}</td>
            <td>{{ $product->subCategory->title ?? '-'}}</td>
            <td>{{ $product->create_user->name ?? '...' }}</td>
            <td>{{ $product->update_user->name ?? 'N/A' }}</td>
            <td>{{ $product->created_at->format('Y-m-d H:i') }}</td>
            <td>{{ $product->updated_at ? $product->updated_at->format('Y-m-d H:i') : 'N/A' }}</td>
            <td>
                <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-flex justify-content-between align-items-center">
                    @csrf
                    @method('DELETE')
                    <a href="{{ route('products.show', $product->id) }}" class="btn btn-warning btn-sm font-weight-bold fs-6 custom-btn-space">{{ __('index-dash.Show') }}</a>
                    @if(auth()->user()->user_type == 'admin')
                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-success btn-sm font-weight-bold fs-6 custom-btn-space">{{ __('index-dash.Edit') }}</a>
                        <button type="submit" class="btn btn-danger btn-sm font-weight-bold fs-6 custom-btn-space">{{ __('index-dash.Delete') }}</button>
                    @endif
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="12" class="text-center">
                <div class="alert alert-danger-custom my-5 w-50 mx-auto">
                    <span>There are no products yet! <a href="{{ route('products.create') }}" class="fw-bold text-danger">Add Products From Here</a></span>
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
        {{ $products->links() }}
    </div>

@endsection
