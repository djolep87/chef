@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="contact-about-area">
            <div class="">
                <h3>Name: {{$role->name}}</h3>
                <h4>Slug: {{$role->slug}}</h4>
                <h4></h4>
            </div>
            <div class="title-area">
                <h5 class="card-title">Role</h5>
                <p class="card-text">
                    ......
                </p>
                <h5 class="card-title">Permissions</h5>
                <p class="card-text">
                    ......
                </p>
            </div>
            <a href="{{url()->previous()}}" class="rn-btn"><i data-feather="arrow-left"></i>Go Back</a>

        </div>
    </div>
@endsection