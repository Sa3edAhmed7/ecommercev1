<div>
    <div class="container" style="padding:30px 0;">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                <div class="col-md-6">
                    Links App
                </div>
                </div>
                </div>
                <div class="panel-body">
                @if(Session::has('message'))
                    <div class = "alert alert-success">
                    <strong>Success</strong> {{Session::get('message')}}
                    </div>
                    @endif
                    <form class="form-horizontal" wire:submit.prevent="saveLinkApp">
                        <div class="form-group">
                        <label class="col-md-4 control-label">Google Play</label>
                        <div class="col-md-4">
                    <input type="text" placeholder="Google Play Link" class="form-control input-md" wire:model="googleplay" />
                    @error('googleplay') <p class="text-danger">{{$message}}</p>  @enderror
                    </div>
                </div>

                <div class="form-group">
                        <label class="col-md-4 control-label">App Store</label>
                        <div class="col-md-4">
                    <input type="text" placeholder="App Store Link" class="form-control input-md" wire:model="appstore" />
                    @error('appstore') <p class="text-danger">{{$message}}</p>  @enderror
                    </div>
                </div>

                <div class="form-group">
                        <label class="col-md-4 control-label"></label>
                        <div class="col-md-4">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>

                </form>
            </div>
        </div>
    </div>
</div>
</div>
</div>
