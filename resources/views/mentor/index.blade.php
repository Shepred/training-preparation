@extends('layout.master')
    @section('content')
		<main role="main" class="container">
      		<div class="row p-3">
      			<div class="col">
      				<h1>Manage Users</h1>
					<table class="table table-striped">
						<thead>
							<tr>
								<th>VATSIM ID</th>
								<th>First Name</th>
								<th>Last Name</th>
								<th>Current Rating</th>
								<th>System Status</th>
								<th>Save</th>
							</tr>
						</thead>
						<tbody>
							@foreach($studentList as $student)
								<form action="{{ url('/mentor') }}" method="POST">
									{{ csrf_field() }}
									<tr>
										<td>{{$student->user_id}}<input type="hidden" name="id" value="{{$student->user_id}}" /></td>
										<td>{{$student->name_first}}</td>
										<td>{{$user->name_last}}</td>
										<td>{{$user->rating}}</td>
										<td>
											<select name="status">
												@foreach($statusList as $status)													
													<option value="{{$status->id}}" @if ($user->status->id == $status->id) selected @endif>{{$status->name}}</option>
													
												@endforeach
											</select>
										</td>
										<td><input type="submit" class="button" value="Save"/></td>
									</tr>
								</form>
							@endforeach
						</tbody>
					</table>
      			</div>
      		</div>
    	</main>
    @endsection