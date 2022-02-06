@extends('layouts.master')

@section('content')
<div class="container">
    <div class="col-lg-2">
        <button href="/recipes" onclick="history.go(-1)" class="rn-btn">
            <span>Back</span>
            <i data-feather="arrow-left"></i>
        </button>
    </div>
    <div class="col-lg-10">
        <div class="contact-about-area">
            <div class="">
                <img src="/storage/images/recipes/{{$recipe->image}}" width="100%"  alt="recipe-img">
            </div>
            <div class="title-area">
                <h4 class="title">{{$recipe->name}}</h4>
                @foreach ($recipe->ingredients as $key =>  $ingredient )
                    
                <p>{{$ingredient->name}} - {{$ingredient->pivot->amount}}</p>
                
                @endforeach
            </div>
            <div class="description">
                <p>{{$recipe->note}}
                </p>
                {{-- <span class="mail">Email: <a href="mailto:admin@example.com">admin@example.com</a></span> --}}
            </div>
            <p href="">{{$recipe->created_at->toFormattedDateString()}}</p>
            <div class="social-area">
                <div class="name">FIND WITH ME</div>
                <div class="social-icone">
                    <a href="#"><i data-feather="facebook"></i></a>
                    <a href="#"><i data-feather="linkedin"></i></a>
                    <a href="#"><i data-feather="instagram"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection