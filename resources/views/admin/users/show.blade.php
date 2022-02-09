@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="contact-about-area">
            <div class="">
                <h3>Name: {{$user->name}}</h3>
                <h4>Email: {{$user->email}}</h4>
                <h4></h4>
            </div>
            <hr>
            <div class="title-area">
                <h3 class="card-title">Role</h3>
                <p class="card-text">
                    @if($user->roles->isNotEmpty())
                        @foreach ($user->roles as $role )
                            <span class="badge badge-secondary">
                                {{$role->name}}
                            </span>
                        @endforeach
                    @endif
                </p>
                <hr>
                <h3 class="card-title">Permissions</h3>
                <p class="card-text">
                    @if($user->permissions->isNotEmpty())
                        @foreach ($user->permissions as $permission )
                            <span class="badge badge-secondary">
                                {{$permission->name}}
                            </span>
                        @endforeach
                    @endif
                </p>
                <hr>
            </div>
            <a href="{{url()->previous()}}" class="rn-btn"><i data-feather="arrow-left"></i>Go Back</a>

        </div>
    </div>
@endsection