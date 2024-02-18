<aside>
    <div class="user-side" style="margin-top: 40px;">
        <div class="user-img">
            <img src="{{ asset('assets/site/img/user-img.png') }} " alt="porfile">
        </div>
        <p> {{ Auth::user()->name }} </p>
    </div>
    <ul>
        <li>
            <a href="{{ route('home') }}">
                <i class="fas fa-home"></i>
                <span>الرئيسية</span>
            </a>
        </li>
        <li>
            <a href="{{ route('sliders') }}">
                <i class="fa fa-list" aria-hidden="true"></i>
                <span>التصنيفات</span>
            </a>
        </li>
        <li>
            <a href="{{ route('products') }}">
                <i class="fa fa-list" aria-hidden="true"></i>
                <span>المنتجات</span>
            </a>
        </li>
        <li>
            <a href="{{ route('joins') }}">
                <i class="fa fa-receipt" aria-hidden="true"></i>
                <span>الاشتراك</span>
            </a>
        </li>
        <li>
            <a href="#" class="dorpdown-list">
                <i class="fas fa-cog"></i>
                <span>الاعدادت</span>
            </a>
            <ul class="dropdown-aside">
                <li>
                    <a href="{{ route('user.profile') }}"> الملف الشخصي</a>
                </li>
                <li>
                    <a href="{{ route('store') }}">معلومات المتجر</a>
                </li>
            </ul>
        </li>

        <li>
            <a href="{{ route('user.contactUs') }}">
                <i class="fas fa-phone-volume"></i>
                <span>أتصل بنا</span>
            </a>
        </li>
    </ul>
</aside>
