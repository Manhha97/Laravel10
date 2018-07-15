@extends('layouts.admin')

@section('content')
	<div class="container">
		<div class="table-responsive">
			@if(session()->has('flag'))
				<div class="alert alert-success">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					{{session()->get('flag')}}
				</div>
			@endif
			<h2 style="color: red">Danh mục Tags</h2>
			<br>
			<table class="table table-hover" id="tags-table">
				<thead>
					<tr>
						<th>STT</th>
						<th>Name</th>
						<th>Slug</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach($tag as $tag)
						<tr>
						<td>{{$tag->id}}</td>
						<td>{{$tag->name}}</td>
						<td>{{$tag->slug}}</td>
						<td>
							<a  href="{{asset('')}}admin/edittag/{{$tag->id}}">
								<button  class="btn btn-primary"><i class="fas fa-edit"></i></button>
							</a>
							<form action="{{asset('')}}admin/delete/{{$tag->id}}" style="display:inline-block;" method="post">
								@csrf
								<input type="hidden" name="_method" value="delete">
								<button  class="btn btn-danger btn-del"><i class="fas fa-trash-alt"></i></button>
							</form>		
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
		
	</div>
@endsection
@section('footer')
    <script type="text/javascript" src="{{asset('js/home.js')}}"></script>
@endsection