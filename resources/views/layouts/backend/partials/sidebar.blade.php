<div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
    <div class="logo">
        <a href="{{ route('admin.dashboard') }}" class="simple-text logo-normal">
            Creative Tim
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="{{ Request::is('admin/dashboard*') ? 'active': '' }}">
                <a class="nav-link" href="{{ route('admin.dashboard') }}">
                    <i class="material-icons">dashboard</i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="{{ Request::is('admin/category*') ? 'active': '' }}">
                <a class="nav-link" href="{{ route('admin.category.index') }}">
                    <i class="material-icons">person</i>
                    <p>Category</p>
                </a>
            </li>

            <li class="{{ Request::is('admin/slider*') ? 'active': '' }}">
                <a class="nav-link" href="{{ route('admin.slider.index') }}">
                    <i class="material-icons">person</i>
                    <p>Slider</p>
                </a>
            </li>

            <li class="{{ Request::is('admin/item*') ? 'active': '' }}">
                <a class="nav-link" href="{{ route('admin.item.index') }}">
                    <i class="material-icons">person</i>
                    <p>Item</p>
                </a>
            </li>

            <li class="{{ Request::is('admin/reserve*') ? 'active': '' }}">
                <a class="nav-link" href="{{ route('admin.reservation.index') }}">
                    <i class="material-icons">person</i>
                    <p>Reservation</p>
                </a>
            </li>

            <li class="{{ Request::is('admin/contact*') ? 'active': '' }}">
                <a class="nav-link" href="{{ route('admin.contact.index') }}">
                    <i class="material-icons">person</i>
                    <p>Contact</p>
                </a>
            </li>
        </ul>
    </div>
</div>