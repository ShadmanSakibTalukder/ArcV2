<div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary">
    <div class="offcanvas-lg offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="sidebarMenuLabel">Arc Trading</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
            <ul class="nav flex-column">
                @if (Auth::user()->role_as=='1')
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2 active" aria-current="page" href="{{route('home')}}">
                        <i class="fa-solid fa-earth-asia fa-spin"></i>
                        Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2" href="{{route('parts_list.index')}}">
                        <i class="fa-solid fa-gears fa-spin fa-l"></i>
                        Parts List
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2" href="{{route('catelog_part_list.index')}}">
                        <i class="fa-solid fa-gears fa-spin fa-l"></i>
                        Cateog Parts List
                    </a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2" href="{{route('work_orders.index')}}">
                        <i class="fa-regular fa-clipboard fa-flip fa-xl"></i>
                        Work Orders
                    </a>
                </li> -->
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2" href="{{route('tenders.index')}}">
                        <i class="fa-solid fa-print fa-fade"></i>
                        Tender
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2" href="{{route('purchased_order.index')}}">
                        <i class="fa-solid fa-cart-shopping fa-bounce fa-l"></i>
                        Purchased Order
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2" href="{{route('vendors.index')}}">
                        <i class="fa-solid fa-ghost fa-shake fa-xl"></i>
                        Vendors
                    </a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2" href="{{route('buyers.index')}}">
                        <i class="fa-regular fa-handshake fa-bounce"></i>
                        Buyers
                    </a>
                </li> -->
                <!-- <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2" href="#">
                        <i class="fa-solid fa-boxes-packing fa-beat-fade"></i>
                        Package List
                    </a>
                </li> -->
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2" href="{{route('profit_loss.index')}}">
                        <i class="fa-solid fa-chart-line fa-bounce"></i>
                        Profit Loss
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2" href="{{route('m_purchase_order.index')}}">
                        <i class="fa-solid fa-cart-shopping fa-bounce fa-l"></i>
                        Mens Logistics Purchased Order
                    </a>
                </li>
                @else
                <!-- <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2 active" aria-current="page" href="{{route('support.dashboard')}}">
                        <i class="fa-solid fa-earth-asia fa-spin"></i>
                        Dashboard
                    </a>
                </li> -->

                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2" href="{{route('m_purchase_order.index')}}">
                        <i class="fa-solid fa-cart-shopping fa-bounce fa-l"></i>
                        Mens Logistics Purchased Order
                    </a>
                </li>
                @endif


            </ul>


        </div>
    </div>
</div>