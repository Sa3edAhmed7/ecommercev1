<div class="settingSidebar" style="display: block;">
    <a href="javascript:void(0)" class="settingPanelToggle"> <i data-feather="mail"></i>
    </a>
    <div class="settingSidebar-body ps-container ps-theme-default">
        <div class="fade show active">
            <style>
                .selecuser:hover {
                  background-color: #f0f3ff;
                }
                </style>

            <div class="p-15 border-none">


                <h6 class="font-medium m-b-10">Users</h6>
                <div class="card-body">
                    <ul class="list-unstyled list-unstyled-border">
                    @foreach ($users as $user)
                    @if ($user->utype != 'USR')
                      <li class="media selecuser" wire:click='checkconversation({{$user->id}})'>
                        <img alt="image" class="mr-3 rounded-circle" width="50" src="{{asset('assets/images/profile')}}/{{ $user->profile_photo_path }}">
                        <div class="media-body">
                          <div class="mt-0 mb-1 font-weight-bold">{{$user->name}}</div>
                        </div>
                      </li>
                      @else
                      @endif
                      @endforeach
                    </ul>
                  </div>
            </div>
        </div>
    </div>
</div>
