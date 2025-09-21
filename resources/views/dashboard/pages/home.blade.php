@extends('dashboard.layouts.master')
@section('title' , 'Home Page')
@section('main-content')
{{-- -Home Page  --}}
  <div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">Dashboard</li>
      </ol>
    </nav>
  </div>
    <!-- End Page Title -->
  <section class="section dashboard">
    <div class="row">
      <div class="col-lg-">
        <div class="row">
          <!-- Start Admin Card -->
          <div class="col-xxl-4 col-md-6">
            <div class="card-w info-card sales-card">
              <div class="filter">
                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                  <li class="dropdown-header text-start">
                    <h6>Filter</h6>
                  </li>
                  <li><a class="dropdown-item" href="#">Today</a></li>
                  <li><a class="dropdown-item" href="#">This Month</a></li>
                  <li><a class="dropdown-item" href="#">This Year</a></li>
                </ul>
              </div>
              <div class="card-body-w">
                <h5 class="card-title-w">Admins <span>| Total</span></h5>
                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-person-circle"></i>
                  </div>
                  <div class="ps-3">
                    <h6>{{ $adminCount }}</h6>
                    <span class="text-muted small pt-2 ps-1">Admins</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- End Admin Card -->
          <!-- Start Moderator Card -->
          <div class="col-xxl-4 col-md-6">
            <div class="card-w info-card revenue-card">
              <div class="filter">
                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                  <li class="dropdown-header text-start">
                    <h6>Filter</h6>
                  </li>
                  <li><a class="dropdown-item" href="#">Today</a></li>
                  <li><a class="dropdown-item" href="#">This Month</a></li>
                  <li><a class="dropdown-item" href="#">This Year</a></li>
                </ul>
              </div>
              <div class="card-body-w">
                <h5 class="card-title-w">Moderators <span>| Total</span></h5>
                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-shield"></i>
                  </div>
                  <div class="ps-3">
                    <h6>{{ $moderatorCount }}</h6>
                    <span class="text-muted small pt-2 ps-1">Moderators</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- End Moderator Card -->

          <!-- Start Customer Card -->
          <div class="col-xxl-4 col-xl-12">
            <div class="card-w info-card customers-card">
              <div class="filter">
                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                  <li class="dropdown-header text-start">
                    <h6>Filter</h6>
                  </li>
                  <li><a class="dropdown-item" href="#">Today</a></li>
                  <li><a class="dropdown-item" href="#">This Month</a></li>
                  <li><a class="dropdown-item" href="#">This Year</a></li>
                </ul>
              </div>
              <div class="card-body-w">
                <h5 class="card-title-w">Customers <span>| Total</span></h5>
                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-people"></i>
                  </div>
                  <div class="ps-3">
                    <h6>{{ $customerCount }}</h6>
                    <span class="text-muted small pt-2 ps-1">Customers</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- End Customer Card -->

        </div>
      </div>
      <div class="col-lg-">
        <div class="row">
        <!-- Start categories Card -->
        <div class="col-xxl-4 col-md-6">
          <div class="card-w info-card sales-card">
              <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="fa-solid fa-list"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                      <li class="dropdown-header text-start">
                          <h6>Filter</h6>
                      </li>
                      <li><a class="dropdown-item" href="#">Today</a></li>
                      <li><a class="dropdown-item" href="#">This Month</a></li>
                      <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
              </div>
              <div class="card-body-w">
                  <h5 class="card-title-w">Categories <span>| Total</span></h5>
                  <div class="d-flex align-items-center">
                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                          <i class="bi bi-list"></i>
                      </div>
                      <div class="ps-3">
                          <h6>{{  $categoryCount }}</h6>
                          <span class="text-muted small pt-2 ps-1">Total Categories</span>
                      </div>
                  </div>
              </div>
          </div>
        </div>
        <!-- End Categories Card -->
        <!-- subcategories Card -->
        <div class="col-xxl-4 col-md-6">
          <div class="card-w info-card revenue-card">
              <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="fa-solid fa-list"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                      <li class="dropdown-header text-start">
                          <h6>Filter</h6>
                      </li>
                      <li><a class="dropdown-item" href="#">Today</a></li>
                      <li><a class="dropdown-item" href="#">This Month</a></li>
                      <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
              </div>
              <div class="card-body-w">
                  <h5 class="card-title-w">SubCategories <span>| Total</span></h5>
                  <div class="d-flex align-items-center">
                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                          <i class="bi bi-list-check"></i>
                      </div>
                      <div class="ps-3">
                          <h6>{{ $subCategoryCount }}</h6>
                          <span class="text-muted small pt-2 ps-1">Total SubCategories</span>
                      </div>
                  </div>
              </div>
          </div>
        </div>
        <!-- End subcategories  Card -->
        <!-- products Card -->
        <div class="col-xxl-4 col-md-6">
          <div class="card-w info-card revenue-card">
              <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="fa-solid fa-list"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                      <li class="dropdown-header text-start">
                          <h6>Filter</h6>
                      </li>
                      <li><a class="dropdown-item" href="#">Today</a></li>
                      <li><a class="dropdown-item" href="#">This Month</a></li>
                      <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
              </div>
              <div class="card-body-w">
                  <h5 class="card-title-w">Products <span>| Total</span></h5>
                  <div class="d-flex align-items-center">
                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                          <i class="bi bi-list-check"></i>
                      </div>
                      <div class="ps-3">
                          <h6>{{ $productCount }}</h6>
                          <span class="text-muted small pt-2 ps-1">Total Products</span>
                      </div>
                  </div>
              </div>
          </div>
        </div>
        <!-- End Products  Card -->
        </div>
      </div>
    </div>
  </section>
@endsection