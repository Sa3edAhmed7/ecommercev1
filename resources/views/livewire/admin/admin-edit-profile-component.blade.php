@section('title')
    Update Profile
    @stop
@can('Update Profile')

<div class="main-content">
    <section class="section">
      <div class="section-body">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="padding-20">
                <ul class="nav nav-tabs" id="myTab2" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="home-tab2" data-toggle="tab" href="#settings" role="tab"
                      aria-selected="true">Update Profile</a>
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
                    <form method="post" class="needs-validation" wire:submit.prevent="updateProfile">
                      <div class="card-header">
                        <div id="image-preview" class="image-preview rounded-circle">
                            <input type="file" name="image" id="image-upload" wire:model="newimage" />
                            <i data-feather="image" class="bell"></i>
                            @if($newimage)
                            <img src="{{$newimage->temporaryUrl()}}"  width="100%">
                            @elseif($image)
                            <img src="{{asset('assets/images/profile')}}/{{$image}}" width="100%" />
                            @else
                            <img src="{{asset('assets/images/profile/defualt.png')}}" width="100%" />
                            @endif
                          </div>
                      </div>
                      <div class="text-center">
                        <div class="author-box-description">
                          <p style="color:#6777ef;">
                          <strong>{{Auth::user()->email}}</strong>
                          </p>
                        </div>
                        <div class="w-100 d-sm-none"></div>
                      </div>
                    </div>
                      <div class="card-body">
                        <div class="row">
                          <div class="form-group col-md-6 col-12">
                            <label>Name</label>
                            <input type="text" class="form-control" wire:model="name">
                            @error('name') <p class="text-danger">{{$message}}</p>  @enderror
                          </div>
                          <div class="form-group col-md-6 col-12">
                            <label>Phone</label>
                            <input type="tel" class="form-control" wire:model="mobile">
                            @error('mobile') <p class="text-danger">{{$message}}</p>  @enderror
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group col-md-6 col-12">
                            <label>Line1</label>
                            <input type="text" class="form-control" wire:model="line1">
                            @error('line1') <p class="text-danger">{{$message}}</p>  @enderror
                          </div>
                          <div class="form-group col-md-6 col-12">
                            <label>Line2</label>
                            <input type="text" class="form-control" wire:model="line2">
                            @error('line2') <p class="text-danger">{{$message}}</p>  @enderror
                          </div>
                        </div>
                        <div class="row">
                        <div class="form-group col-md-6 col-12">
                            <label>City</label>
                            <input type="text" class="form-control" wire:model="city">
                            @error('city') <p class="text-danger">{{$message}}</p>  @enderror
                          </div>
                          <div class="form-group col-md-6 col-12">
                            <label>Province</label>
                            <input type="text" class="form-control" wire:model="province">
                            @error('province') <p class="text-danger">{{$message}}</p>  @enderror
                          </div>
                        </div>
                        <div class="row">
                        <div class="form-group col-md-6 col-12">
                            <label>Country</label>
                            <input type="text" class="form-control" wire:model="country">
                            @error('country') <p class="text-danger">{{$message}}</p>  @enderror
                          </div>
                          <div class="form-group col-md-6 col-12">
                            <label>Zip Code</label>
                            <input type="text" class="form-control" wire:model="zipcode">
                            @error('zipcode') <p class="text-danger">{{$message}}</p>  @enderror
                          </div>
                        </div>
                      </div>
                      <div class="card-footer text-right">
                        <button type="submit" class="btn btn-primary">Update Profile</button>
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
