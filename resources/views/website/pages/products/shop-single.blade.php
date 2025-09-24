@extends('website.layouts.master')

@section('title', 'Shop-single Page')

@section('main-content')

  <div class="site-wrap">

    <div class="bg-light py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0"><a href="{{ route('home') }}">Home</a> <span class="mx-2 mb-0">/</span> <strong
              class="text-black">{{ $product->title }}</strong></div>
        </div>
      </div>
    </div>

    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <img src="{{asset('assets/images/' . $product->image)}}" alt="Image" class="img-fluid">
          </div>
          <div class="col-md-6">
            <h2 class="text-black">{{ $product->title }}</h2>
            <p>{{ $product->description }}</p>
            <p class="mb-4">{{__('singleShop.additional_info')}}</p>
            <p><strong class="text-primary h4">{{ $product->price }} EGP</strong></p>
            <div class="mb-3">
              <p><strong>{{__('Category')}} :</strong> {{ $product->subCategory->title }}</p>
              <p><strong>{{__('Available')}} :</strong> {{ $product->available_quantity }} Items</p>
            </div>
            <div class="mb-1 d-flex">
              <label for="option-sm" class="d-flex mr-3 mb-3">
                <span class="d-inline-block mr-2" position: relative;"><input type="radio" id="option-sm"
                    name="shop-sizes" value="Small" @if(strtolower($product->size) == 'small') checked @endif></span> <span
                  class="d-inline-block text-black">{{__('singleShop.small')}}</span>
              </label>
              <label for="option-md" class="d-flex mr-3 mb-3">
                <span class="d-inline-block mr-2" position: relative;"><input type="radio" id="option-md"
                    name="shop-sizes" value="Medium" @if(strtolower($product->size) == 'medium') checked @endif></span>
                <span class="d-inline-block text-black">{{__('singleShop.medium')}}</span>
              </label>
              <label for="option-lg" class="d-flex mr-3 mb-3">
                <span class="d-inline-block mr-2" position: relative;"><input type="radio" id="option-lg"
                    name="shop-sizes" value="Large" @if(strtolower($product->size) == 'large') checked @endif></span> <span
                  class="d-inline-block text-black">{{__('singleShop.large')}}</span>
              </label>
              <label for="option-xl" class="d-flex mr-3 mb-3">
                <span class="d-inline-block mr-2" position: relative;"><input type="radio" id="option-xl"
                    name="shop-sizes" value="X-Large" @if(strtolower($product->size) == 'x-large') checked @endif></span>
                <span class="d-inline-block text-black">{{__('singleShop.extra_large')}}</span>
              </label>
            </div>
            <div class="mb-5">
              <div class="input-group mb-3" style="max-width: 120px;">
                <div class="input-group-prepend">
                  <button class="btn btn-outline-primary js-btn-minus" type="button">&minus;</button>
                </div>
                <input type="text" class="form-control text-center" value="1" placeholder=""
                  aria-label="Example text with button addon" aria-describedby="button-addon1">
                <div class="input-group-append">
                  <button class="btn btn-outline-primary js-btn-plus" type="button">&plus;</button>
                </div>
              </div>

            </div>
            <p>
            <form id="add-to-cart-form" action="{{ route('cart.add') }}" method="POST">
              @csrf
              <input type="hidden" name="product_id" value="{{ $product->id }}">
              <input type="hidden" name="quantity" value="1" id="product-quantity">
              <button type="submit" class="buy-now btn btn-sm btn-primary">{{__('singleShop.add_to_cart')}}</button>
            </form>
            </p>

          </div>
        </div>
      </div>
    </div>

    <div class="site-section block-3 site-blocks-2 bg-light">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-7 site-section-heading text-center pt-4">
            <h2>{{__('singleShop.featured_products')}}</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="nonloop-block-3 owl-carousel">
              <div class="item">
                <div class="block-4 text-center">
                  <figure class="block-4-image">
                    <img src="{{asset('assets/images/cloth_1.jpg')}}" alt="Image placeholder" class="img-fluid">
                  </figure>
                  <div class="block-4-text p-4">
                    <h3><a href="#">{{__('singleShop.product_1_title')}}</a></h3>
                    <p class="mb-0">{{__('singleShop.product_1_description')}}</p>
                    <p class="text-primary font-weight-bold">{{__('singleShop.product_1_price')}}</p>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="block-4 text-center">
                  <figure class="block-4-image">
                    <img src="{{asset('assets/images/shoe_1.jpg')}}" alt="Image placeholder" class="img-fluid">
                  </figure>
                  <div class="block-4-text p-4">
                    <h3><a href="#">{{__('singleShop.product_2_title')}}</a></h3>
                    <p class="mb-0">{{__('singleShop.product_2_description')}}</p>
                    <p class="text-primary font-weight-bold">{{__('singleShop.product_2_price')}}</p>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="block-4 text-center">
                  <figure class="block-4-image">
                    <img src="{{asset('assets/images/cloth_2.jpg')}}" alt="Image placeholder" class="img-fluid">
                  </figure>
                  <div class="block-4-text p-4">
                    <h3><a href="#">{{__('singleShop.product_3_title')}}</a></h3>
                    <p class="mb-0">{{__('singleShop.product_3_description')}}</p>
                    <p class="text-primary font-weight-bold">{{__('singleShop.product_3_price')}}</p>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="block-4 text-center">
                  <figure class="block-4-image">
                    <img src="{{asset('assets/images/cloth_3.jpg')}}" alt="Image placeholder" class="img-fluid">
                  </figure>
                  <div class="block-4-text p-4">
                    <h3><a href="#">{{__('singleShop.product_4_title')}}</a></h3>
                    <p class="mb-0">{{__('singleShop.product_4_description')}}</p>
                    <p class="text-primary font-weight-bold">{{__('singleShop.product_4_price')}}</p>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="block-4 text-center">
                  <figure class="block-4-image">
                    <img src="{{asset('assets/images/shoe_1.jpg')}}" alt="Image placeholder" class="img-fluid">
                  </figure>
                  <div class="block-4-text p-4">
                    <h3><a href="#">{{__('singleShop.product_1_title')}}</a></h3>
                    <p class="mb-0">{{__('singleShop.product_1_description')}}</p>
                    <p class="text-primary font-weight-bold">{{__('singleShop.product_1_price')}}</p>
                  </div>
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
      // Update quantity input when plus/minus buttons are clicked
      $('.js-btn-minus').on('click', function () {
        var quantityInput = $(this).closest('.input-group').find('input[type="text"]');
        var currentVal = parseInt(quantityInput.val());
        if (!isNaN(currentVal) && currentVal > 1) {
          quantityInput.val(currentVal - 1);
          $('#product-quantity').val(currentVal - 1);
        }
      });

      $('.js-btn-plus').on('click', function () {
        var quantityInput = $(this).closest('.input-group').find('input[type="text"]');
        var currentVal = parseInt(quantityInput.val());
        if (!isNaN(currentVal)) {
          quantityInput.val(currentVal + 1);
          $('#product-quantity').val(currentVal + 1);
        }
      });

      // Handle Add to Cart form submission
      $('#add-to-cart-form').on('submit', function (e) {
        e.preventDefault(); // Prevent default form submission

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

      // Function to update cart item count in the navbar (moved to master.blade.php)
    });
  </script>
@endpush