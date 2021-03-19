
{{-- {{var_dump(json_decode($user->roles))}} --}}

@extends('layouts.global')

@section('title') Edit user {{$user->name}} @endsection

@section('content')
	<div class="col-md-8">
		
		@if(session('status'))

			<div class="alert alert-success">
				{{session('status')}}
			</div>

		@endif

		<form enctype="multipart/form-data" class="bg-white shadow-sm p-3" action="{{route('users.update', [$user->id])}}" method="POST">

			@csrf

			<input type="hidden" value="PUT" name="_method">

			<label for="name">Name</label>
			<input type="text" value="{{$user->name}}" class="form-control" placeholder="Full Name" name="name" id="name">
			<br>

			<label for="username">Username</label>

			<input type="text" value="{{$user->username}}" disabled class="form-control" id="username" name="username">
			<br>

			<label for="">Status</label>
			<input {{$user->status == "ACTIVE" ? "checked" : ""}} value="ACTIVE" type="radio" class="form-control" id="active" name="status">
			<label for="active">Active</label>

			<input {{$user->status == "ACTIVE" ? "checked" : ""}} value="INACTIVE" type="radio" class="form-control" id="inactive" name="status">
			<br>

			<label for="">Roles</label>
			<br>
			<input type="checkbox" {{in_array("ADMIN", json_decode($user->roles)) ? "checked" : ""}} name="roles[]" id="ADMIN" value="ADMIN">
			<label for="ADMIN">Administrator</label>
			
			<input type="checkbox" {{in_array("STAFF", json_decode($user->roles)) ? "checked" : ""}} name="roles[]" id="STAFF" value="STAFF">
			<label for="STAFF">Staff</label>

			<input type="checkbox" {{in_array("CUSTOMER", json_decode($user->roles)) ? "checked" : ""}} name="roles[]" id="CUSTOMER" value="CUSTOMER">
			<label for="CUSTOMER">Customer</label>
			<br>
			<br>

			<label for="phone">Phone</label>
			<input type="text" name="phone" class="form-control" value="{{$user->phone}}">
			<br>

			<label for="address">Address</label>
			<textarea name="address" id="address" class="form-control">{{$user->address}}</textarea>
			<br>

			<label for="avatar">Avatar Image</label>
			<br>
			Current avatar : <br>
			@if($user->avatar)
				<img src="{{asset('storage/'.$user->avatar)}}" width="120px">
				<br>
			@else
				No Avatar
			@endif
			<br>

			<input type="file" id="avatar" name="avatar" class="form-control">
				<small class="text-muted">Kosongkan jika tidak ingin mengubah avatar</small>
			<hr class="my-3">

			<label for="email">Email</label>
			<input type="text" value="{{$user->email}}" disabled class="form-control" placeholder="user@email.com" name="email" id="email">

			<button type="submit" class="btn btn-primary">Save</button>

		</form>

	</div>
@endsection

