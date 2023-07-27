<div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary">
    <div class="offcanvas-lg offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="sidebarMenuLabel">Arc Trading</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2 active" aria-current="page" href="{{route('support.dashboard')}}">
                        <i class="fa-solid fa-earth-asia fa-spin"></i>
                        Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2" href="{{route('purchased_order.index')}}">
                        <i class="fa-solid fa-cart-shopping fa-bounce fa-l"></i>
                        Purchased Order
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2" href="{{route('m_purchase_order.index')}}">
                        <i class="fa-solid fa-cart-shopping fa-bounce fa-l"></i>
                        Mens Logistics Purchased Order
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2" href="#">
                        <i class="fa-solid fa-boxes-packing fa-beat-fade"></i>
                        Package List
                    </a>
                </li>


            </ul>


        </div>
    </div>
</div>