@section('title')
    Edit Page
    @stop
@can('Edit Page')
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Page</h4>
                            <a href="{{ route('admin.pages') }}" class="btn btn-primary pull-right">All Pages</a>
                        </div>
                        <div class="card-body">
                            <div class="table">
                                @if(Session::has('error_message'))
                                <div class="alert alert-danger alert-has-icon">
                                    <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
                                    <div class="alert-body">
                                        <div class="alert-title">error</div>
                                        {{Session::get('error_message')}}
                                    </div>
                                </div>
                                @endif
                                <form class="form-horizontal" wire:submit.prevent="updatePage">
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Title
                                        </label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" placeholder="Title" class="form-control"
                                                wire:model="title">
                                            @error('title') <p class="text-danger">{{$message}}</p> @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label
                                            class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Content</label>
                                        <div class="col-sm-12" wire:ignore>
                                            <textarea class="form-control" id="content" placeholder="Content"
                                                wire:model="content"></textarea>
                                            @error('content') <span class="text-danger">{{$message}}</span> @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                        <div class="col-sm-12 col-md-7">
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
    </section>
</div>

@push('scripts')
<script>
$(function() {
    tinymce.init({
        selector: 'textarea',
        plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
        toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
        setup: function(editor) {
            editor.on('Change', function(e) {
                tinyMCE.triggerSave();
                var sd_data = $('#content').val();
                @this.set('content', sd_data);
            });
        }
    });
});
</script>
@endpush

@endcan