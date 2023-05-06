@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Add New Document</div>
                <div class="card-body">
                  
                <form method="post" action="/documents">
                @csrf

                <div class="mb-3">
                    <label>Code</label>
                    <input type="text" name="code" value="{{ old('code')}}" class="form-control">
                    @error('code')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label>Name</label>
                    <input type="text" name="name" value="{{ old('name')}}" class="form-control">
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label>Document Number</label>
                    <input type="text" name="document_number" value="{{ old('document_number')}}" class="form-control">
                    @error('document_number')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label>Date Issued</label>
                    <input type="date" name="date_issued" value="{{ old('date_issued')}}" class="form-control">
                    @error('date_issued')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label>Date Expiry</label>
                    <input type="date" name="date_expiry" value="{{ old('date_expiry')}}" class="form-control">
                    @error('date_expiry')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label>Remarks</label>
                    <input type="text" name="remarks" value="{{ old('remarks')}}" class="form-control">
                    @error('remarks')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label>Assigned to</label>
                    <select name="crew_id" class="form-select">
                      @foreach($crews as $crew)
                          <option value="{{ $crew->id }}">{{ $crew->firstname }} {{ $crew->lastname }}</option>
                      @endforeach
                    </select>
                    
                </div>
                
                <input type="submit" value="save"> 
    
                </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection