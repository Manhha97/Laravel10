@extends('layouts.admin')

@section('content')
	<div class="container">
		<form action="{{asset('')}}admin/updatetag/{{$tag->id}}" method="POST" role="form">
			@csrf
			{{ method_field('put')}}
			<legend style="color: red">Sửa danh mục Tags</legend>
		
			<div class="form-group">
				<label for="">Name (*)</label>
				<input type="text" class="form-control" id="name" name="name" value="{{$tag->name}}">
			</div>
			@if($errors->has('name'))
                <p style="color: red">{{$errors->first('name')}}</p>
            @endif
			<div class="form-group">
				<label for="">Slug (*)</label>
				<input type="text" class="form-control" id="slug" name="slug" value="{{$tag->slug}}">
			</div>
			@if($errors->has('slug'))
                <p style="color: red">{{$errors->first('slug')}}</p>
            @endif
			<button type="submit" class="btn btn-primary">Update</button>
		</form>
	</div>
@endsection
@section('footer')
    <script type="text/javascript" src="{{asset('js/home.js')}}"></script>
@endsection