<?php
$currentControllerFunction = Route::currentRouteAction();
$currentCont = preg_match(
    '/([a-z]*)@/i',
    request()
        ->route()
        ->getActionName(),
    $currentControllerFunction,
);
$currentControllerName = Request::segment(2);
// dd($currentControllerName);
$currentFullRouteName = Route::getFacadeRoot()
    ->current()
    ->uri();
$action = Route::currentRouteAction();
?>

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/dashboard/admin') }}" class="brand-link">
        <img src="{{ asset('public/') }}/img/logo.png" alt="Admin Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">@lang('english.SHOP_NAME')</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
                <li class="nav-item menu-open">
                    <a href="{{ url('dashboard/admin') }}" class="nav-link active">
                        <i class="nav-icon fa fa-home"></i>
                        <p>
                            @lang('english.DASHBOARD')
                        </p>
                    </a>
                </li>


                <li class="nav-item parent menu-item-has-children <?php echo in_array($currentControllerName, ['userGroup', 'users', 'designation', 'department']) ? 'act' : ''; ?>">
                    <a href="#" class="nav-link parent-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            @lang('english.ADMIN_SETUP')
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview admin-nav sub-menu <?php echo in_array($currentControllerName, ['userGroup', 'users', 'designation', 'department']) ? 'visible' : ''; ?>">
                        <li class="nav-item <?php echo $currentControllerName == 'userGroup' ? 'act' : ''; ?>">
                            <a href="{{ URL::to('admin/userGroup') }}" class="nav-link">
                                <i class="fas fa-users"></i>
                                <p>@lang('english.USER_GROUP')</p>
                            </a>
                        </li>
                        <li class="nav-item <?php echo $currentControllerName == 'designation' ? 'act' : ''; ?>">
                            <a href="{{ URL::to('admin/designation') }}" class="nav-link">
                                <i class="fas fa-briefcase"></i>
                                <p>@lang('english.DESIGNATION')</p>
                            </a>
                        </li>
                        <li class="nav-item <?php echo $currentControllerName == 'department' ? 'act' : ''; ?>">
                            <a href="{{ URL::to('admin/department') }}" class="nav-link">
                                <i class="fas fa-building"></i>
                                <p>@lang('english.DEPARTMENT')</p>
                            </a>
                        </li>
                        <li class="nav-item <?php echo $currentControllerName == 'users' ? 'act' : ''; ?>">
                            <a href="{{ URL::to('admin/users') }}" class="nav-link">
                                <i class="fas fa-user"></i>
                                <p>@lang('english.USER')</p>
                            </a>
                        </li>
                    </ul>
                </li>



                <li class="nav-item parent menu-item-has-children <?php echo in_array($currentControllerName, ['product', 'productCategory', 'brand', 'unit']) ? 'act' : ''; ?>">
                    <a href="#" class="nav-link parent-link">
                        <i class="nav-icon fa fa-shopping-bag"></i>
                        <p>
                            @lang('english.PRODUCT_SETUP')
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview admin-nav sub-menu <?php echo in_array($currentControllerName, ['product', 'productCategory', 'brand', 'unit']) ? 'visible' : ''; ?>">
                        <li class="nav-item <?php echo $currentControllerName == 'productCategory' ? 'act' : ''; ?>">
                            <a href="{{ url('admin/productCategory') }}" class="nav-link">
                                <i class="fa fa-list-alt"></i>
                                <p>@lang('english.PRODUCT_CATEGORY')</p>
                            </a>
                        </li>
                        <li class="nav-item <?php echo $currentControllerName == 'brand' ? 'act' : ''; ?>">
                            <a href="{{ url('admin/brand') }}" class="nav-link">
                                <i class="fas fa-award"></i>
                                <p>@lang('english.BRAND')</p>
                            </a>
                        </li>
                        <li class="nav-item <?php echo $currentControllerName == 'unit' ? 'act' : ''; ?>">
                            <a href="{{ url('admin/unit') }}" class="nav-link">
                                <i class="fa fa-balance-scale"></i>
                                <p>@lang('english.UNIT')</p>
                            </a>
                        </li>
                        <li class="nav-item <?php echo $currentControllerName == 'product' ? 'act' : ''; ?>">
                            <a href="{{ url('admin/product') }}" class="nav-link">
                                <i class="fa fa-shopping-bag"></i>
                                <p>@lang('english.PRODUCT')</p>
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="nav-item parent menu-item-has-children <?php echo in_array($currentControllerName, ['sendMail', 'test']) ? 'act' : ''; ?>">
                    <a href="#" class="nav-link parent-link">
                        <i class="nav-icon fas fa-plus"></i>
                        <p>
                            @lang('english.EXTRA')
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview admin-nav sub-menu <?php echo in_array($currentControllerName, ['sendMail', 'test']) ? 'visible' : ''; ?>">
                        <li class="nav-item <?php echo $currentControllerName == 'sendMail' ? 'act' : ''; ?>">
                            <a href="{{ url('admin/sendMail') }}" class="nav-link">
                                <i class="fas fa-envelope"></i>
                                <p>@lang('english.SEND_MAIL')</p>
                            </a>
                        </li>
                        {{-- <li class="nav-item <?php echo $currentControllerName == 'test' ? 'act' : ''; ?>">
                            <a href="{{ url('admin/test') }}" class="nav-link">
                                <i class="nav-icon far fa-calendar-alt"></i>
                                <p>@lang('english.CALENDER')</p>
                            </a>
                        </li> --}}

                    </ul>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
