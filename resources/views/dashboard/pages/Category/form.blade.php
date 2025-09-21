{{-- Title --}}
<div class="form-group mb-3">
    <label for="title" class="form-label text-white">
        {{ __('form-dash.Title') }} <span class="text-danger">*</span>
    </label>
    <input type="text" name="title" id="title" 
           value="{{ old('title', $category->title ?? '') }}" 
           class="form-control @error('title') is-invalid @enderror" 
           placeholder="{{ __('form-dash.Enter Title') }}" 
           required>
    @error('title')
        <span class="invalid-feedback" role="alert">
            <strong class="text-danger">{{ $message }}</strong>
        </span>
    @enderror
</div>

{{-- Description --}}
<div class="form-group mb-3">
    <label for="description" class="form-label text-white">
        {{ __('form-dash.Description') }}
    </label>
    <textarea name="description" id="description" 
              class="form-control @error('description') is-invalid @enderror" 
              rows="4" 
              placeholder="{{ __('form-dash.Enter Description') }}">{{ old('description', $category->description ?? '') }}</textarea>
    @error('description')
        <span class="invalid-feedback" role="alert">
            <strong class="text-danger">{{ $message }}</strong>
        </span>
    @enderror
</div>
