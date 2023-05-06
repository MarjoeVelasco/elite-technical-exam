@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">View Document Details</div>
                <div class="card-body">
                  
                @foreach ($documents as $document)

                <div class="mb-3">
                    <label>Code</label>
                    <input type="text" name="code" value="{{ old('code',$document->code)}}" class="form-control" readonly>
                    @error('code')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label>Name</label>
                    <input type="text" name="name" value="{{ old('name',$document->name)}}" class="form-control" readonly>
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label>Document Number</label>
                    <input type="text" name="document_number" value="{{ old('document_number',$document->document_number)}}" class="form-control" readonly>
                    @error('document_number')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label>Date Issued</label>
                    <input type="date" name="date_issued" value="{{ old('date_issued',$document->date_issued)}}" class="form-control" readonly>
                    @error('date_issued')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label>Date Expiry</label>
                    <input type="date" name="date_expiry" value="{{ old('date_expiry',$document->date_expiry)}}" class="form-control" readonly>
                    @error('date_expiry')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label>Remarks</label>
                    <input type="text" name="remarks" value="{{ old('remarks',$document->remarks)}}" class="form-control" readonly>
                    @error('remarks')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label>Assigned to</label>
                    <select name="crew_id" class="form-select">
                          <option selected value="{{ $document->crew->id }}">{{ $document->crew->firstname }} {{ $document->crew->lastname }}</option>
                    </select>
                    
                </div>
                @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
@endsection