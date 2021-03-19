@extends("layouts.global")

@section("title").Users.list @endsection

@section("content")

	@if(session('status'))
		<div class="alert alert-success">
			{{session('status')}}
		</div>
	@endif

	<form action="{{route('users.index')}}">

		<div class="row">
			
			<div class="col-md-6">
				
				<input type="text" name="keyword" class="form-control" value="{{Request::get('keyword')}}" placeholder="Masukan email untuk filter ... ">

			</div>

			<div class="col-md-6">
				
				<input {{Request::get('status') == 'ACTIVE' ? 'checked' : ''}} type="radio" name="status" value="ACTIVE" id="active" class="form-control">
				<label for="active">Active</label>

				<input {{Request::get('status') == 'INACTIVE' ? 'checked' : ''}} value="INACTIVE" type="radio" name="status" class="form-control" id="inactive">
				<label for="inactive">Inactive</label>

				<button type="submit" class="btn btn-dark">Filter</button>
			</div>

		</div>
		

	</form>

	<div class="row">
		<div class="col-md-12 mb-5 text-right">
			<a href="{{route('users.create')}}" class="btn btn-outline-primary">Create User</a>
		</div>
	</div>

	<table class="table table-bordered">
		<thead>
			<tr>
				<th>#</th>
				<th>Name</th>
				<th>Username</th>
				<th>Email</th>
				<th>Avatar</th>
				<th>Status</th>
				<th>Action</th>
			</tr>
		</thead>
			<tbody>
				@php
					$no = 1
				@endphp
				
				@foreach($users as $user)
					<tr>
						<td>{{$no++}}</td>
						<td>{{$user->name}}</td>
						<td>{{$user->username}}</td>
						<td>{{$user->email}}</td>
						<td>
							@if($user->avatar)
								<img src="{{asset('storage/'.$user->avatar)}}" width="70px">
							@else
								N/A
							@endif
						</td>
						<td>
							@if($user->status == "ACTIVE")
								<span class="badge badge-success">
									{{$user->status}}
								</span>
							@else
								<span class="badge badge-danger">{{$user->status}}</span>
							@endif
						</td>
						<td>
							<a href="{{route('users.edit', [$user->id])}}" class="btn btn-outline-success btn-sm">Edit</a>
						
							<form onsubmit="return confirm('Delete this user permanently?')" class="d-inline" action="{{route('users.destroy', [$user->id])}}" method="POST">
								@csrf
								
								<input type="hidden" name="_method" value="DELETE">
								<button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
							</form>

							<a href="{{route('users.show', [$user->id])}}" class="btn btn-outline-primary btn-sm">Detail</a>
						</td>
					</tr>
				@endforeach
			</tbody>

			<tfoot>
				<tr>
					<td colspan=10>
						{{$users->appends(Request::all())->links()}}
					</td>
				</tr>
			</tfoot>
	</table>	
@endsection
