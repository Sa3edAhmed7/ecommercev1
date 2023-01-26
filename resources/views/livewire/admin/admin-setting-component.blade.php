@section('title')
  Settings Web
  @stop
@can('Settings Web')
<div class="main-content">
        <section class="section">
          <div class="section-body">
            <div class="row mt-sm-4">
              <div class="col-12 col-md-12 col-lg-4">
                <div class="card author-box">
                  <div class="card-body">
                  <?php
                    $test_orig_image = "{{asset('assets')}}/images/profile/{{ $user->profile_photo_path }}";
                    $my_deafult_image ="../assets/images/profile/$user->profile_photo_path";
                    ?>
                    <div class="author-box-center">
                      <img alt="image" src="<?= check_image_exists($test_orig_image, $my_deafult_image); ?>" class="rounded-circle author-box-picture">
                      <div class="clearfix"></div>
                      <div class="author-box-name">
                        <a href="{{route('admin.profile')}}">{{Auth::user()->name}}</a>
                      </div>
                      <div class="author-box-job">{{Auth::user()->utype}}</div>
                    </div>
                    <div class="text-center">
                      <div class="author-box-description">
                        <p>
                        {{Auth::user()->email}}
                        </p>
                      </div>
                      <a href="#" class="btn btn-social-icon mr-1 btn-facebook">
                        <i class="fab fa-facebook-f"></i>
                      </a>
                      <a href="#" class="btn btn-social-icon mr-1 btn-twitter">
                        <i class="fab fa-twitter"></i>
                      </a>
                      <a href="#" class="btn btn-social-icon mr-1 btn-github">
                        <i class="fab fa-github"></i>
                      </a>
                      <a href="#" class="btn btn-social-icon mr-1 btn-instagram">
                        <i class="fab fa-instagram"></i>
                      </a>
                      <div class="w-100 d-sm-none"></div>
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-header">
                    <h4>Settings Details</h4>
                  </div>
                  <div class="card-body">
                    <div class="py-4">
                      <p class="clearfix">
                        <span class="float-left" style="color:#6777ef;">
                            Email
                        </span>
                        <span class="float-right text-muted">
                          <strong style="color:#000000;">{{$setting->email}}</strong>
                        </span>
                      </p>
                      <p class="clearfix">
                        <span class="float-left" style="color:#6777ef;">
                          Phone
                        </span>
                        <span class="float-right text-muted">
                        <strong style="color:#000000;">{{$setting->phone}}</strong>
                        </span>
                      </p>
                      <p class="clearfix">
                        <span class="float-left" style="color:#6777ef;">
                          Phone2
                        </span>
                        <span class="float-right text-muted">
                        <strong style="color:#000000;">{{$setting->phone2}}</strong>
                        </span>
                      </p>
                      <p class="clearfix">
                        <span class="float-left" style="color:#6777ef;">
                          Address
                        </span>
                        <span class="float-right text-muted">
                        <strong style="color:#000000;">{{$setting->address}}</strong>
                        </span>
                      </p>
                      <p class="clearfix">
                        <span class="float-left" style="color:#6777ef;">
                          Map
                        </span>
                        <span class="float-right text-muted">
                        <div class="wrap-map">
                            <iframe src="{{ $setting->map }}" width="100%" height="320" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                        </div>
                        </span>
                      </p>
                    </div>
                    <p class="clearfix">
                      <div class="text-center">
                        <strong style="color:#000000;"><a href="{{$setting->facebook}}">
                          <i data-feather="facebook"></i></a></strong>
                          <strong style="color:#000000;"><a href="{{$setting->twiter}}">
                          <i data-feather="twitter"></i></a></strong> 
                          <strong style="color:#000000;"><a href="{{$setting->pinterest}}">
                          <i class="fa fa-pinterest" aria-hidden="true"></i></a></strong>
                          <strong style="color:#000000;"><a href="{{$setting->instagram}}">
                          <i data-feather="instagram"></i></a></strong> 
                          <strong style="color:#000000;"><a href="{{$setting->youtube}}">
                          <i data-feather="youtube"></i></a></strong>
                      </div>
                      </p>
                  </div>
                </div>
              </div>
              <div class="col-12 col-md-12 col-lg-8">
                <div class="card">
                  <div class="padding-20">
                    <ul class="nav nav-tabs" id="myTab2" role="tablist">
                      <li class="nav-item">
                        <a class="nav-link active" id="home-tab2" data-toggle="tab" href="#settings" role="tab"
                          aria-selected="true">Setting</a>
                      </li>
                    </ul>
                    <div class="tab-content tab-bordered" id="myTab3Content">
                      <div class="tab-pane fade show active" id="settings" role="tabpanel" aria-labelledby="home-tab2">
                        <div class="row">   
                        </div>
                        @if(Session::has('message'))
                                <div class="alert alert-info alert-has-icon">
                                    <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
                                    <div class="alert-body">
                                        <div class="alert-title">success</div>
                                        {{Session::get('message')}}
                                    </div>
                                </div>
                                @endif
                        <form method="post" class="needs-validation" wire:submit.prevent="saveSettings">
                          <div class="card-header">
                            <h4>Edit Settings</h4>
                          </div>
                          <div class="card-body">
                            <div class="row">
                              <div class="form-group col-md-6 col-12">
                                <label>Email</label>
                                <input type="email" class="form-control" wire:model="email">
                                @error('email') <p class="text-danger">{{$message}}</p>  @enderror
                              </div>
                              <div class="form-group col-md-6 col-12">
                                <label>Phone</label>
                                <input type="tel" class="form-control" wire:model="phone">
                                @error('phone') <p class="text-danger">{{$message}}</p>  @enderror
                              </div>
                            </div>
                            <div class="row">
                              <div class="form-group col-md-6 col-12">
                                <label>phone2</label>
                                <input type="tel" class="form-control" wire:model="phone2">
                                @error('phone2') <p class="text-danger">{{$message}}</p>  @enderror
                              </div>
                              <div class="form-group col-md-6 col-12">
                                <label>Facebook</label>
                                <input type="text" class="form-control" wire:model="facebook">
                                @error('facebook') <p class="text-danger">{{$message}}</p>  @enderror
                              </div>
                            </div>
                            <div class="row">
                            <div class="form-group col-md-6 col-12">
                                <label>Twiter</label>
                                <input type="text" class="form-control" wire:model="twiter">
                                @error('twiter') <p class="text-danger">{{$message}}</p>  @enderror
                              </div>
                              <div class="form-group col-md-6 col-12">
                                <label>Pinterest</label>
                                <input type="text" class="form-control" wire:model="pinterest">
                                @error('pinterest') <p class="text-danger">{{$message}}</p>  @enderror
                              </div>
                            </div>
                            <div class="row">
                            <div class="form-group col-md-6 col-12">
                                <label>Instagram</label>
                                <input type="text" class="form-control" wire:model="instagram">
                                @error('instagram') <p class="text-danger">{{$message}}</p>  @enderror
                              </div>
                              <div class="form-group col-md-6 col-12">
                                <label>Youtube</label>
                                <input type="text" class="form-control" wire:model="youtube">
                                @error('youtube') <p class="text-danger">{{$message}}</p>  @enderror
                              </div>
                            </div>
                            <div class="row">
                              <div class="form-group col-12">
                                <label>Address</label>
                                <textarea
                                  class="form-control" wire:model="address"></textarea>
                                @error('address') <p class="text-danger">{{$message}}</p>  @enderror
                              </div>
                              <div class="form-group col-12">
                                <label>Map</label>
                                <textarea
                                  class="form-control" wire:model="map"></textarea>
                                @error('map') <p class="text-danger">{{$message}}</p>  @enderror
                              </div>
                            </div>
                          </div>
                          <div class="card-footer text-right">
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                          </div>
                        </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>

  @endcan