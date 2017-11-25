@extends('admin-layout.master')
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
								<th>Assigned Mentor</th>
								<th>Mentor</th>
								<th>Save</th>
							</tr>
						</thead>
						<tbody>
							@foreach($userList as $user)
								<form action="{{ url('/admin/users') }}" method="POST">
									{{ csrf_field() }}
									<tr>
										<td>{{$user->id}}<input type="hidden" name="id" value="{{$user->id}}" /></td>
										<td>{{$user->name_first}}</td>
										<td>{{$user->name_last}}</td>
										<td>{{$user->rating}}</td>
										<td>
											<select name="status">
												@foreach($statusList as $status)													
													<option value="{{$status->id}}" @if ($user->status->id == $status->id) selected @endif>{{$status->name}}</option>
													
												@endforeach
											</select>
										</td>
										<td>
											<select name="assignedmentor">
												<option value="0">Unassigned</option>
												@foreach($mentorList as $mentor)
													<option value="{{$mentor->id}}" @if($user->getCurrentMentor() && $user->getCurrentMentor()->id == $mentor->id) selected @endif>{{$mentor->name_first}} {{$mentor->name_last}}</option>
												@endforeach
											</select>
										</td>
										<td>
											<select name="mentor">
												<option value="0" @if ($user->mentor == 0) selected @endif>No</option>
												<option value="1" @if ($user->mentor == 1) selected @endif>Yes</option>
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