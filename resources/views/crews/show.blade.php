@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Crew Details</div>
                <div class="card-body">
                  
                @foreach ($crews as $crew)

                <div class="mb-3">
                    <label>Firstname</label>
                    <input type="text" name="firstname" value="{{$crew->firstname}}" class="form-control" readonly>
                    @error('firstname')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label>Lastname</label>
                    <input type="text" name="lastname" value="{{$crew->lastname}}" class="form-control" readonly>
                    @error('lastname')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label>Middlename</label>
                    <input type="text" name="middlename" value="{{$crew->middlename}}" class="form-control" readonly>
                </div>

                <div class="mb-3">
                    <label>Email</label>
                    <input type="text" name="email" value="{{$crew->email}}" class="form-control" readonly>
                </div>

                <div class="mb-3">
                    <label>Address</label>
                    <input type="text" name="address" value="{{$crew->address}}" class="form-control" readonly>
                </div>

                <div class="mb-3">
                    <label>Education</label>
                    <input type="text" name="education" value="{{$crew->education}}" class="form-control" readonly>
                </div>

                <div class="mb-3">
                    <label>Contact Details</label>
                    <input type="text" name="contact_details" value="{{$crew->contact_details}}" class="form-control" readonly>
                </div>
                

                @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
@endsection