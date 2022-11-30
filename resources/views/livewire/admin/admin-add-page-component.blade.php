<div>
    <div class="container" style="padding:30px 0;">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                <div class="col-md-6">
                    Add New Page
                </div>
                <div class="col-md-6">
                    <a href="{{ route('admin.pages') }}" class="btn btn-success pull-right">All Pages</a>
                </div>
                </div>
                </div>
                <div class="panel-body">
                @if(Session::has('success_message'))
                    <div class = "alert alert-success">
                    <strong>Success</strong> {{Session::get('success_message')}}
                    </div>
                    @endif
                    <form class="form-horizontal" wire:submit.prevent="storePage">
                    <div class="form-group">
                        <label class="col-md-4 control-label">Title</label>
                        <div class="col-md-4">
                    <input type="text" name="title" placeholder="Title" class="form-control input-md" wire:model="title" />
                    @error('title') <p class="text-danger">{{$message}}</p> @enderror
                    </div>
                </div>
                <div class="form-group">
                        <label class="control-label">Content</label>
                        <div wire:ignore>
                    <textarea class="form-control" id="content" placeholder="Content" wire:model="content"></textarea>
                    @error('content') <p class="text-danger">{{$message}}</p> @enderror
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

@push('scripts')
<script>
    $(function(){
    tinymce.init({
    selector: 'textarea',
    plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
    toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
    setup:function(editor){
                editor.on('Change',function(e){
                    tinyMCE.triggerSave();
                    var sd_data = $('#content').val();
                    @this.set('content',sd_data);
                });
            }
        });
    });
</script>
@endpush



