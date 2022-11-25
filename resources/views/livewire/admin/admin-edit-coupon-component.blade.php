<div>
    <div class="container" style="padding:30px 0;">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                <div class="col-md-6">
                    Edit Coupon
                </div>
                <div class="col-md-6">
                    <a href="{{ route('admin.coupons') }}" class="btn btn-success pull-right">All Coupons</a>
                </div>
                </div>
                </div>
                <div class="panel-body">
                @if(Session::has('success_message'))
                    <div class = "alert alert-success">
                    <strong>Success</strong> {{Session::get('success_message')}}
                    </div>
                    @endif
                    <form class="form-horizontal" wire:submit.prevent="updateCoupon">
                        <div class="form-group">
                        <label class="col-md-4 control-label">Coupon Code</label>
                        <div class="col-md-4">
                    <input type="text" placeholder="Coupon Code" class="form-control input-md" wire:model="code" />
                    </div>
                </div>

                <div class="form-group">
                        <label class="col-md-4 control-label">Coupon Type</label>
                        <div class="col-md-4">
                    <select class="form-control" wire:model="type" >
                        <option value="">Select</option>
                        <option value="fixed">Fixed</option>
                        <option value="percent">Percent</option>
                    </select>
                    </div>
                </div>

                <div class="form-group">
                        <label class="col-md-4 control-label">Coupon Value</label>
                        <div class="col-md-4">
                    <input type="text" placeholder="Coupon Value" class="form-control input-md" wire:model="value" />
                    </div>
                </div>

                <div class="form-group">
                        <label class="col-md-4 control-label">Cart Value</label>
                        <div class="col-md-4">
                    <input type="text" placeholder="Cart Value" class="form-control input-md" wire:model="cart_value" />
                    </div>
                </div>

                <div class="form-group">
                            <label class="col-md-4 control-label">Expiry Date</label>
                            <div class="col-md-4">
                                <input type="text" id="expiry-date" placeholder="YYYY/MM/DD" class="form-control input-md" wire:model="expiry_date">
                            </div>
                        </div>

                <div class="form-group">
                        <label class="col-md-4 control-label"></label>
                        <div class="col-md-4">
                    <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</div>


@push('scripts')
<script>
    $(function(){
        $('#expiry-date').datetimepicker({
            format : 'Y-MM-DD 00:00:00',
        })
        .on('dp.change',function(ev){
        var data = $$('#expiry-date').val();
        @this.set('expiry_date',date);
        });
    });
</script>
@endpush