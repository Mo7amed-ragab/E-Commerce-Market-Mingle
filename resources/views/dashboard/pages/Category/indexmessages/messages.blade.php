{{-- session to handle messages --}}

@if(session()->has('Created_Category_Sucessfully'))
<div class="alert alert-success text-center mx-auto shadow-lg" style="max-width: 80%; margin-top: 3%; border-radius: 15px; padding: 20px; background-color: #28a745; color: white; position: relative; overflow: hidden; box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);">
    <h4 class="font-weight-bold">
        <i class="fas fa-check-circle" style="display: inline-block;"></i>
        <span style="display: inline-block;">
            {{ session()->get('Created_Category_Sucessfully') }}
        </span>
    </h4>
</div>

@elseif(session()->has('Updated_Category_Sucessfully'))
<div class="alert alert-success text-center mx-auto shadow-lg" style="max-width: 80%; margin-top: 3%; border-radius: 15px; padding: 20px; background-color: #28a745; color: white; position: relative; overflow: hidden; box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);">
    <h4 class="font-weight-bold">
        <i class="fas fa-check-circle" style="display: inline-block;"></i>
        <span style="display: inline-block;">
            {{ session()->get('Updated_Category_Sucessfully') }}
        </span>
    </h4>
</div>

@elseif(session()->has('error'))
<div class="alert alert-danger text-center mx-auto shadow-lg" style="max-width: 80%; margin-top: 3%; border-radius: 15px; padding: 20px; background-color: #dc3545; color: white; position: relative; overflow: hidden; box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);">
    <h4 class="font-weight-bold">
        <i class="fas fa-exclamation-circle" style="display: inline-block;"></i>
        <span style="display: inline-block;">
            {{ session()->get('error') }}
        </span>
    </h4>
</div>

@elseif(session()->has('status'))
<div class="alert alert-warning text-center mx-auto shadow-lg" style="max-width: 80%; margin-top: 3%; border-radius: 15px; padding: 20px; background-color: #ffc107; color: black; position: relative; overflow: hidden; box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);">
    <h4 class="font-weight-bold">
        <i class="fas fa-exclamation-triangle" style="display: inline-block;"></i>
        <span style="display: inline-block;">
            {{ session()->get('status') }}
        </span>
    </h4>
</div>

@elseif(session()->has('Restored'))
<div class="alert alert-success text-center mx-auto shadow-lg" style="max-width: 80%; margin-top: 3%; border-radius: 15px; padding: 20px; background-color: #0067A9; color: white; position: relative; overflow: hidden; box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);">
    <h4 class="font-weight-bold">
        <i class="fas fa-check-circle" style="display: inline-block;"></i>
        <span style="display: inline-block;">
            {{ session()->get('Restored') }}
        </span>
    </h4>
</div>
@elseif(session()->has('Deleted'))
<div class="alert alert-danger text-center mx-auto shadow-lg" style="max-width: 80%; margin-top: 3%; border-radius: 15px; padding: 20px; background-color: #dc3545; color: white; position: relative; overflow: hidden; box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);">
    <h4 class="font-weight-bold">
        <i class="fas fa-exclamation-circle" style="display: inline-block;"></i>
        <span style="display: inline-block;">
            {{ session()->get('Deleted') }}
        </span>
    </h4>
</div>

@elseif(session()->has('Created_Sub_Category_Sucessfully'))
<div class="alert alert-success text-center mx-auto shadow-lg" style="max-width: 80%; margin-top: 3%; border-radius: 15px; padding: 20px; background-color: #28a745; color: white; position: relative; overflow: hidden; box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);">
    <h4 class="font-weight-bold">
        <i class="fas fa-check-circle" style="display: inline-block;"></i>
        <span style="display: inline-block;">
            {{ session()->get('Created_Sub_Category_Sucessfully') }}
        </span>
    </h4>
</div>


@elseif(session()->has('Updated_Sub_Category_Sucessfully'))
<div class="alert alert-success text-center mx-auto shadow-lg" style="max-width: 80%; margin-top: 3%; border-radius: 15px; padding: 20px; background-color: #28a745; color: white; position: relative; overflow: hidden; box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);">
    <h4 class="font-weight-bold">
        <i class="fas fa-check-circle" style="display: inline-block;"></i>
        <span style="display: inline-block;">
            {{ session()->get('Updated_Sub_Category_Sucessfully') }}
        </span>
    </h4>
</div>

@elseif(session()->has('Restored Sub_Category'))
<div class="alert alert-success text-center mx-auto shadow-lg" style="max-width: 80%; margin-top: 3%; border-radius: 15px; padding: 20px; background-color: #0067A9; color: white; position: relative; overflow: hidden; box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);">
    <h4 class="font-weight-bold">
        <i class="fas fa-check-circle" style="display: inline-block;"></i>
        <span style="display: inline-block;">
            {{ session()->get('Restored Sub_Category') }}
        </span>
    </h4>
</div>

@elseif(session()->has('Restored Product'))
<div class="alert alert-success text-center mx-auto shadow-lg" style="max-width: 80%; margin-top: 3%; border-radius: 15px; padding: 20px; background-color: #0067A9; color: white; position: relative; overflow: hidden; box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);">
    <h4 class="font-weight-bold">
        <i class="fas fa-check-circle" style="display: inline-block;"></i>
        <span style="display: inline-block;">
            {{ session()->get('Restored Product') }}
        </span>
    </h4>
</div>
@elseif(session()->has('Deleted Product'))
<div class="alert alert-danger text-center mx-auto shadow-lg" style="max-width: 80%; margin-top: 3%; border-radius: 15px; padding: 20px; background-color: #dc3545; color: white; position: relative; overflow: hidden; box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);">
    <h4 class="font-weight-bold">
        <i class="fas fa-exclamation-circle" style="display: inline-block;"></i>
        <span style="display: inline-block;">
            {{ session()->get('Deleted Product') }}
        </span>
    </h4>
</div>r


@elseif(session()->has('Deleted Sub_Category'))
<div class="alert alert-danger text-center mx-auto shadow-lg" style="max-width: 80%; margin-top: 3%; border-radius: 15px; padding: 20px; background-color: #dc3545; color: white; position: relative; overflow: hidden; box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);">
    <h4 class="font-weight-bold">
        <i class="fas fa-exclamation-circle" style="display: inline-block;"></i>
        <span style="display: inline-block;">
            {{ session()->get('Deleted Sub_Category') }}
        </span>
    </h4>
</div>

@elseif(session()->has('Created_Product_Sucessfully'))
<div class="alert alert-success text-center mx-auto shadow-lg" style="max-width: 80%; margin-top: 3%; border-radius: 15px; padding: 20px; background-color: #28a745; color: white; position: relative; overflow: hidden; box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);">
    <h4 class="font-weight-bold">
        <i class="fas fa-check-circle" style="display: inline-block;"></i>
        <span style="display: inline-block;">
            {{ session()->get('Created_Product_Sucessfully') }}
        </span>
    </h4>
</div>

@elseif(session()->has('Updated_Product_Sucessfully'))
<div class="alert alert-success text-center mx-auto shadow-lg" style="max-width: 80%; margin-top: 3%; border-radius: 15px; padding: 20px; background-color: #28a745; color: white; position: relative; overflow: hidden; box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);">
    <h4 class="font-weight-bold">
        <i class="fas fa-check-circle" style="display: inline-block;"></i>
        <span style="display: inline-block;">
            {{ session()->get('Updated_Product_Sucessfully') }}
        </span>
    </h4>
</div>


@endif