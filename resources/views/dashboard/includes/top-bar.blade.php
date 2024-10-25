<header id="header" class="header fixed-top d-flex align-items-center">
    <div class="d-flex align-items-center justify-content-between">
        <a href="{{route('dashboard')}}" class="logo d-flex align-items-center">
            <img src="{{ asset('dashboard/assets/img/logo.png') }}" alt="">
            <span class="d-none d-lg-block">{{ __('top-bar-dash.NiceAdmin') }}</span>
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
    </div>
    <!-- End Logo -->
    <div class="search-bar">
        <form class="search-form d-flex align-items-center" method="POST" action="#">
            <input type="text" name="query" placeholder="{{ __('top-bar-dash.Search') }}" title="Enter search keyword">
            <button type="submit" title="Search"><i class="bi bi-search"></i></button>
        </form>
    </div>
    <!-- End Search Bar -->

    <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">
            <li class="nav-item d-block d-lg-none">
                <a class="nav-link nav-icon search-bar-toggle" href="#">
                    <i class="bi bi-search"></i>
                </a>
            </li>
            <!-- End Search Icon -->
            <li class="nav-item dropdown">
                <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                    <i class="bi bi-bell"></i>
                    <span class="badge bg-primary badge-number">4</span>
                </a>
                <!-- End Notification Icon -->

                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
                    <li class="dropdown-header">
                        {{ __('top-bar-dash.notifications') }}
                        <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">{{ __('top-bar-dash.view_all') }}</span></a>
                    </li>
                    <li><hr class="dropdown-divider"></li>

                    <!-- Notification Items -->
                    @for ($i = 1; $i <= 4; $i++)
                        <li class="notification-item">
                            <i class="bi bi-exclamation-circle text-warning"></i>
                            <div>
                                <h4>{{ __('top-bar-dash.notification_' . $i) }}</h4>
                                <p>{{ __('top-bar-dash.notification_1_desc') }}</p>
                                <p>{{ __('top-bar-dash.time_' . $i) }}</p>
                            </div>
                        </li>
                        <li><hr class="dropdown-divider"></li>
                    @endfor

                    <li class="dropdown-footer">
                        <a href="#">{{ __('top-bar-dash.show_all_notifications') }}</a>
                    </li>
                </ul>
                <!-- End Notification Dropdown Items -->

            </li>
            <!-- End Notification Nav -->

            <li class="nav-item dropdown">
                <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                    <i class="bi bi-chat-left-text"></i>
                    <span class="badge bg-success badge-number">3</span>
                </a>
                <!-- End Messages Icon -->

                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
                    <li class="dropdown-header">
                        {{ __('top-bar-dash.messages') }}
                        <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">{{ __('top-bar-dash.view_all_messages') }}</span></a>
                    </li>
                    <li><hr class="dropdown-divider"></li>

                    <!-- Message Items -->
                    @foreach (range(1, 3) as $i)
                        <li class="message-item">
                            <a href="#">
                                <img src="{{ asset('dashboard/assets/img/messages-' . $i . '.jpg') }}" alt="" class="rounded-circle">
                                <div>
                                    <h4>{{ __('top-bar-dash.message_' . $i) }}</h4>
                                    <p>{{ __('top-bar-dash.message_' . $i . '_desc') }}</p>
                                    <p>{{ __('top-bar-dash.message_' . $i . '_time') }}</p>
                                </div>
                            </a>
                        </li>
                        <li><hr class="dropdown-divider"></li>
                    @endforeach

                    <li class="dropdown-footer">
                        <a href="#">{{ __('top-bar-dash.show_all_messages') }}</a>
                    </li>
                </ul>
                <!-- End Messages Dropdown Items -->

            </li>
            <!-- End Messages Nav -->

            <li class="nav-item dropdown pe-3">
                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                    <img src="{{ asset('dashboard/assets/img/profile-img.jpg') }}" alt="Profile" class="rounded-circle">
                    <span class="d-none d-md-block dropdown-toggle ps-2">{{ auth()->user()->name }}</span>
                </a>
                <!-- End Profile Image Icon -->

                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                    <li class="dropdown-header">
                        <h6>{{ auth()->user()->name }}</h6>
                        <span>{{ auth()->user()->user_type }}</span>
                    </li>
                    <li><hr class="dropdown-divider"></li>

                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                            <i class="bi bi-person"></i>
                            <span>{{ __('top-bar-dash.profile.my_profile') }}</span>
                        </a>
                    </li>
                    <li><hr class="dropdown-divider"></li>

                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                            <i class="bi bi-gear"></i>
                            <span>{{ __('top-bar-dash.profile.account_settings') }}</span>
                        </a>
                    </li>
                    <li><hr class="dropdown-divider"></li>

                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
                            <i class="bi bi-question-circle"></i>
                            <span>{{ __('top-bar-dash.profile.need_help') }}</span>
                        </a>
                    </li>
                    <li><hr class="dropdown-divider"></li>

                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="#">
                            <i class="bi bi-box-arrow-right"></i>
                            <span>{{ __('top-bar-dash.profile.sign_out') }}</span>
                        </a>
                    </li>
                </ul>
                <!-- End Profile Dropdown Items -->
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-globe"></i>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ LaravelLocalization::getLocalizedURL('ar') }}">
                        <i class="fas fa-text-height"></i> <strong>عربي</strong>
                    </a>
                    <a class="dropdown-item" href="{{ LaravelLocalization::getLocalizedURL('en') }}">
                        <i class="fas fa-font"></i> <strong>{{ __('home.English') }}</strong>
                    </a>
                </div>
            </li>

        </ul>
        <!-- End Icons Navigation -->
    </nav>

</header>
