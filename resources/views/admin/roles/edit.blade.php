@extends('layouts.master')

@section('content')
    <div class="container">
        <h1>Update the role</h1>

        @if ($errors->any())
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="row justify-content-center contact-form-wrapper">
            <div class="col-md-8">
                <div class="">
                    <div class="card-header">{{ __('Update') }}</div>


                    <div class="card-body">
                        <form method="POST" action="/roles/{{$role->id}}" enctype="multipart/form-data">
                            @method('PATCH')
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="role_name" type="text" class="form-control" name="role_name" value="{{ $role->name }}" autocomplete="name" autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="slug" class="col-md-4 col-form-label text-md-right">{{ __('Slug') }}</label>

                                <div class="col-md-6">
                                    <input id="role_slug" type="text" class="form-control" name="role_slug" value="{{ $role->slug }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="permision" class="col-md-4 col-form-label text-md-right">{{ __('Permissions') }}</label>

                                <div class="col-md-6">
                                    <input id="roles_permissions" type="text" class="form-control" data-role = "tagsinput" name="roles_permissions" value=" @foreach ($role->permissions as $permission )
                                        {{$permission->name. ","}}
                                    @endforeach">
                                    {{-- <input id="role_permissions" type="text" class="form-control" name="role_permisions" value="{{}}"> --}}
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="rn-btn">
                                        {{ __('Update') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

    @section('script')
        <script>
            $(document).ready(function(){
                $('#role_name').keyup(function(e){
                    var str = $('#role_name').val();
                    str = str.replace(/\W+(?!$)/g, '-').toLowerCase();//replace stapces with dash
                    $('#role_slug').val(str);
                    $('#role_slug').attr('placeholder', str);
                });
            });
        </script>
    @endsection
@endsection