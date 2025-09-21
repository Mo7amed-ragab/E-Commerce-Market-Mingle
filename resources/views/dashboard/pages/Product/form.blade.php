{{-- Title --}}
<div class="form-group mb-3">
    <label for="title" class="form-label text-white">{{ __('form-dash.Title') }} <span class="text-danger">*</span></label>
    <input type="text" name="title" id="title"
           value="{{ old('title', $product->title) }}"
           placeholder="{{ __('form-dash.Enter Title') }}"
           class="form-control @error('title') is-invalid @enderror">
    @error('title')
        <span class="invalid-feedback" role="alert">
            <strong class="text-danger">{{ $message }}</strong>
        </span>
    @enderror
</div>


{{-- Image --}}
<div class="form-group mb-3">
    <label for="image" class="form-label text-white">{{ __('form-dash.Product Image') }}</label>
    <input type="file" name="image" id="image"
           class="form-control @error('image') is-invalid @enderror">
    @if(isset($product) && $product->image)
        <div class="mt-2">
            <img src="{{ Storage::url($product->image) }}" alt="Product Image" class="img-fluid" style="width: 100%; height: auto;">
        </div>
    @endif
    @error('image')
        <span class="invalid-feedback" role="alert">
            <strong class="text-danger">{{ $message }}</strong>
        </span>
    @enderror
</div>

{{-- Description (textarea) --}}
<div class="form-group mb-3">
    <label for="description" class="form-label text-white">{{ __('form-dash.Description') }}</label>
    <textarea name="description" id="description"
              rows="4"
              placeholder="{{ __('form-dash.Enter Description') }}"
              class="form-control @error('description') is-invalid @enderror">{{ old('description', $product->description) }}</textarea>
    @error('description')
        <span class="invalid-feedback" role="alert">
            <strong class="text-danger">{{ $message }}</strong>
        </span>
    @enderror
</div>

{{-- Price --}}
<div class="form-group mb-3">
    <label for="price" class="form-label text-white"> {{ __('form-dash.Price') }} <span class="text-danger">*</span></label>
    <input type="number" step="0.01" name="price" id="price"
           value="{{ old('price', $product->price) }}"
           placeholder="{{ __('form-dash.Enter Price') }}"
           class="form-control @error('price') is-invalid @enderror">
    @error('price')
        <span class="invalid-feedback" role="alert">
            <strong class="text-danger">{{ $message }}</strong>
        </span>
    @enderror
</div>

{{-- Available Quantity --}}
<div class="form-group mb-3">
    <label for="available_quantity" class="form-label text-white">{{ __('form-dash.Available Quantity') }} <span class="text-danger">*</span></label>
    <input type="number" name="available_quantity" id="available_quantity"
           value="{{ old('available_quantity', $product->available_quantity) }}"
           placeholder="{{ __('form-dash.Enter Available Quantity') }}"
           class="form-control @error('available_quantity') is-invalid @enderror">
    @error('available_quantity')
        <span class="invalid-feedback" role="alert">
            <strong class="text-danger">{{ $message }}</strong>
        </span>
    @enderror
</div>

{{-- Subcategory --}}
<div class="form-group mb-3">
    <label for="sub_category_id" class="form-label text-white">{{ __('form-dash.Subcategory') }} <span class="text-danger">*</span></label>
    <select name="sub_category_id" id="sub_category_id" class="form-control @error('sub_category_id') is-invalid @enderror">
        <option value="" disabled selected>{{ __('form-dash.--- Select a Subcategory ---') }}</option>

        @forelse ($subcategories as $subcategory)
            <option value="{{ $subcategory->id }}" {{ $subcategory->id == $product->sub_category_id ? 'selected' : '' }}>
                {{ $subcategory->title }}
            </option>
        @empty
            <option value="" disabled>{{ __('form-dash.--- No subcategories available ---') }}</option>
        @endforelse
    </select>

    @error('sub_category_id')
        <span class="invalid-feedback" role="alert">
            <strong class="text-danger">{{ $message }}</strong>
        </span>
    @enderror
</div>
