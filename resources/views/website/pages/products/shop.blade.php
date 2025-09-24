@extends('website.layouts.master')
@section('title', __('shop.title'))
@section('main-content')

    <div class="site-wrap">
        <div class="bg-light py-3">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 mb-0"><a href="{{ route('home') }}">{{ __('shop.Home') }}</a> <span
                            class="mx-2 mb-0">/</span> <strong class="text-black">{{ __('shop.Shop') }}</strong></div>
                </div>
            </div>
        </div>

        <div class="site-section">
            <div class="container">

                <div class="row mb-5">
                    <div class="col-md-9 order-2">
                        <div class="row">
                            <div class="col-md-12 mb-5">
                                <div class="float-md-left mb-4">
                                    <h2 class="text-black h5">{{ __('shop.shop_all') }}</h2>
                                </div>
                                <div class="d-flex">
                                    <div class="dropdown mr-1 ml-md-auto">
                                        <button type="button" class="btn btn-secondary btn-sm dropdown-toggle"
                                            id="dropdownMenuOffset" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            {{ __('shop.latest') }}
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuOffset">
                                            <a class="dropdown-item" href="#">{{ __('shop.men') }}</a>
                                            <a class="dropdown-item" href="#">{{ __('shop.women') }}</a>
                                            <a class="dropdown-item" href="#">{{ __('shop.children') }}</a>
                                        </div>
                                    </div>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-secondary btn-sm dropdown-toggle"
                                            id="dropdownMenuReference" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            {{ __('shop.reference') }}
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuReference">
                                            <a class="dropdown-item" href="#">{{ __('shop.relevance') }}</a>
                                            <a class="dropdown-item" href="#">{{ __('shop.name_a_to_z') }}</a>
                                            <a class="dropdown-item" href="#">{{ __('shop.name_z_to_a') }}</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">{{ __('shop.price_low_to_high') }}</a>
                                            <a class="dropdown-item" href="#">{{ __('shop.price_high_to_low') }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-5">

                            @forelse ($products as $product)
                                <div class="col-sm-6 col-lg-4 mb-4 pb-2" data-aos="fade-up">
                                    <div class="block-4 text-center border">
                                        <figure class="block-4-image" style="height: 100%;">
                                            <a href="{{ route('shop-single', $product->id) }}"><img
                                                    src="{{ asset('assets/images/' . $product->image) }}"
                                                    alt="Image placeholder" class="img-fluid"></a>
                                        </figure>
                                        <div class="block-4-text p-4">
                                            <h3
                                                style="height: 50px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                                <a href="{{ route('shop-single', $product->id) }}">{{ $product->title }}</a>
                                            </h3>
                                            <p class="mb-0">{{ $product->subCategory->title }}</p>
                                            <p class="text-primary font-weight-bold">{{ $product->price }} EGP</p>
                                            <form class="add-to-cart-form-shop" action="{{ route('cart.add') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                <input type="hidden" name="quantity" value="1">
                                                <button type="submit"
                                                    class="buy-now btn btn-sm btn-primary">{{__('singleShop.add_to_cart')}}</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                There are no products yet.
                            @endforelse

                        </div>
                        <div class="row" data-aos="fade-up">
                            <div class="col-md-12 text-center">
                                <div class="site-block-27">
                                    {{ $products->links() }}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 order-1 mb-5 mb-md-0">
                        <div class="border p-4 rounded mb-4">
                            <h3 class="mb-3 h6 text-uppercase text-black d-block">{{ __('shop.categories') }}</h3>
                            <ul class="list-unstyled mb-0">
                                @foreach ($subCategories as $subCategory)
                                    <li class="mb-1"><a href="{{ route('shop', ['sub_category_id' => $subCategory->id]) }}"
                                            class="d-flex"><span>{{ $subCategory->title }}</span>
                                            <span class="text-black ml-auto">({{ $subCategory->products_count }})</span></a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="border p-4 rounded mb-4">
                            <div class="mb-4">
                                <h3 class="mb-3 h6 text-uppercase text-black d-block">{{ __('shop.filter_by_price') }}</h3>
                                <div id="slider-range" class="border-primary"></div>
                                <input type="text" name="text" id="amount" class="form-control border-0 pl-0 bg-white"
                                    disabled="" />
                            </div>

                            <form action="{{ route('shop') }}" method="GET">
                                <input type="hidden" name="min_price" id="min_price_input">
                                <input type="hidden" name="max_price" id="max_price_input">

                                {{-- Existing filters will be added here --}}

                                <div class="mb-4">
                                    <h3 class="mb-3 h6 text-uppercase text-black d-block">{{ __('shop.size') }}</h3>
                                    <label for="s_sm" class="d-flex">
                                        <input type="checkbox" id="s_sm" name="size[]" value="Small" class="mr-2 mt-1"
                                            @checked(in_array('Small', request('size', [])))> <span
                                            class="text-black">{{ __('shop.small_size') }}</span>
                                    </label>
                                    <label for="s_md" class="d-flex">
                                        <input type="checkbox" id="s_md" name="size[]" value="Medium" class="mr-2 mt-1"
                                            @checked(in_array('Medium', request('size', [])))> <span
                                            class="text-black">{{ __('shop.medium_size') }}</span>
                                    </label>
                                    <label for="s_lg" class="d-flex">
                                        <input type="checkbox" id="s_lg" name="size[]" value="Large" class="mr-2 mt-1"
                                            @checked(in_array('Large', request('size', [])))> <span
                                            class="text-black">{{ __('shop.large_size') }}</span>
                                    </label>
                                    <label for="s_xl" class="d-flex">
                                        <input type="checkbox" id="s_xl" name="size[]" value="X-Large" class="mr-2 mt-1"
                                            @checked(in_array('X-Large', request('size', [])))> <span
                                            class="text-black">{{ __('shop.X-Large') ?? 'X-Large' }}</span>
                                    </label>
                                </div>

                                <div class="mb-4">
                                    <h3 class="mb-3 h6 text-uppercase text-black d-block">{{ __('shop.color') }}</h3>
                                    @php
                                        $selectedColors = request('color', []);
                                    @endphp
                                    <a href="{{ route('shop', array_merge(request()->query(), ['color' => ['Red']])) }}"
                                        class="d-flex color-item align-items-center @if(in_array('Red', $selectedColors)) active @endif">
                                        <span class="bg-danger color d-inline-block rounded-circle mr-2"></span> <span
                                            class="text-black">{{ __('shop.red_color') }}</span>
                                    </a>
                                    <a href="{{ route('shop', array_merge(request()->query(), ['color' => ['Green']])) }}"
                                        class="d-flex color-item align-items-center @if(in_array('Green', $selectedColors)) active @endif">
                                        <span class="bg-success color d-inline-block rounded-circle mr-2"></span> <span
                                            class="text-black">{{ __('shop.green_color') }}</span>
                                    </a>
                                    <a href="{{ route('shop', array_merge(request()->query(), ['color' => ['Blue']])) }}"
                                        class="d-flex color-item align-items-center @if(in_array('Blue', $selectedColors)) active @endif">
                                        <span class="bg-info color d-inline-block rounded-circle mr-2"></span> <span
                                            class="text-black">{{ __('shop.blue_color') }}</span>
                                    </a>
                                    <a href="{{ route('shop', array_merge(request()->query(), ['color' => ['White']])) }}"
                                        class="d-flex color-item align-items-center @if(in_array('White', $selectedColors)) active @endif">
                                        <span class="bg-white color d-inline-block rounded-circle mr-2"
                                            style="border: 1px solid #ccc;"></span> <span
                                            class="text-black">{{ __('White') ?? 'White' }}</span>
                                    </a>
                                    <a href="{{ route('shop', array_merge(request()->query(), ['color' => ['Black']])) }}"
                                        class="d-flex color-item align-items-center @if(in_array('Black', $selectedColors)) active @endif">
                                        <span class="bg-dark color d-inline-block rounded-circle mr-2"></span> <span
                                            class="text-black">{{ __('Black') ?? 'Black' }}</span>
                                    </a>
                                </div>

                                <div class="mb-4">
                                    <a href="{{ route('shop') }}" class="btn btn-secondary btn-sm btn-block">Reset
                                        Filters</a>
                                </div>
                                <div class="mb-4">
                                    <button type="submit"
                                        class="btn btn-primary btn-sm btn-block">{{ __('show filters') }}</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="site-section site-blocks-2">
                            <div class="row justify-content-center text-center mb-5">
                                <div class="col-md-7 site-section-heading pt-4">
                                    <h2>{{ __('shop.categories') }}</h2>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 col-md-6 col-lg-4 mb-4 mb-lg-0" data-aos="fade" data-aos-delay="">
                                    <a class="block-2-item" href="#">
                                        <figure class="image">
                                            <img src="{{ asset('assets/images/women.jpg') }}" alt="" class="img-fluid">
                                        </figure>
                                        <div class="text">
                                            <span class="text-uppercase">{{ __('shop.collections') }}</span>
                                            <h3>{{ __('shop.women') }}</h3>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-sm-6 col-md-6 col-lg-4 mb-5 mb-lg-0" data-aos="fade" data-aos-delay="100">
                                    <a class="block-2-item" href="#">
                                        <figure class="image">
                                            <img src="{{ asset('assets/images/children.jpg') }}" alt="" class="img-fluid">
                                        </figure>
                                        <div class="text">
                                            <span class="text-uppercase">{{ __('shop.collections') }}</span>
                                            <h3>{{ __('shop.children') }}</h3>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-sm-6 col-md-6 col-lg-4 mb-5 mb-lg-0" data-aos="fade" data-aos-delay="200">
                                    <a class="block-2-item" href="#">
                                        <figure class="image">
                                            <img src="{{ asset('assets/images/men.jpg') }}" alt="" class="img-fluid">
                                        </figure>
                                        <div class="text">
                                            <span class="text-uppercase">{{ __('shop.collections') }}</span>
                                            <h3>{{ __('shop.men') }}</h3>
                                        </div>
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            // Initialize Price Slider
            var slider = $("#slider-range");
            var amount = $("#amount");

            slider.slider({
                range: true,
                min: 0,
                max: 1000,
                values: [{{ request('min_price', 0) }}, {{ request('max_price', 1000) }}],
                slide: function (event, ui) {
                    amount.val("$" + ui.values[0] + " - $" + ui.values[1]);
                    $('#min_price_input').val(ui.values[0]);
                    $('#max_price_input').val(ui.values[1]);
                },
                stop: function (event, ui) {
                    // Submit the form when slider stops
                    $(this).closest('form').submit();
                }
            });

            amount.val("$" + slider.slider("values", 0) + " - $" + slider.slider("values", 1));

            // Add to cart functionality
            $('.add-to-cart-form-shop').on('submit', function (e) {
                e.preventDefault();

                var form = $(this);
                var url = form.attr('action');
                var formData = form.serialize();

                $.ajax({
                    type: "POST",
                    url: url,
                    data: formData,
                    success: function (response) {
                        toastr.success(response.message);
                        updateCartItemCount(); // Call the global function
                    },
                    error: function (response) {
                        toastr.error('Error adding product to cart!');
                        console.log(response);
                    }
                });
            });

        });
    </script>
@endpush