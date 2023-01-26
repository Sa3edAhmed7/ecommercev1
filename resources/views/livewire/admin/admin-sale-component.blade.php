@section('title')
    Sale Setting
    @stop
@can('Sale Setting')
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Sale Setting</h4>
                            <a href="{{ route('admin.dashboard') }}" class="btn btn-primary pull-right">Dashboard</a>
                        </div>
                        <div class="card-body">
                            <div class="table">
                            @if(Session::has('success_message'))
                                <div class="alert alert-success alert-has-icon">
                                    <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
                                    <div class="alert-body">
                                        <div class="alert-title">success</div>
                                        {{Session::get('success_message')}}
                                    </div>
                                </div>
                                @endif

                                @if(Session::has('error_message'))
                                <div class="alert alert-danger alert-has-icon">
                                    <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
                                    <div class="alert-body">
                                        <div class="alert-title">error</div>
                                        {{Session::get('error_message')}}
                                    </div>
                                </div>
                                @endif
                                <form class="form-horizontal" wire:submit.prevent="updateSale">

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class="form-control" wire:model="status">
                                            <option value="0">Inactive</option>
                                            <option value="1">Active</option>
                                        </select>
                                    </div>
                                </div>

                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Sale Date</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" id="sale-date" placeholder="YYYY/MM/DD H:M:S" class="form-control datetimepicker"
                                            wire:model="sale_date">
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                        <div class="col-sm-12 col-md-7">
                                            <button type="submit" class="btn btn-primary">Save</button>
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
        $('#sale-date').datetimepicker({
            format : 'Y-MM-DD h:m:s',
        })
        .on('dp.change',function(ev){
        var data = $('#sale-date').val();
        @this.set('sale_date',date);
        });
    });
</script>
@endpush

@endcan