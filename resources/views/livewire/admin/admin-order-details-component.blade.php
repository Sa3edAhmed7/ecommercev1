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
            <div class="panel panel-default">
            <div class="panel-heading">
            <div class="row">
            <div class="col-md-6">
            Ordered Details
            </div>
            <div class="col-md-6">
                    <a href="{{ route('admin.orders') }}" class="btn btn-danger pull-right">All Orders</a>
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
                    <div class="price-field produtc-price"><p class="price" style="color:#ff3c45;">${{ $item->price }}</p></div>
                    <div class="quantity">
                        <p style="color:#ff3c45; font-size:15px;">{{ $item->quantity }}</p>
                    </div>
                    <div class="price-field sub-total"><p class="price" style="color:#ff3c45;">${{ $item->price * $item->quantity }}</p></div>
                </li>
            @endforeach											
            </ul>
            </div>
            <div class="summary">
                <div class="order-summary">
                    <h4 class="title-box">Order Summary</h4>
                <p class="summary-info"><span class="title">Subtotal</span><b class="index" style="color:#ff3c45;">${{ $order->subtotal }}</b></p>
                <p class="summary-info"><span class="title">Tax</span><b class="index" style="color:#ff3c45;">${{ $order->tax }}</b></p>
                <p class="summary-info"><span class="title">Shipping</span><b class="index" style="color:#ff3c45;">Free Shipping</b></p>
                <p class="summary-info"><span class="title">Total</span><b class="index" style="color:#ff3c45;">${{ $order->total }}</b></p>
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
                    <td style="color:#ff3c45;">{{ $order->firstname }}</td>
                    <th>Last Name</th>
                    <td style="color:#ff3c45;">{{ $order->lastname }}</td>
                </tr>
                <tr>
                    <th>Phone</th>
                    <td style="color:#ff3c45;">{{ $order->mobile }}</td>
                    <th>Email</th>
                    <td style="color:#ff3c45;">{{ $order->email }}</td>
                </tr>
                <tr>
                    <th>Line1</th>
                    <td style="color:#ff3c45;">{{ $order->line1 }}</td>
                    <th>Line2</th>
                    <td style="color:#ff3c45;">{{ $order->line2 }}</td>
                </tr>
                <tr>
                    <th>City</th>
                    <td style="color:#ff3c45;">{{ $order->city }}</td>
                    <th>Province</th>
                    <td style="color:#ff3c45;">{{ $order->province }}</td>
                </tr>
                <tr>
                    <th>Country</th>
                    <td style="color:#ff3c45;">{{ $order->country }}</td>
                    <th>ZipCode</th>
                    <td style="color:#ff3c45;">{{ $order->zipcode }}</td>
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
                    <td style="color:#ff3c45;">{{ $order->shipping->firstname }}</td>
                    <th>Last Name</th>
                    <td style="color:#ff3c45;">{{ $order->shipping->lastname }}</td>
                </tr>
                <tr>
                    <th>Phone</th>
                    <td style="color:#ff3c45;">{{ $order->shipping->mobile }}</td>
                    <th>Email</th>
                    <td style="color:#ff3c45;">{{ $order->shipping->email }}</td>
                </tr>
                <tr>
                    <th>Line1</th>
                    <td style="color:#ff3c45;">{{ $order->shipping->line1 }}</td>
                    <th>Line2</th>
                    <td style="color:#ff3c45;">{{ $order->shipping->line2 }}</td>
                </tr>
                <tr>
                    <th>City</th>
                    <td style="color:#ff3c45;">{{ $order->shipping->city }}</td>
                    <th>Province</th>
                    <td style="color:#ff3c45;">{{ $order->shipping->province }}</td>
                </tr>
                <tr>
                    <th>Country</th>
                    <td style="color:#ff3c45;">{{ $order->shipping->country }}</td>
                    <th>ZipCode</th>
                    <td style="color:#ff3c45;">{{ $order->shipping->zipcode }}</td>
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
                    <td style="color:#ff3c45;">{{ $order->transaction->mode }}</td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td style="color:#ff3c45;">{{ $order->transaction->status }}</td>
                </tr>
                <tr>
                    <th>Transaction Date</th>
                    <td style="color:#ff3c45;">{{ $order->transaction->created_at }}</td>
                </tr>
            </table>
            </div>
            </div>
        </div>
        </div>
</div>



