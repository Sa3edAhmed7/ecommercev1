<div>
<div class="container" style="padding: 30px 0">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                Profile
            </div>
            <div class="panel-body">
                <div class="col-md-4">
                    @if(Auth::user()->profile->image)
                    <img src="{{asset('assets/images/profile')}}/{{Auth::user()->profile->image}}" style="height: auto; border-radius: 10%; margin-left: 25%;" width="50%" />
                    @else
                    <img src="{{asset('assets/images/profile/defualt.png')}}" style="height: auto; border-radius: 10%; margin-left: 25%;" width="50%" />
                    @endif
                </div>
                <div class="col-md-8">
                    <p><b>Name: </b>{{Auth::user()->name}}</p>
                    <p><b>Email: </b>{{Auth::user()->email}}</p>
                    <p><b>Phone: </b>{{Auth::user()->profile->mobile}}</p>
                    <hr>
                    <p><b>Line1: </b>{{Auth::user()->profile->line1}}</p>
                    <p><b>Line2: </b>{{Auth::user()->profile->line2}}</p>
                    <p><b>City: </b>{{Auth::user()->profile->city}}</p>
                    <p><b>Province: </b>{{Auth::user()->profile->province}}</p>
                    <p><b>Country: </b>{{Auth::user()->profile->country}}</p>
                    <p><b>Zip Code: </b>{{Auth::user()->profile->zipcode}}</p>
                    
                </div>
                <style>
                  .btn {
                  font-weight: 600;
                  font-size: 12px;
                  line-height: 24px;
                  padding: 0.3rem 0.8rem;
                  letter-spacing: 0.5px;
                  box-shadow: 0 2px 6px #acb5f6;
                  background-color: #6777ef;
                  margin: 10px;
                }
                </style>
                <div class="col-md-8 mx-auto">
                <a href="{{route('user.orders')}}" class="btn pull-right" style="color:#ffffff; border:2px solid; border-color: #444444; background-color:#444444;">My orders</a>
                <a href="{{route('user.editprofile')}}" class="btn pull-right" style="color:#ffffff; border:2px solid; border-color: #ff3c45; background-color:#ff3c45;">Update</a>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
