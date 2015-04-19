<div class="page-sidebar-wrapper">
    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
    <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
    <div class="page-sidebar navbar-collapse collapse">
        <!-- BEGIN SIDEBAR MENU -->
        <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
        <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
        <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
        <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
        <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
        <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
        <ul class="page-sidebar-menu page-sidebar-menu-hover-submenu " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
            <li class="active open">
                <a href="#">
                    <i class="icon-home"></i>
                    <span class="title">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{route('student.index')}}">
                    <i class="icon-user"></i>
                    <span class="title">Students</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="icon-rocket"></i>
                    <span class="title">Classes</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="icon-diamond"></i>
                    <span class="title">Marketing</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="icon-puzzle"></i>
                    <span class="title">Users</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="icon-paper-plane"></i>
                    <span class="title">Finances</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="icon-settings"></i>
                    <span class="title">Advance Search</span>
                </a>
            </li>
        </ul>
        <!-- END SIDEBAR MENU -->
    </div>
</div>