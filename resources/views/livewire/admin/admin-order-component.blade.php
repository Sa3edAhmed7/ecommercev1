@section('title')
    All Orders
    @stop
@can('All Orders')
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>All Orders</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                @if(Session::has('order_message'))
                                <div class="alert alert-info alert-has-icon">
                                    <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
                                    <div class="alert-body">
                                        <div class="alert-title">Success</div>
                                        {{Session::get('order_message')}}
                                    </div>
                                </div>
                                @endif

                                <table class="table table-striped table-hover" id="save-stage" style="width:100%;">
                                <!-- <input type="text" class="form-control" style="width:50%; margin:auto; padding:auto;" placeholder="Search..."  wire:model="searchTearm"/> -->
                                    <thead>
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
                                        <th colspan="2" class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($orders as $order)
                                        <tr>
                                        <td>{{ $order->id }}</td>
                                        <td>{{ $order->subtotal }}</td>
                                        <td>{{ $order->discount }}</td>
                                        <td>{{ $order->tax }}</td>
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
                                            <td>
                                            <div class="card-body">
                                                    <div class="dropdown d-inline">
                                                            <a class="btn btn-primary"
                                                                href="{{ route('admin.orderdetails',['order_id'=>$order->id]) }}"><i
                                                                class="far fa-eye"></i> Details</a>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item has-icon"
                                                                href="{{ route('admin.orderdetails',['order_id'=>$order->id]) }}"><i
                                                                class="far fa-eye"></i> Details</a>
                                                        </div>
                                                    </div>
                                                    <div class="dropdown d-inline">
                                                        <button class="btn btn-primary dropdown-toggle" type="button"
                                                            id="dropdownMenuButton2" data-toggle="dropdown"
                                                            aria-haspopup="true" aria-expanded="false">
                                                            <i class="fa fa-spin fa-cog"></i>
                                                            </button>
                                                            <div class="dropdown-menu">
                                                            <a class="dropdown-item has-icon"
                                                                href="#" wire:click.prevent="updateOrderStatus({{ $order->id }},'delivered')"><i
                                                                    class="fa fa-truck"></i> Delivered</a>
                                                            <a class="dropdown-item has-icon" class="btn" href="#"
                                                                data-toggle="modal"
                                                                data-target="#exampleModalCenter1" wire:click.prevent="updateOrderStatus({{ $order->id }},'canceled')">
                                                                <i class="fas fa-ban"
                                                                 aria-hidden="true"></i>Canceled</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @endcan