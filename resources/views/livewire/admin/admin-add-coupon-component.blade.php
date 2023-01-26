@section('title')
    Add New Coupon
    @stop
@can('Add New Coupon')
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Add New Coupon</h4>
                            <a href="{{ route('admin.coupons') }}" class="btn btn-primary pull-right">All Coupons</a>
                        </div>
                        <div class="card-body">
                            <div class="table">
                            @if(Session::has('success_message'))
                                <div class="alert alert-success alert-has-icon alert-dismissible fade show" role="alert">
                                    <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
                                    <div class="alert-body">
                                        <div class="alert-title">success</div>
                                        {{Session::get('success_message')}}
                                    </div>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                @endif

                                @if(Session::has('error_message'))
                                <div class="alert alert-danger alert-has-icon alert-dismissible fade show" role="alert">
                                    <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
                                    <div class="alert-body">
                                        <div class="alert-title">error</div>
                                        {{Session::get('error_message')}}
                                    </div>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                @endif
                                <form class="form-horizontal" wire:submit.prevent="storeCoupon">

                                <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Coupon Code
                                        </label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" placeholder="Coupon Code" class="form-control"
                                                wire:model="code">
                                        </div>
                                    </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Coupon Type</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class="form-control" wire:model="type">
                                            <option value="fixed">Fixed</option>
                                            <option value="percent">Percent</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Coupon Value
                                        </label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" placeholder="Coupon Value" class="form-control"
                                                wire:model="value">
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Cart Value
                                        </label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" placeholder="Cart Value" class="form-control"
                                                wire:model="cart_value">
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Expiry Date</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" id="expiry-date" placeholder="YYYY/MM/DD" class="form-control datetimepicker"
                                            wire:model="expiry_date">
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                        <div class="col-sm-12 col-md-7">
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
    </section>
</div>

@push('scripts')
<script>
    $(function(){
        $('#expiry-date').datetimepicker({
            format : 'Y-MM-DD 00:00:00',
        })
        .on('dp.change',function(ev){
        var data = $('#expiry-date').val();
        @this.set('expiry_date',date);
        });
    });
</script>
@endpush

@endcan
