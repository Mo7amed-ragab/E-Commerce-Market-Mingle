<aside id="sidebar" class="sidebar">

  <ul class="sidebar-nav" id="sidebar-nav">
    <!-- Start Dashboard Nav -->
    <li class="nav-item">
    <a class="nav-link " href="{{route('dashboard')}}">
        <i class="bi bi-grid"></i>
        <span>{{ __('side-bar-dash.Dashboard') }}</span>
      </a>
    </li>
    <!-- End Dashboard Nav -->
    <!-- Start website Nav -->
    <li class="nav-item">
    <a class="nav-link " href="{{route('home')}}">
        <i class="fa-solid fa-globe"></i>
        <span>{{ __('side-bar-dash.Website') }}</span>
      </a>
    </li>
    <!-- End website Nav -->
    {{--Users--}}
    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#users-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-menu-button-wide"></i><span>{{ __('side-bar-dash.Users') }}</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="users-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href={{ route("users.admins") }}>
              <i class="fa-solid fa-user-tie fs-5"></i><span>{{ __('side-bar-dash.Admin') }}</span>
          </a>
        </li>
        <li>
          <a href={{ route("users.moderators") }}>
              <i class="fa-solid fa-m fs-5"></i><span>{{ __('side-bar-dash.Moderator') }}</span>
          </a>
        </li>
        <li>
          <a href={{ route("users.customers") }}>
              <i class="fa-brands fa-cuttlefish fs-5"></i><span>{{ __('side-bar-dash.Customer') }}</span>
          </a>
        </li>
        <li>
          <a href={{ route("users.index") }}>
              <i class="fa-sharp fa-solid fa-i fs-5"></i><span>{{ __('side-bar-dash.Index') }}</span>
          </a>
        </li>
        <li>
          <a href={{ route("users.create") }}>
              <i class="fa-solid fa-plus fs-5"></i><span>{{ __('side-bar-dash.Create') }}</span>
          </a>
        </li>
      </ul>
    </li>

    {{--Categories--}}
    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#Catogary-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-menu-button-wide"></i><span>{{ __('side-bar-dash.Categories') }}</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="Catogary-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="{{ route('categories.index') }}">
              <i class="fa-sharp fa-solid fa-i fs-5"></i><span>{{ __('side-bar-dash.Index') }}</span>
          </a>
        </li>
        <li>
          <a href="{{ route('categories.create') }}">
              <i class="fa-solid fa-plus fs-5"></i><span>{{ __('side-bar-dash.Create') }}</span>
          </a>
        </li>
        <li>
          <a href="{{ route('categories.delete') }}">
          <i class="fa-solid fa-minus fs-5"></i>
          <span>{{ __('side-bar-dash.trash') }}</span>
          </a>
        </li>
      </ul>
    </li>
    {{--SubCategories--}}
    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#SubCategories-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-menu-button-wide"></i><span>{{ __('side-bar-dash.Subcategories') }}</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="SubCategories-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="{{route('subcategories.index')}}">
              <i class="fa-sharp fa-solid fa-i fs-5"></i><span>{{ __('side-bar-dash.Index') }}</span>
          </a>
        </li>
        <li>
          <a href="{{ route('subcategories.create') }}">
              <i class="fa-solid fa-plus fs-5"></i><span>{{ __('side-bar-dash.Create') }}</span>
          </a>
        </li>
        <li>
          <a href="{{ route('subcategories.trash') }}">
          <i class="fa-solid fa-minus fs-5"></i>
          <span>{{ __('side-bar-dash.trash') }}</span>
          </a>
        </li>
      </ul>
    </li>
    {{--products--}}
    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#Products-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-menu-button-wide"></i><span>{{ __('side-bar-dash.Products') }}</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="Products-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="{{ route('products.index') }}">
            <i class="fa-sharp fa-solid fa-i fs-5"></i><span>{{ __('side-bar-dash.Index') }}</span>
          </a>
        </li>
        <li>
          <a href="{{ route('products.create') }}">
            <i class="fa-solid fa-plus fs-5"></i><span>{{ __('side-bar-dash.Create') }}</span>
          </a>
        </li>
        <li>
          <a href="{{ route('products.delete') }}">
          <i class="fa-solid fa-minus fs-5"></i>
          <span>{{ __('side-bar-dash.trash') }}</span>
          </a>
        </li>
      </ul>
    </li>
  </ul>
</aside>
