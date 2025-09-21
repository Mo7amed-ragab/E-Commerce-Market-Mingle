{{-- Title --}}
<div class="form-group mb-3">
    <label for="title" class="form-label text-white">{{ __('form-dash.Title') }} <span class="text-danger">*</span> </label>
    <input type="text" name="title" id="title"
           value="{{ old('title', $subCategory->title) }}"
           placeholder="{{ __('form-dash.Enter Title') }}"
           class="form-control @error('title') is-invalid @enderror">
    @error('title')
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
              class="form-control @error('description') is-invalid @enderror">{{ old('description', $subCategory->description) }}</textarea>
    @error('description')
        <span class="invalid-feedback" role="alert">
            <strong class="text-danger">{{ $message }}</strong>
        </span>
    @enderror
</div>

{{-- Category --}}
<div class="form-group mb-3">
    <label for="category_id" class="form-label text-white">{{ __('index-dash.Category') }} <span class="text-danger">*</span></label>
    <select name="category_id" id="category_id" class="form-control @error('category_id') is-invalid @enderror">
        <option disabled selected> ----------- {{ __('create-dash.Select a Category') }} -------- </option>
        @forelse ($categories as $category)
            <option value="{{ $category->id }}" {{ $category->id == $subCategory->category_id ? 'selected' : '' }}>
                {{ $category->title }}
            </option>
        @empty
            <option value="" disabled>-------- {{ __('create-dash.No categories') }}  ----------------</option>
        @endforelse
    </select>

    @error('category_id')
        <span class="invalid-feedback" role="alert">
            <strong class="text-danger">{{ $message }}</strong>
        </span>
    @enderror
</div>

