@extends('layouts.admin')

@section('content')
<div class="content">
    <div class="row">
        <div class="col-12">
        <form action="{{route('user.store')}}" enctype="multipart/form-data" method="POST" role="form">
            @csrf
            <legend style="color: red"><h3>Thêm mới bài viết</h3></legend>
        
            <div class="form-group">
                <label for="">Title(*)</label>
                <input type="text" class="form-control" id="" placeholder="Input field" name="title" value="{{old('title')}}">
            </div>
            @if($errors->has('title'))
                <p style="color: red">{{$errors->first('title')}}</p>
            @endif
            <div class="form-group">
                <label for="">Description(*)</label>
                <input type="text" class="form-control" id="" placeholder="Input field" name="description" value="{{old('description')}}">
            </div>
            @if($errors->has('description'))
                <p style="color: red">{{$errors->first('description')}}</p>
            @endif
            <div class="form-group">
                <label for="">Contents(*)</label>
                <textarea class="form-control" id="contents" name="content" rows="3" value="">{!!old('content')!!}</textarea >
                    <script>
                        CKEDITOR.replace( 'contents' );
                    </script>
            </div>
            @if($errors->has('content'))
                <p style="color: red">{{$errors->first('content')}}</p>
            @endif


            <div>
                <label for="">Image</label>
                <br>
                <input multiple type="file" name="thumbnail" id="fileToUpload">
                
            </div>

            <!-- <div class="form-group">
                <label for="">Image</label>
                <input type="text" class="form-control" id="" placeholder="Input field" name="thumbnail" value="{{old('thumbnail')}}">
            </div>  -->
            @if($errors->has('thumbnail'))
                <p style="color: red">{{$errors->first('thumbnail')}}</p>
            @endif

            <div class="form-group">
                <label for="">Tags</label>
                <select class="select_tag form-control" name="tags[]">
                    @foreach($tags as $tag)
                        <option value="{{$tag->id}}">{!!$tag['name']!!}</option>
                    @endforeach                       
                </select>
            </div>

            <div class="form-group">
                <label for="">Danh mục</label>
                <select name="category_id" class="form-control">
                <?php foreach ($categories as $catgr) {
                ?>
                  <option value="<?= $catgr['id']?>"><?= $catgr['name']?></option>
                <?php } ?>
                  
                </select>
            </div>
            <input type="hidden" name="user_id" id="" class="form-control" value="{{Auth::user()->id}}">
            <!-- <div class="form-group">
                <label for="">Author</label>
                <input type="text" class="form-control" id="" placeholder="Input field" name="name">
            </div> -->
            <button type="submit" name="submit" class="btn btn-primary">Thêm</button>
            </form>

        </div>
    </div>
</div>
@endsection