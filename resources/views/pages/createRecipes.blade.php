@extends('layouts.master')

@section('content')
<div class="rn-contact-area rn-section-gap section-separator" id="contacts">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title text-center">
                    <span class="subtitle">Recipas</span>
                    <h2 class="title">Add recipas to database</h2>
                </div>
            </div>
        </div>
       <br>
        <div data-aos-delay="600" class="col-lg-12 contact-input">
            <div class="contact-form-wrapper">
                <div class="introduce">
                    <form class="rnt-contact-form rwt-dynamic-form row" id="contact-form" method="POST" action="/createRecipes" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="contact-name">Recipes Name</label>
                                <input class="form-control form-control-lg" name="name" id="contact-name" type="text">
                            </div>
                        </div>


                        <div class="col-lg-12" >
                            {{-- <button type="button" name="add" id="add" class="rn-btn col-lg-2">Add More</button> <br><br> --}}
                            <div class="form-group" >
                                <table class="contact-about-area">
                                    @foreach($ingredients as $ingredient)
                                        <tr>
                                            <td><input {{ $ingredient->value ? 'checked' : null }} data-id="{{ $ingredient->id }}" type="checkbox" class="form-control-lg-2 ingredient-enable"></td>
                                            <td><input class="form-control form-control-lg-8" type="text" value="{{ $ingredient->name }}"></td>
                                            <td><input value="{{ $ingredient->value ?? null }}" {{ $ingredient->value ? null : 'disabled' }} data-id="{{ $ingredient->id }}" name="ingredients[{{ $ingredient->id }}]" type="text" class="ingredient-amount form-control" placeholder="Amount" ></td>
                                        </tr>
                                    @endforeach
                                </table>
                                
                            </div>
                        </div>

                        {{-- <div class="col-lg-12" id="dynamic_field">
                            <button type="button" name="add" id="add" class="rn-btn col-lg-2">Add More</button> <br><br>
                            <div class="form-group" >
                                <select name="ingredient_id[]" id="name" class="form-control-lg name_list" data-dependet="state" type="text"> 
                                    <option class="form-control form-control-lg" value=""></option>
                                    @foreach ($ingredients as $ingredient)
                                        <option name="ingredient_id[]" value="{{$ingredient->id}}">{{ $ingredient->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div> --}}

                        {{-- <div class="col-lg-12" id="dynamic_field">
                            <button type="button" name="add" id="add" class="rn-btn col-lg-2">Add More</button> <br><br>
                            <div class="form-group" >
                                <table class="form-group">
                                    <tr id="row'+i+'" class="form-group">
                                        <td>
                                            <select name="ingredient_id[]" id="name" class="form-control-lg-6 name_list" data-dependet="state" type="text"> 
                                                <option class="form-control form-control-lg-6" value=""></option>
                                                @foreach ($ingredients as $ingredient)
                                                    <option class="form-control-lg-6" name="ingredient_id[]" value="{{$ingredient->id}}">{{ $ingredient->name }}</option>
                                                @endforeach
                                            </select>
                                        </td>

                                        <td> <input class="form-control form-control-lg-6" data-id="{{$ingredient->id}}" name="ingredients[{{ $ingredient->id }}]" type="text"></td>
                                        <td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td>
                                    </tr>
                                </table>
                                
                            </div>
                        </div> --}}

                        {{-- <div class="col-lg-12" id="dynamic_field">
                            <div class="form-group" >
                                <label for="contact-phone">Foodstuff</label> <button type="button" name="add" id="add" class="rn-btn col-lg-2">Add More</button>
                                <input class="form-control name_list" name="name[]" id="contact-phone" type="text">
                            </div>
                        </div> --}}

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="contact-message">Description</label>
                                <textarea name="note" id="contact-message" cols="30" rows="10"></textarea>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <label for="picture">Add Image</label>
                            <input type="file" name="image" multiple class="form-control-file " ><br><br>
                        </div>
                        

                        <div class="col-lg-2">
                            <button name="submit" type="submit" id="submit" class="rn-btn">
                                <span>Save</span>
                                <i data-feather="arrow-right"></i>
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection

@section('script')

<script>
    $('document').ready(function () {
        $('.ingredient-enable').on('click', function () {
            let id = $(this).attr('data-id')
            let enabled = $(this).is(":checked")
            $('.ingredient-amount[data-id="' + id + '"]').attr('disabled', !enabled)
            $('.ingredient-amount[data-id="' + id + '"]').val(null)
        })
    });
</script>
@endsection