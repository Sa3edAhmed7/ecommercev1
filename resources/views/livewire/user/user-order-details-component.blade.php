<div>
    <style>
        nav svg{
            height: 20px;
        }
        nav .hidden{
            display: block !important;
        }
    </style>
        <div class="container" style="padding:30px 0;">
        <div class="row">
            <div class="col-md-12">
            @if(Session::has('order_message'))
            <div class="alert alert-success" role="alert">{{ Session::get('order_message') }}</div>
            @endif
            <div class="panel panel-default">
            <div class="panel-heading">
            <div class="row">
            <div class="col-md-6">
            Ordered Details
            </div>
            <div class="col-md-6">
                    <a href="{{ route('user.orders') }}" class="btn btn-danger pull-right">My Orders</a>
                    @if($order->status == 'ordered')
                    <a href="#" class="btn btn-warning pull-right" wire:click.prevent="cancelOrder" style="margin-right:20px;">Cancel Order</a>
                    @endif
            </div>
            </div>
            </div>
            <div class="panel-body">
            <table class="table">
                <tr>
                    <th>Order Id</th>
                    <td style="color:#ff3c45;">{{ $order->id }}</td>
                    <th>Order Date</th>
                    <td style="color:#ff3c45;">{{ $order->created_at }}</td>
                    <th>Status</th>
                    <td style="color:#ff3c45;">{{ $order->status }}</td>
                    @if($order->status == "delivered")
                    <th>Delivery Date</th>
                    <td style="color:#ff3c45;">{{ $order->delivered_date }}</td>
                    @elseif($order->status == "canceled")
                    <th>Cancellation Date</th>
                    <td style="color:#ff3c45;">{{ $order->canceled_date }}</td>
                    @endif
                </tr>
            </table>
            </div>
            </div>
            </div>
        </div>
        <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
            <div class="panel-heading">
            <div class="row">
            <div class="col-md-6">
            Ordered Items
            </div>
            <div class="col-md-6">
                    <a href="{{ route('user.orders') }}" class="btn btn-danger pull-right">All Orders</a>
            </div>
            </div>
            </div>
            <div class="panel-body">
            <div class="wrap-iten-in-cart">
            <h3 class="box-title">Products Name</h3>
            <ul class="products-cart">
                @foreach ($order->orderItems as $item)
                <li class="pr-cart-item">
                    <div class="product-image">
                        <figure><img src="{{asset('assets')}}/images/products/{{ $item->product->image }}" alt="{{ $item->product->name }}"></figure>
                    </div>
                    <div class="product-name">
                        <a class="link-to-product" href="{{ route('product.details',['slug'=>$item->product->slug]) }}">{{ $item->product->name }}</a>
                    </div>
                    @if($item->options)
                    <div class="product-name">
                        @foreach(unserialize($item->options) as $key => $value)
                            <p><b>{{$key}}: {{$value}}</b></p>
                        @endforeach
                    </div>
                    @endif
                    <div class="price-field produtc-price"><p class="price">${{ $item->price }}</p></div>
                    <div class="quantity">
                        <h5>{{ $item->quantity }}</h5>
                    </div>
                    <div class="price-field sub-total"><p class="price">${{ $item->price * $item->quantity }}</p></div>
                    @if($order->status == 'delivered' && $item->rstatus == false)
                    <div class="price-field sub-total"><p class="price"><a href="{{ route('user.review',['order_item_id'=>$item->id]) }}">Write Review</a></p></div>
                    @endif
                </li>
            @endforeach											
            </ul>
            </div>
            <div class="summary">
                <div class="order-summary">
                    <h4 class="title-box">Order Summary</h4>
                <p class="summary-info"><span class="title">Subtotal</span><b class="index">${{ $order->subtotal }}</b></p>
                <p class="summary-info"><span class="title">Tax</span><b class="index">${{ $order->tax }}</b></p>
                <p class="summary-info"><span class="title">Shipping</span><b class="index">Free Shipping</b></p>
                <p class="summary-info"><span class="title">Total</span><b class="index">${{ $order->total }}</b></p>
                </div>
            </div>
            </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
            <div class="panel-heading">
            Billing Details
            </div>
            <div class="panel-body">
            <table class="table">
                <tr>
                    <th>First Name</th>
                    <td>{{ $order->firstname }}</th>
                    <th>Last Name</th>
                    <td>{{ $order->lastname }}</th>
                </tr>
                <tr>
                    <th>Phone</th>
                    <td>{{ $order->mobile }}</th>
                    <th>Email</th>
                    <td>{{ $order->email }}</th>
                </tr>
                <tr>
                    <th>Line1</th>
                    <td>{{ $order->line1 }}</th>
                    <th>Line2</th>
                    <td>{{ $order->line2 }}</th>
                </tr>
                <tr>
                    <th>City</th>
                    <td>{{ $order->city }}</th>
                    <th>Province</th>
                    <td>{{ $order->province }}</th>
                </tr>
                <tr>
                    <th>Country</th>
                    <td>{{ $order->country }}</th>
                    <th>ZipCode</th>
                    <td>{{ $order->zipcode }}</th>
                </tr>
            </table>
            </div>
            </div>
        </div>
        </div>

        @if($order->is_shipping_different)
        <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
            <div class="panel-heading">
            Shiping Details
            </div>
            <div class="panel-body">
            <table class="table">
                <tr>
                    <th>First Name</th>
                    <td>{{ $order->shipping->firstname }}</th>
                    <th>Last Name</th>
                    <td>{{ $order->shipping->lastname }}</th>
                </tr>
                <tr>
                    <th>Phone</th>
                    <td>{{ $order->shipping->mobile }}</th>
                    <th>Email</th>
                    <td>{{ $order->shipping->email }}</th>
                </tr>
                <tr>
                    <th>Line1</th>
                    <td>{{ $order->shipping->line1 }}</th>
                    <th>Line2</th>
                    <td>{{ $order->shipping->line2 }}</th>
                </tr>
                <tr>
                    <th>City</th>
                    <td>{{ $order->shipping->city }}</th>
                    <th>Province</th>
                    <td>{{ $order->shipping->province }}</th>
                </tr>
                <tr>
                    <th>Country</th>
                    <td>{{ $order->shipping->country }}</th>
                    <th>ZipCode</th>
                    <td>{{ $order->shipping->zipcode }}</th>
                </tr>
            </table>
            </div>
            </div>
        </div>
        </div>
        @endif

        <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
            <div class="panel-heading">
            Transaction
            </div>
            <div class="panel-body">
            <table class="table">
                <tr>
                    <th>Transaction Mode</th>
                    <td>{{ $order->transaction->mode }}</th>
                </tr>
                <tr>
                    <th>Status</th>
                    <td>{{ $order->transaction->status }}</th>
                </tr>
                <tr>
                    <th>Transaction Date</th>
                    <td>{{ $order->transaction->created_at }}</th>
                </tr>
            </table>
            </div>
            </div>
        </div>
        </div>
</div>



