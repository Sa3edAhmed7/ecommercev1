@section('title')
    Profile
    @stop
@can('Profile')
<div class="main-content">
        <section class="section">
          <div class="section-body">
            <div class="row">
              <div class="col-12 col-sm-12 col-lg-5">
                <div class="card profile-widget">
                  <div class="profile-widget-header">
                  @if($user->profile->image)
                    <img src="{{asset('assets/images/profile')}}/{{$user->profile->image}}" class="rounded-circle profile-widget-picture" />
                    @else
                    <img src="{{asset('assets/images/profile/defualt.png')}}" class="rounded-circle profile-widget-picture" />
                    @endif
                  </div>
                  <div class="profile-widget-description pb-0">
                    <div class="profile-widget-name">{{$user->name}} <div class="text-muted d-inline font-weight-normal">
                        <div class="slash"></div> {{$user->utype}}
                      </div>
                    </div>
                    <p><b>Name: </b>{{$user->name}}</p>
                    <p><b>Email: </b>{{$user->email}}</p>
                    <p><b>Phone: </b>{{$user->profile->mobile}}</p>
                    <hr>
                    <p><b>Line1: </b>{{$user->profile->line1}}</p>
                    <p><b>Line2: </b>{{$user->profile->line2}}</p>
                    <p><b>City: </b>{{$user->profile->city}}</p>
                    <p><b>Province: </b>{{$user->profile->province}}</p>
                    <p><b>Country: </b>{{$user->profile->country}}</p>
                    <p><b>Zip Code: </b>{{$user->profile->zipcode}}</p>
                    
                  </div>
                  <div class="card-footer text-center pt-0">
                  <a href="{{route('admin.editprofile')}}" class="btn btn-primary following-btn" style="color:#fff;">Update</a>
                  </div>
                </div>
</div>

@endcan