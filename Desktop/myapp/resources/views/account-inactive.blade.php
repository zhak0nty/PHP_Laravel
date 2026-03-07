@extends('layouts.app')

@section('title', 'Account Inactive')

@section('content')
<h1>Account Access Restricted</h1>
<p>Your account status is: <strong>{{ $status }}</strong></p>
<p>Only users with active accounts can access this page. Please contact support if you believe this is an error.</p>
<a href="/">Return to Home</a>
@endsection
