@section('title')
    View Message
    @stop
@can('View Message')
<!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-body">
            <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
                <div class="card">
                  <div class="boxs mail_listing">
                    <div class="inbox-body no-pad">
                      <section class="mail-list">
                        <div class="mail-sender">
                          <div class="mail-heading">
                            <h4 class="vew-mail-header">
                              <b>Hi Dear, How are you?</b>
                            </h4>
                          </div>
                          <hr>
                          <div class="media">
                            <div class="media-body">
                              <span class="date pull-right"><strong>{{$contact->created_at}}</strong></span>
                              <h5 class="text-primary">{{$contact->name}}</h5>
                              <small class="text-muted"><strong>From: {{$contact->email}}</strong></small>
                            </div>
                          </div>
                        </div>
                        <div class="view-mail p-t-20">
                          <p><strong style="color:#000000;">{{$contact->comment}}</strong></p>
                        </div>
                      </section>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>

  @endcan