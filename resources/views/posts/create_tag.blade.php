@extends('layouts.admin')

@section('content')
	<div class="container">
		<form action="{{asset('')}}admin/storetag" method="POST" role="form">
			@csrf
			<legend style="color: red">Thêm mới Tags</legend>
		
			<div class="form-group">
				<label for="">Name (*)</label>
				<input type="text" class="form-control" id="name" name="name" placeholder="Name" >
			</div>
			@if($errors->has('name'))
                <p style="color: red">{{$errors->first('name')}}</p>
            @endif
			<div class="form-group">
				<label for="">Slug (*)</label>
				<input type="text" class="form-control" id="slug" name="slug" placeholder="Slug">
			</div>
			@if($errors->has('slug'))
                <p style="color: red">{{$errors->first('slug')}}</p>
            @endif
			<button type="submit" class="btn btn-primary">Thêm</button>
		</form>
	</div>
@endsection
@section('footer')
    <script type="text/javascript" src="{{asset('js/home.js')}}"></script>
@endsection