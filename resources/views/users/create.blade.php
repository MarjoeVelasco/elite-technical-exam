@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Register New User</div>
                <div class="card-body">
                  
                <form method="post" action="/users">
                @csrf

              
                <div class="mb-3">
                    <label>Username</label>
                    <input type="text" name="name" value="{{ old('name')}}" class="form-control">
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label>Email</label>
                    <input type="text" name="email" value="{{ old('email')}}" class="form-control">
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                <label>Password</label>
                <input type="password" name="password" value="{{ old('password')}}" class="form-control">
                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>

                <div class="mb-3">
                    <label>Confirm Password</label>
                    <input type="password" name="password_confirmation" class="form-control">
                </div>


               
                <input type="submit" value="save"> 
    
                </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection