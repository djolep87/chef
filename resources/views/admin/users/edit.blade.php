@extends('layouts.master')

@section('content')
    <div class="container">
        <h2>Update User</h2>

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
                        <form method="POST" action="/users/{{$user->id}}" enctype="multipart/form-data">
                            @method('PATCH')
                            @csrf()
    
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
    
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" autocomplete="name" autofocus>
    
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
    
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" autocomplete="email">
    
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
    
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">
    
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
    
                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="role" class="col-md-4 col-form-label text-md-right">{{ __('Role') }}</label>
    
                                <div class="col-md-6">
                                    <select class="form-control" name="role" id="role">
                                        <option class="form-control" value="">Select role...</option>
                                        @foreach ($roles as $role)
                                            <option data-role-id="{{$role->id}}" data-role-slug="{{$role->slug}}" class="form-control" value="{{$role->id}}" {{$user->roles->isEmpty() || $role->name != $userRole->name ? "" : "selected"}}>{{$role->name}}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>

                            <div class="form-group row" id="permissions_box">
                                <label for="roles" class="col-md-4 col-form-label text-md-right">{{ __('Select Permissions') }}</label>
                               
                                <div class="col-md-6">
                                    <div id="permissions_checkbox_list"></div>
                                    
                                </div>
                            </div>
                            
                            @if ($user->permissions->isNotEmpty())
                                @if ($rolePermissions != null)    
                                    <div class="form-group row" id="user_permissions_box">
                                        <label for="roles" class="col-md-4 col-form-label text-md-right">{{ __('User Permissions') }}</label>

                                        <div class="col-md-6">
                                            <div id="permissions_checkbox_list">
                                                @foreach ($rolePermissions as $permission)
                                                <div class="custom-control  custom-checkbox">
                                                    <input class="custom-control-input" type="checkbox" name="permissions[]" id="{{$permission->slug}}" value="{{$permission->id}}" {{ in_array($permission->id, $userPermissions->pluck('id')->toArray() ) ? 'checked="checked"' : ''}}>
                                                    <label class="custom-control-label" for="{{$permission->slug}}">{{$permission->name}}</label>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endif

    
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="rn-btn">
                                        {{ __('Update') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>//
                </div>
            </div>
        </div>
    </div>
    @section('script')
        <script>
            $(document).ready(function(){
                var permissions_box = $('#permissions_box');
                var permissions_checkbox_list = $('#permissions_checkbox_list');
                var user_permissions_box = $('#user_permissions_box');
                var user_permissions_checkbox_list = $('#user_permissions_checkbox_list');

                permissions_box.hide();

                $('#role').on('change', function(){
                    var role = $(this).find(':selected');
                    var role_id = role.data('role-id');
                    var role_slug = role.data('role-slug');

                    permissions_checkbox_list.empty();
                    user_permissions_box.empty();

                    $.ajax({
                        url: "/users/create",
                        method: 'get',
                        dataType: 'json',
                        data: {
                            role_id: role_id,
                            role_slug: role_slug,
                        }
                    }).done(function(data){
                        console.log(data);

                        permissions_box.show();
                        // permissions_checkbox_list.empty();

                        $.each(data,function(index, element){
                            $(permissions_checkbox_list).append(
                                '<div class="custom-control custom-checkbox">'+
                                    '<input class="custom-control-input" type="checkbox" name="permissions[]" id="'+ element.slug +'" value="'+ element.id +'">'+
                                    '<label class="custom-control-label" for="'+ element.slug +'">'+ element.name +'</label>'+
                                '</div>'    
                                
                            );
                        });
                    });
                });
            });
        </script>
    @endsection
@endsection