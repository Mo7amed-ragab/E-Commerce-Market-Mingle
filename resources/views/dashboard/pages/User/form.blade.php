{{-- Username --}}
<div class="row mb-3">
    <label for="username" class="form-label text-white">
        Username<span class="text-danger">*</span>
    </label>
    <div class="col-sm-10"> 
        <input type="text" name="name" id="username" 
               placeholder="Enter your name: " 
               class="form-control @error('name') is-invalid @enderror" 
               required
               value="{{ old('name', $user->name) }}">
        @error('title')
            <span class="invalid-feedback" role="alert">
                <strong class="text-danger">{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
{{-- Email --}}
<div class="row mb-3">
    <label for="email" class="form-label text-white">
        Email<span class="text-danger">*</span>
    </label>
    <div class="col-sm-10">
        <input type="email" name="email" id="email" 
               placeholder="Enter your email: " 
               class="form-control @error('email') is-invalid @enderror"
               required
               value="{{ old('email', $user->email) }}">
            @error('email')
               <span class="invalid-feedback" role="alert">
                   <strong class="text-danger">{{ $message }}</strong>
               </span>
           @enderror
    </div>
</div>
{{-- User Type --}}
<div class="row mb-3">
    <label for="user_type" class="form-label text-white">
        User Type<span class="text-danger">*</span>
    </label>
    <div class="col-sm-10"> 
        <select name="user_type" id="user_type" class="form-control">
            <option selected>Please select a user type</option>
            <option value="customer" {{ $user->user_type === "customer" ? "selected": "" }}>Customer</option>
            <option value="moderator" {{ $user->user_type === "moderator" ? "selected": "" }}>Moderator</option>
            <option value="admin" {{ $user->user_type === "admin" ? "selected": "" }}>Admin</option>
        </select>
    </div>
</div>
