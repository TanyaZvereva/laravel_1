@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
					
					@php
						$user = Auth::user();
						
						echo 'You id - '.$user->id;
						echo '<br>';
						echo 'You name - '.$user->name;
						echo '<br>';
						echo 'You email - '.$user->email;
						echo '<br>';
					
					@endphp

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
