@extends('user.layouts.user')

@section('content')

<div class="app-content-header">
    <div class="container-fluid">
    <div class="row">
        <div class="col-sm-6">
        <h3 class="mb-0">Order</h3>
        </div>
    </div>
    </div>
</div>

<div class="app-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary card-outline mb-4">
                    <div class="card-body">
                        
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="order-top-bar">

                                    <!-- SEARCH -->
                                    <div class="order-search-bar">
                                        <div class="search-wrapper">
                                            <input type="text" placeholder="Search your orders here">

                                            <button class="search-btn">
                                                <i class="bi bi-search"></i>
                                                <span class="d-none d-sm-inline">Search Orders</span>
                                            </button>
                                        </div>
                                    </div>

                                    <!-- FILTER BUTTON (MOBILE ONLY) -->
                                    <button class="btn btn-outline-primary filter-toggle-btn d-lg-none">
                                        <i class="bi bi-funnel"></i>
                                    </button>

                                </div>
                            </div>
                            <!-- FILTER SIDEBAR -->
                            <div class="col-lg-3">
                                <div class="filter-card" id="filterSidebar">
                                    <h5>Filters</h5>

                                    <div class="filter-group">
                                        <h6>ORDER STATUS</h6>
                                        <label><input type="checkbox"> On the way</label>
                                        <label><input type="checkbox"> Delivered</label>
                                        <label><input type="checkbox"> Cancelled</label>
                                        <label><input type="checkbox"> Returned</label>
                                    </div>

                                    <div class="filter-group">
                                        <h6>ORDER TIME</h6>
                                        <label><input type="checkbox"> Last 30 days</label>
                                        <label><input type="checkbox"> 2024</label>
                                        <label><input type="checkbox"> 2023</label>
                                        <label><input type="checkbox"> Older</label>
                                    </div>
                                </div>
                            </div>

                            <!-- ORDER LIST -->
                            <div class="col-lg-9">
                                <div class="order-list">

                                    <a href="#" class="order-card-link">
                                        <div class="order-card">

                                            <div class="order-header">
                                                <div>
                                                    <h6>Order #12345</h6>
                                                    <span>Placed on 12 Feb 2025</span>
                                                </div>
                                                <div class="status delivered">
                                                    <i class="bi bi-check-circle"></i> Delivered
                                                </div>
                                            </div>

                                            <div class="order-body">
                                                <img src="{{ Vite::asset('resources/images/tinyg-cnc-controller-board.webp')}}" alt="">

                                                <div class="details">
                                                    <h6>High Reliability and a guaranteed/durable PCB</h6>
                                                    <p>Qty: 1</p>
                                                    <span class="price">₹1200</span>
                                                </div>

                                                <!-- RIGHT SIDE -->
                                                <div class="order-meta">
                                                    <span class="arrow">
                                                        <i class="bi bi-chevron-right"></i>
                                                    </span>
                                                </div>
                                            </div>

                                        </div>
                                    </a>

                                    <a href="#" class="order-card-link">
                                        <div class="order-card">

                                            <div class="order-header">
                                                <div>
                                                    <h6>Order #12346</h6>
                                                    <span>Placed on 12 Feb 2025</span>
                                                </div>
                                                <div class="status pending">
                                                    <i class="bi bi-check-circle"></i> Pending
                                                </div>
                                            </div>

                                            <div class="order-body">
                                                <img src="{{ Vite::asset('resources/images/960x0.jpg')}}" alt="">

                                                <div class="details">
                                                    <h6>Product Name</h6>
                                                    <p>Qty: 1</p>
                                                    <span class="price">₹1200</span>
                                                </div>

                                                <!-- RIGHT SIDE -->
                                                <div class="order-meta">
                                                    <span class="arrow">
                                                        <i class="bi bi-chevron-right"></i>
                                                    </span>
                                                </div>
                                            </div>

                                        </div>
                                    </a>

                                    <a href="#" class="order-card-link">
                                        <div class="order-card">

                                            <div class="order-header">
                                                <div>
                                                    <h6>Order #12347</h6>
                                                    <span>Placed on 12 Feb 2025</span>
                                                </div>
                                                <div class="status cancelled">
                                                    <i class="bi bi-check-circle"></i> Cancelled
                                                </div>
                                            </div>

                                            <div class="order-body">
                                                <img src="{{ Vite::asset('resources/images/how-does-a-3d-printer-work.jpg')}}" alt="">

                                                <div class="details">
                                                    <h6>Product Name</h6>
                                                    <p>Qty: 1</p>
                                                    <span class="price">₹1200</span>
                                                </div>

                                                <!-- RIGHT SIDE -->
                                                <div class="order-meta">
                                                    <span class="arrow">
                                                        <i class="bi bi-chevron-right"></i>
                                                    </span>
                                                </div>
                                            </div>

                                        </div>
                                    </a>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="filter-overlay"></div>

@endsection

@push('scripts')
<script type="module">
    $(document).ready(function () {

        $('.filter-toggle-btn').click(function () {
            $('#filterSidebar').addClass('active');
            $('.filter-overlay').addClass('active');
        });

        $('.filter-overlay').click(function () {
            $('#filterSidebar').removeClass('active');
            $(this).removeClass('active');
        });

    });
</script>
@endpush