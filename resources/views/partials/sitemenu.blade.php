<div class="sidebar sidebar-main">
    <div class="sidebar-content">

        <!-- User menu -->
        <div class="sidebar-user">
            <div class="category-content">
                <div class="media">
                    <a href="" class="media-left"><img src="{{URL::to('assets/uploads/avatars/'.Auth::user()->avatar)}}" class="img-circle img-sm" alt=""></a>
                    <div class="media-body">
                        <span class="media-heading text-semibold">{{Auth::user()->name}}</span>
                        <div class="text-size-mini text-muted">
                            <i class=" icon-briefcase3 text-size-small"></i> {{Auth::user()->name}}
                        </div>
                    </div>

                    <div class="media-right media-middle">
                        <ul class="icons-list">
                            <li>
                                <a href="{{ route('admin.logout') }}"><i class="icon-switch2"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- /user menu -->

        <!-- Main navigation -->
        <div class="sidebar-category sidebar-category-visible">
            <div class="category-content no-padding">
                <ul class="navigation navigation-main navigation-accordion">

                    <!-- Main -->
                    <li class="navigation-header"><span><strong>القائمة</strong></span> <i class="icon-menu" title="Main pages"></i></li>

                    <li {{Request::is('admin/dashboard') ? 'class=active' :''}}>
                        <a href="{{route('dashboard')}}"><i class="fa fa-tachometer" aria-hidden="true"></i> <span>الرئيسيه</span></a>
                    </li>
                    <li {{Request::is('admin/users') ? 'class=active' :''}}>
                        <a href="{{route('users')}}"><i class="fa fa-user" aria-hidden="true"></i> <span>المستخدمين</span></a>
                    </li>
                    <li {{Request::is('admin/products*') ? 'class=active' :''}}>
                        <a href="{{route('admin.products')}}"><i class="fa fa-list" aria-hidden="true"></i> <span>المنتجات</span></a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- /main navigation -->

    </div>
</div>
<!-- /main sidebar
