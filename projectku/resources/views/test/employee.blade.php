<!DOCTYPE html>
<html>
<head>
	<title>{{$title}}</title>
</head>
<body>

	<h1>Welcome in {{$title}}</h1>

	<table>
		<tr>
			<th>#</th>
			<th>Name</th>
			<th>Email</th>
			<th>Jobdesk</th>
		</tr>

		@foreach($employees as $employee)
		<tr>
			<td>{{$no+=1}}</td>
			<td>{{$employee->name}}</td>
			<td>{{$employee->email}}</td>
			<td>{{$employee->jobdesk}}</td>
		</tr>
		@endforeach
	</table>

</body>
</html>