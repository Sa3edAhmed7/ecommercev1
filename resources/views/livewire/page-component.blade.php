<!--main area-->
<main id="main" class="main-site left-sidebar">

<div class="container">

    <div class="wrap-breadcrumb">
        <ul>
            <li class="item-link"><a href="/" class="link">home</a></li>
            <li class="item-link"><span>{{$page['title']}}</span></li>
        </ul>
    </div>
    <div class="row">
    <div class="col-lg-12">
        <div class="card card-danger card-outline">
            <div class="card-body">
            <div class="form-group">
            <div>{!!$page['content']!!}</div>
            </div>
            </div>
            </div>
        </div>
    </div>
</div>
