@extends('layouts.master')

@section('content')
<div class="rn-blog-area rn-section-gap section-separator" id="blog">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="col-lg-12">
                    <a class="rn-btn" href="/createRecipes"><span>ADD NEW RECIPES</span></a>
                </div>
                <div data-aos="fade-up" data-aos-duration="" data-aos-delay="" data-aos-once="true" class="section-title text-center">
                    <span class="subtitle">Visit my blog and keep your feedback</span>
                    <h2 class="title">My Recipes</h2>
                </div>
            </div>
        </div>
        <div class="row row--25 mt--30 mt_md--10 mt_sm--10">
            @if (count($recipes) > 0)
            
        
            @foreach ($recipes as $recipe )
                <!-- Start Single blog -->
                <div data-aos="fade-up" data-aos-duration="" data-aos-delay="" data-aos-once="true" class="col-lg-6 col-xl-4 mt--30 col-md-6 col-sm-12 col-12 mt--30">
                    <div class="rn-blog" data-toggle="modal" data-target="#myModal" >
                        <div class="inner">
                            <div class="thumbnail">
                                <a href="/showRecipe/{{$recipe->id}}" class="btn-mod">
                                    <img src="/storage/images/recipes/{{$recipe->image}}" alt="Personal Portfolio Images">
                                </a>
                            </div>
                            <div class="content">
                                <div class="category-info">
                                    <div class="category-list">
                                        {{-- <a href="javascript:void(0)" data-target="#myModal" data-id="{{$recipe->id}}" class="btn-mod">Canada</a> --}}
                                    </div>
                                    <div class="meta">
                                        <span><i class="feather-clock"></i> 2 min read</span>
                                    </div>
                                </div>
                                <h4 class="title"><a href="/showRecipe/{{$recipe->id}}" >{{$recipe->name}}
                                        <i class="feather-arrow-up-right"></i></a></h4>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single blog -->
                
                
            @endforeach
        @else
            <p>No recepies yet!</p>
        @endif  
        </div>
    </div>
</div>
       
@endsection