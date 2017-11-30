@extends('layouts.app')

@section('content')
<style>
    label.checkbox{
        width: 24.5%;
    }
</style>

<nav class="breadcrumb" aria-label="breadcrumbs">
    <ul>
        <li><a href="{{ route('admin.home') }}"  aria-current="page">Dashboard</a></li>
        <li><a href="{{ route('user.index') }}"  aria-current="page">User</a></li>
        <li><a href="{{ route('user.show', ['user' => $user->id]) }}">{{ $user->username }}</a></li>
        <li class="is-active"><a href="#"  aria-current="page">Settings</a></li>
    </ul>
</nav>
<div class="columns">
    <div class="column is-one-quarter">
        @include('admin.side-menu')
    </div>
    <div class="column">
        <div class="columns">
            <div class="column is-half">
                <div class="box">
                    <div class="columns">
                        <div class="column">
                           <!-- View user roles and permissions -->
                            <h5 class="title is-5">{{ $user->username }}</h5>
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>Name</th>
                                        <td>{{ $user->name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Role(s)</th>
                                        <td>
                                        @foreach($user->roles as $role)
                                        <span class="tag">{{ $role->display_name}}</span>
                                        @endforeach     
                                        </td>       
                                    </tr>
                                    <tr>
                                        <th>Permission(s)</th>
                                        <td>
                                        @foreach($user->permissions as $perm)
                                        <span class="tag">{{ $perm->display_name}}</span>
                                        @endforeach
                                        </td>            
                                    </tr>                          
                                </tbody>
                            </table>                  
                        </div>
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="box">
                    <div class="columns">
                        <div class="column">
                            <h5 class="title is-5">Operations</h5>
                            <button class="button is-danger">
                                <span class="icon">
                                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                                </span>&nbsp;
                                Delete
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Edit user role(s) -->
        <div class="box">
            <h5 class="title is-5">Edit roles</h5>
            <form action="{{ route('admin.user.role.update', ['user' => $user->id]) }}" method="POST">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                @foreach ($roles as $role)
                <label class="checkbox">
                    <input type="checkbox" name="roles[]" value="{{$role->id }}"
                           @if (in_array($role->id, $userRoles)) checked @endif> {{$role->display_name}}

                </label>
                @endforeach
                <div class="field m-t-10">
                    <div class="control">
                      
                       <!-- Save button -->
                        <button class="button is-success">
                            <span class="icon">
                                <i class="fa fa-floppy-o" aria-hidden="true"></i>
                            </span>&nbsp;
                            Save
                        </button>
                        
                        <!-- Reset button -->
                        <button class="button is-info" type="reset" value="Reset">
                            <span class="icon">
                                <i class="fa fa-refresh" aria-hidden="true"></i>
                            </span>&nbsp;
                            Reset
                        </button>
                    </div>
                </div>
            </form>
        </div>

        

       <!-- Edit user permission(s) -->
        <div class="box">
            <h5 class="title is-5">Edit permissions</h5>
            <form action="" method="POST">
                @foreach ($permissions as $permission)
                <label class="checkbox">
                    <input type="checkbox" name="permissions[]" value="{{ $permission->id }}"
                           @if (in_array($permission->id, $userPermissions)) checked @endif> {{$permission->display_name}}
                </label>
                @endforeach
                <div class="field m-t-10">
                    <div class="control">
                       
                        <!-- Save button --> 
                        <button class="button is-success">
                            <span class="icon">
                                <i class="fa fa-floppy-o" aria-hidden="true"></i>
                            </span>&nbsp;
                            Save
                        </button>
                        
                        <!-- Reset button -->
                        <button class="button is-info" type="reset" value="Reset">
                            <span class="icon">
                                <i class="fa fa-refresh" aria-hidden="true"></i>
                            </span>&nbsp;
                            Reset
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
