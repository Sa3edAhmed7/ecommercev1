@section('title')
  Ordered Details
  @stop
@can('Ordered Details')
<style>
   @media print {
     #print_Button {
    display: none;
    padding:0px;
    margin:0px;
   }
  }
</style>
<div class="main-content" id="print">
        <section class="section">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4>Ordered Details</h4>
                  <div class="mx-auto"><img alt="image" src="{{asset('assets/admin/img/logo.png')}}" width="50px" class="header-logo"><span class="logo-name"><b> Ecommerce</b></span></div>
                </div>
                <div class="card-body p-3">
                  <div class="table-responsive">
                    <table class="table table-striped table-hover dataTable no-footer">
                      <tr class="text-center">
                        <th>OrderId : <b>{{ $order->id }}</b></th>
                        <th>Order Date : <b>{{ $order->created_at }}</b></th>
                        <th>Status : <b class="badge bg-light">{{ $order->status }}</b></th>
                        @if($order->status == "delivered")
                        <th>Delivery Date : <b>{{ $order->delivered_date }}</b></th>
                        @elseif($order->status == "canceled")
                        <th>Cancellation Date : <b>{{ $order->canceled_date }}</b></th>
                        @endif
                      </tr>
                    </table>
                  </div>                 
                </div>
                <button class="btn btn-primary mx-auto" style="" id="print_Button" value="print_Button" onclick="printDiv()"> <i
                    class="fas fa-print"></i> Print</button>   
                <div class="card-header">
                  <h4>Ordered Items</h4>
                </div>
                <div class="card-body p-3">
                  <div class="table-responsive">
                    <table class="table table-striped table-hover dataTable no-footer">
                    @foreach ($order->orderItems as $item)
                      <tr>
                        <th>
                        <figure><a href="{{ route('product.details',['slug'=>$item->product->slug]) }}"><img src="{{asset('assets')}}/images/products/{{ $item->product->image }}" width="100px" alt="{{ $item->product->name }}"></figure></th></a>
                        <td><p><b>{{ $item->product->name }}</b></p></td> 
                        <td>
                        @if($item->options)
                        <div>
                        @foreach(unserialize($item->options) as $key => $value)
                        <p><b>{{$key}}</b> : <b>{{$value}}</b></p>
                        @endforeach
                        </div>
                        @endif
                        </td>
                        <td><p><b>${{ $item->price }}</b></p></div></td>
                        <td><p style="font-size:15px;"><b>{{ $item->quantity }}</b></p></td>
                        <td><p><b>${{ $item->price * $item->quantity }}</b></p></td>
                      </tr>
                      @endforeach
                      <tr class="text-center">
                        <th>Subtotal : </th>
                        <td><b>${{ $order->subtotal }}</b></td>
                        <tr class="text-center">
                        <th>Tax : </th>
                        <td><b>${{ $order->tax }}</b></td>
                        </tr>
                        <tr class="text-center">
                        <th>Shipping : </th>
                        <td><b>Free Shipping</b></td>
                        </tr>
                        <tr class="text-center">
                        <th>Total : </th>
                        <td><b class="badge bg-light">${{ $order->total }}</b></td> 
                        </tr>
                      </tr>
                    </table>
                    
                  </div>
                </div>

                <div class="card-header">
                  <h4>Billing Details</h4>
                </div>
                <div class="card-body p-3">
                  <div class="table-responsive">
                    <table class="table table-striped table-hover dataTable no-footer">
                        <tr class="text-center">
                        <th>First Name :<td><b>{{ $order->firstname }}</b></td></th>
                        <th>Last Name :<td><b>{{ $order->lastname }}</b></td></th>
                        </tr>
                        <tr class="text-center">
                        <th>Phone :<td><b>{{ $order->mobile }}</b></td></th>
                        <th>Email :<td><b>{{ $order->email }}</b></td></th>
                        </tr>
                        <tr class="text-center">
                        <th>Line1 :<td><b>{{ $order->line1 }}</b></td></th>
                        <th>Line2 :<td><b>{{ $order->line2 }}</b></td></th>
                        </tr>
                        <tr class="text-center">
                        <th>City :<td><b>{{ $order->city }}</b></td></th>
                        <th>Province :<td><b>{{ $order->province }}</b></td></th>
                        </tr>
                        <tr class="text-center">
                        <th>Country :<td><b>{{ $order->country }}</b></td></th>
                        <th>ZipCode :<td><b>{{ $order->zipcode }}</b></td></th>
                        </tr>
                    </table>
                  </div>
                </div>

        @if($order->is_shipping_different)
                <div class="card-header">
                  <h4>Shiping Details</h4>
                </div>
                <div class="card-body p-3">
                  <div class="table-responsive">
                    <table class="table table-striped table-hover dataTable no-footer">
                        <tr class="text-center">
                        <th>First Name :<td><b>{{ $order->shipping->firstname }}</b></td></th>                      
                        <th>Last Name :<td><b>{{ $order->shipping->lastname }}</b></td></th>
                        </tr>
                        <tr class="text-center">
                        <th>Phone :<td><b>{{ $order->shipping->mobile }}</b></td></th>                       
                        <th>Email :<td><b>{{ $order->shipping->email }}</b></td></th>                       
                        </tr>
                        <tr class="text-center">
                        <th>Line1 :<td><b>{{ $order->shipping->line1 }}</b></td></th>
                        
                        <th>Line2 :<td><b>{{ $order->shipping->line2 }}</b></td></th>
                        </tr>
                        <tr class="text-center">
                        <th>City :<td><b>{{ $order->shipping->city }}</b></td></th>                       
                        <th>Province :<td><b>{{ $order->shipping->province }}</b></td></th>                      
                        </tr>
                        <tr class="text-center">
                        <th>Country :<td><b>{{ $order->shipping->country }}</b></td></th>                       
                        <th>ZipCode :<td><b>{{ $order->shipping->zipcode }}</b></td></th>                    
                        </tr>
                    </table>
                  </div>
                </div>
        @endif
        <div class="card-header">
                  <h4>Transaction</h4>
                </div>
                <div class="card-body p-3">
                  <div class="table-responsive">
                    <table class="table table-striped table-hover dataTable no-footer">
                    <tr class="text-center">
                        <th>Transaction Mode : <b>{{ $order->transaction->mode }}</b></th>
                        <th>Status : <b class="badge bg-light">{{ $order->transaction->status }}</b></th>
                        <th>Transaction Date : <b>{{ $order->transaction->created_at }}</b></th>
                        </tr>
                    </table>
                  </div>
                </div>

                </div>
            </div>
          </div>
        </section>
</div>
@push('scripts')

<script type="text/javascript">
              var hidden = false;
              function printDiv() {
              hidden = !hidden;
              if(hidden) {
                  document.getElementById('print_Button').style.visibility = 'hidden';
                  var printContents = document.getElementById('print').innerHTML;
                  var originalContents = document.body.innerHTML;
                  document.body.innerHTML = printContents;
                  window.print();
                  document.body.innerHTML = originalContents;
                  location.reload();
              } else {
                  document.getElementById('print_Button').style.visibility = 'visible';
              }
            }
  </script>
  @endpush

  @endcan

