@extends('layouts.global')

@section('title') Detail user @endsection

@section('content')
	<div class="col-md-12">
		
		<div class="card">
			<div class="card-body">
				<ul style="list-style: none;">
					<li>
						@if($user->avatar)
							<img src="{{asset('storage/'.$user->avatar)}}" width="250px">
						@else
							No Avatar
						@endif
					</li>
					<li><b>Name : </b>{{$user->name}} | - {{$user->username}}</li>
					<li><b>Email : </b>{{$user->email}}</li>
					<li><b>Phone : </b>{{$user->phone}}</li>
					<li><b>Address : </b>{{$user->address}}</li>
					<li class="mt-3">
						@foreach(json_decode($user->roles) as $role)
						<b>Roles : &middot; </b> {{$role}}
						@endforeach
					</li>
				</ul>
			</div>
		</div>

	</div>
@endsection