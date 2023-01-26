@section('title')
    Dashboard
@stop
@can('Dashboard')
<div class="main-content">
        <section class="section">
          <div class="row ">
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="card">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-15">Total Revenue</h5>
                          <h2 class="mb-3 font-18 col-blue">${{$totalRevenue}}</h2>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                          <img src="{{asset('assets/admin/img/banner/1.png')}}" alt="">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="card">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-15">Total Sales</h5>
                          <h2 class="mb-3 font-18 col-blue">{{$totalSales}}</h2>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                          <img src="{{asset('assets/admin/img/banner/2.png')}}" alt="">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="card">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-15">Today Revenue</h5>
                          <h2 class="mb-3 font-18 col-blue">${{$todayRevenue}}</h2>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                          <img src="{{asset('assets/admin/img/banner/3.png')}}" alt="">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="card">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-15">Today Sales</h5>
                          <h2 class="mb-3 font-18 col-blue">{{$todaySales}}</h2>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                          <img src="{{asset('assets/admin/img/banner/4.png')}}" alt="">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4>Orders</h4>
                  <div class="card-header-form">
                    <form>
                        <input type="text" class="form-control" placeholder="Search..." wire:model="searchTearm">
                    </form>
                  </div>
                </div>
                <div class="card-body p-3">
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <tr>
                        <th>OrderId</th>
                        <th>Subtotal</th>
                        <th>Discount</th>
                        <th>Tax</th>
                        <th>Total</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Mobile</th>
                        <th>Email</th>
                        <th>Zipcode</th>
                        <th>Status</th>
                        <th>Order Date</th>
                        <th class="text-center">Action</th>
                      </tr>
                      @foreach ($orders as $order)
                      <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->subtotal }}</td>
                        <td class="align-middle">
                          <div class="progress-text">{{ $order->discount }}</div>
                          <div class="progress" data-height="6">
                            <div class="progress-bar bg-success" data-width="100%"></div>
                          </div>
                        </td>
                        <td class="align-middle">
                          <div class="progress-text">{{ $order->tax }}</div>
                          <div class="progress" data-height="6">
                            <div class="progress-bar bg-success" data-width="{{ $order->tax }}%"></div>
                          </div>
                        </td>
                        <td><div class="badge bg-primary text-white">{{ $order->total }}</div></td>
                        <td>{{ $order->firstname }}</td>
                            <td>{{ $order->lastname }}</td>
                            <td>{{ $order->mobile }}</td>
                            <td>{{ $order->email }}</td>
                            <td>{{ $order->zipcode }}</td>
                            @if(($order->status) == 'ordered')
                            <td>
                            <div class="badge badge-info">{{ $order->status }}</div>
                            </td>
                            @elseif(($order->status) == 'delivered')
                            <td>
                            <div class="badge badge-success">{{ $order->status }}</div>
                            </td>
                            @else 
                            <td>
                            <div class="badge badge-danger">{{ $order->status }}</div>
                            </td>
                            @endif
                            <td>{{ $order->created_at }}</td>
                        <td><a href="{{ route('admin.orderdetails',['order_id'=>$order->id]) }}" class="btn btn-outline-primary">Detail</a></td> 
                      </tr>
                      @endforeach
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
    </section>
<div>
@endcan