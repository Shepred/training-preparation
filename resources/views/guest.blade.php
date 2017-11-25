@extends('layout.master')
    @section('content')
    	<main role="main" class="container">
    		<div class="row p-3">
    			<div class="col text-center">
    				<h1>Welcome to the Student Preparation System</h1>
    				<p>We use VATSIM's own SSO (single sign-on) to authenticate users. Please sign in below.</p>
				</div>
    		</div>
    		<hr>
    		<div class="row p-3">
    			<div class="col">
    				<img class="mx-auto d-block" src="{{ asset('assets/images/vatsim_logo.png') }}" alt="VATSIM Logo">
    			</div>
    		</div>
    		<div class="row p-3">
    			<div class="col text-center">
    				<a href="{{ url('/login') }}" class="text-center button">Login using VATSIM</a>
    			</div>
    		</div>
    	</main>
    @endsection