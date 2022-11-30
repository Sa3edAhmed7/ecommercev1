<div>
    <div class="container" style="padding:30px 0;">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                <div class="col-md-6">
                    AboutPayment
                </div>
                </div>
                </div>
                <div class="panel-body">
                @if(Session::has('message'))
                    <div class = "alert alert-success">
                    <strong>Success</strong> {{Session::get('message')}}
                    </div>
                    @endif
                    <form class="form-horizontal" wire:submit.prevent="saveAboutPayment">
                        <div class="form-group">
                        <label class="col-md-4 control-label">Free Shipping</label>
                        <div class="col-md-4">
                    <input type="text" placeholder="Free Shipping" class="form-control input-md" wire:model="freeshipping" />
                    @error('freeshipping') <p class="text-danger">{{$message}}</p>  @enderror
                    </div>
                </div>

                <div class="form-group">
                        <label class="col-md-4 control-label">Guarantee</label>
                        <div class="col-md-4">
                    <input type="text" placeholder="Guarantee" class="form-control input-md" wire:model="guarantee" />
                    @error('guarantee') <p class="text-danger">{{$message}}</p>  @enderror
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
