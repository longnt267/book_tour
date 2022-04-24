<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            @php
                $routeName = Route::current()->getName();
                $name = explode(".", $routeName);
            @endphp
            <ul id="sidebarnav">
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark" href="{{ route('dashboard.index') }}" aria-expanded="false">
                        <i class="mdi mdi-home"></i><span class="hide-menu">Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark {{$name[0] == 'products' ? 'active' : ''}}" href="#" aria-expanded="false">
                        <i class="mdi mdi-layers"></i><span class="hide-menu">Sản phẩm</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" aria-expanded="false"><i class="mdi mdi-layers"></i><span
                        class="hide-menu">Cài đặt</span></a>
                    <ul aria-expanded="false" class="collapse first-level">
                        <li class="sidebar-item"><a href="#" class="sidebar-link"><i
                            class="mdi mdi-adjust"></i><span class="hide-menu">Cài đặt trang chủ</span></a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>