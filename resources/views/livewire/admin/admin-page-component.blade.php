<div>
    <style>
        nav svg{
            height: 20px;
        }
        nav .hidden{
            display: block !important;
        }
    </style>
    <div class="container" style="padding:30px 0;">
        <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
            <div class="panel-heading">
            <div class="row">
            <div class="col-md-6">
                    All Pages
                <input type="text" class="form-control" placeholder="Search..."  wire:model="searchTearm"/>
            </div>
                <div class="col-md-6">
                    <a href="{{ route('admin.addpage') }}" class="btn btn-danger pull-right">Add New Page</a>   
                </div>
                </div>
                </div>
                <div class="panel-body">
                @if(Session::has('success_message'))
                    <div class = "alert alert-success">
                    <strong>Success</strong> {{Session::get('success_message')}}
                    </div>
                    @endif
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Page Name</th>
                                <th>Date</th>
                                <th>Update Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pages as $page)
                            <tr>
                                <td>{{ $page->id }}</td>
                                <td>{{ $page->title }}</td>
                                <td>{{ $page->created_at }}</td>
                                <td>{{ $page->updated_at }}</td>
                                <td>
                                <a href="{{ route('admin.editpage',['title'=>$page->title]) }}"><i class="fa fa-edit fa-2x"></i></a>
                                <a href="#" wire:click.prevent="deletePage({{ $page->id }})" style="margin-left:10px"><i class="fa fa-times fa-2x text-danger"></i></a>
                                </td>
                                
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $pages->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
</div>
