@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Add New Crew</div>
                <div class="card-body">
                  
                <form method="post" action="/crews">
                @csrf

                <div class="mb-3">
                    <label>Firstname</label>
                    <input type="text" name="firstname" value="{{ old('firstname')}}" class="form-control">
                    @error('firstname')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label>Lastname</label>
                    <input type="text" name="lastname" value="{{ old('lastname')}}" class="form-control">
                    @error('lastname')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label>Middlename</label>
                    <input type="text" name="middlename" value="{{ old('middlename')}}" class="form-control">
                    @error('middlename')
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
                    <label>Address</label>
                    <input type="text" name="address" value="{{ old('address')}}" class="form-control">
                    @error('address')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label>Education</label>
                    <input type="text" name="education" value="{{ old('education')}}" class="form-control">
                    @error('education')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label>Contact Details</label>
                    <input type="text" name="contact_details" value="{{ old('contact_details')}}" class="form-control">
                    @error('contact_details')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                
                <input type="submit" value="save"> 
    
                </form>




                </div>
            </div>
        </div>
    </div>
</div>
@endsection