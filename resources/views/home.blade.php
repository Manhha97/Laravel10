@extends('layouts.admin')

@section('content')

<div class="container table-responsive">
    <h2 style="color: red">Quản lí bài viết </h2>

    @if(session('noti'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Thông báo: </strong>{{session('noti')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fas fa-times-circle"></i></span>
            </button>
        </div>
    @endif()

    <a href="{{asset('')}}admin/addpost" class="btn btn-success" type="button">ADD POST <i class="fas fa-plus-circle"></i></a>
    <br><br>

    <table class="table table-bordered" id="posts-table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Title</th>
                <th>Author</th>
                <th>Avatar</th>
                <th>Action</th>
            </tr>
        </thead>
    </table>
</div>
<div class="modal fade" id="show">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" style="color: red">Nội dung bài viết</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>    
            </div>
            <div class="modal-body">
                <p id="title"></p>
                <div style="width: 30px, height: 30px"><img src="" id="img" alt="" style="width:80%"></div>
                <p id="content"></p>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
@endsection
@section('footer')
    <script type="text/javascript" src="{{asset('js/home.js')}}"></script>
@endsection

