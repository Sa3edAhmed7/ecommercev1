<div class="main-content">
    <section class="section">
      <div class="section-body">
        <h2 class="section-title">{{$notificationtime->format('Y M D')}}</h2>
        <div class="row">
          <div class="col-12">
            <div class="activities">
            @foreach(auth()->user()->Notifications as $notification)
              <div class="activity">
                <div class="activity-icon bg-primary text-white">
                  <i class="fas fa-bell"></i>
                </div>
                <div class="activity-detail">
                  <div class="mb-2">
                    <img alt=""
                    src="{{asset('assets/images/profile')}}/{{ $notification->data['photo']}}" class="user-img-radious-style" width='30px'></a>
                    <span class="text-job"><strong>{{ $notification->data['user'] }}</strong></span>
                  </div>
                  <p style="color: #6777ef !important"><strong> {{ $notification->data['title'] }}</strong></p>
                  <span class="text-job"><strong>{{ $notification->created_at->format('d/m/Y h:m:s') }}</strong></span>
                </div>
              </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>