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
			
			<table class="table table-hover">
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
							
								
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
		{{$tag->links()}}
	</div>
@endsection
@section('footer')
    <script type="text/javascript" src="{{asset('js/home.js')}}"></script>
@endsection