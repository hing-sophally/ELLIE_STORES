@extends('admin.index')

@section('content')
<section class="section">
    <h1 class="section-header">
        <div>Dashboard</div>
    </h1>

    <div class="row">
        <!-- Total Orders -->
        <div class="col-lg-3 col-md-6 col-12">
            <div class="card card-sm-3">
                <div class="card-icon bg-primary">
                    <i class="ion ion-ios-cart"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Orders</h4>
                    </div>
                    <div class="card-body">
                        {{ $totalOrders ?? 0 }}
                    </div>
                </div>
            </div>
        </div>

        <!-- Products -->
        <div class="col-lg-3 col-md-6 col-12">
            <div class="card card-sm-3">
                <div class="card-icon bg-danger">
                    <i class="ion ion-ios-pricetag"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Products</h4>
                    </div>
                    <div class="card-body">
                        {{ $totalProducts ?? 0 }}
                    </div>
                </div>
            </div>
        </div>

        <!-- Customers -->
        <div class="col-lg-3 col-md-6 col-12">
            <div class="card card-sm-3">
                <div class="card-icon bg-warning">
                    <i class="ion ion-ios-people"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Customers</h4>
                    </div>
                    <div class="card-body">
                        {{ $totalCustomers ?? 0 }}
                    </div>
                </div>
            </div>
        </div>

    </div>

    {{-- <!-- Sales Statistics -->
    <div class="row">
        <div class="col-lg-8 col-md-12 col-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div class="float-right">
                        <div class="btn-group">
                            <a href="#" class="btn active">Week</a>
                            <a href="#" class="btn">Month</a>
                            <a href="#" class="btn">Year</a>
                        </div>
                    </div>
                    <h4>Sales Statistics</h4>
                </div>
                <div class="card-body">
                    <canvas id="myChart" height="158"></canvas>
                    <div class="statistic-details mt-sm-4">
                        <div class="statistic-details-item">
                            <small class="text-muted">
                                <span class="text-primary"><i class="ion-arrow-up-b"></i></span>
                                12%
                            </small>
                            <div class="detail-value">${{ number_format($todaySales ?? 0, 2) }}</div>
                            <div class="detail-name">Today's Sales</div>
                        </div>
                        <div class="statistic-details-item">
                            <small class="text-muted">
                                <span class="text-primary"><i class="ion-arrow-up-b"></i></span>
                                8%
                            </small>
                            <div class="detail-value">${{ number_format($weeklySales ?? 0, 2) }}</div>
                            <div class="detail-name">This Week's Sales</div>
                        </div>
                        <div class="statistic-details-item">
                            <small class="text-muted">
                                <span class="text-primary"><i class="ion-arrow-up-b"></i></span>
                                15%
                            </small>
                            <div class="detail-value">${{ number_format($monthlySales ?? 0, 2) }}</div>
                            <div class="detail-name">This Month's Sales</div>
                        </div>
                        <div class="statistic-details-item">
                            <small class="text-muted">
                                <span class="text-danger"><i class="ion-arrow-down-b"></i></span>
                                3%
                            </small>
                            <div class="detail-value">${{ number_format($yearlySales ?? 0, 2) }}</div>
                            <div class="detail-name">This Year's Sales</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

@endsection
