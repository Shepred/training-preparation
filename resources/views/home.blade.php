@extends('layout.master')
    @section('content')
		<main role="main" class="container">
			<div class="row p-3">
        		<h1>Welcome to the Student Preparation System</h1>
        	</div>
        	<div class="row p-3">
        		<p>The aim of this website is to prepare students for their training before they are assigned their mentor. By doing this we hope to reduce the amount of time each student requires with their mentor, as such freeing up our mentors for more students and ultimately reducing our ever increasing training queues.</p>
        		<p>If you have any questions or concerns, do not hestitate to contact <a href="mailto:training-denmark@vatsim-scandinavia.org" target="_top">training-denmark@vatsim-scandinavia.org</a>.</p>
        		<p>This system was developed for usage within the danish division of VATSIM Scandinavia.</p>
      		</div>
      		<hr>
      		<div class="row p-3">
      			<div class="col">
      				<h2>Student Information</h2>
					<table class="table table-striped">
						<tbody>
    						<tr>
      							<th scope="row">VATSIM ID</th>
      							<td>{{$user->id}}</td>
    						</tr>
    						<tr>
      							<th scope="row">First Name</th>
      							<td>{{$user->name_first}}</td>
    						</tr>
    						<tr>
      							<th scope="row">Last Name</th>
      							<td>{{$user->name_last}}</td>
    						</tr>
    						<tr>
      							<th scope="row">VATSIM Rating</th>
      							<td>{{$user->rating}}</td>
    						</tr>
    						<tr>
      							<th scope="row">Training Rating</th>
      							<td>{{$user->status->name}}</td>
    						</tr>
    						<tr>
      							<th scope="row">Time Trained</th>
      							<td>{{$user->time_trained}} <span class="small text-muted">(hh:mm:ss)</span></td>
    						</tr>
    						<tr>
      							<th scope="row">Courses Completed</th>
      							<td>{{$user->courses_completed}}</td>
    						</tr>
  						</tbody>
					</table>
      			</div>

      			<div class="col">
      				<h2>Course Information</h2>

      				@if ($user->status->id == 1)
      					<p>You are currently not assigned to any courses.</p>
      					<p>If you have been assigned a mentor, please contact your mentor. If you have not been assigned any mentor, please contact Training Assistant Denmark at <a href="mailto:training-denmark@vatsim-scandinavia.org" target="_top">training-denmark@vatsim-scandinavia.org</a>.</p>
      				@else
      					<p>YEEEY YOU ARE ASSIGNED TO A COURSE! GO CELEBRATE. BUT DON'T STUDY.</p>
      				@endif
      			</div>
      		</div>
    	</main>
    @endsection