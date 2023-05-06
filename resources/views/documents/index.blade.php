@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Documents</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <a href="/documents/create"><button class="mb-2">Add new Document</button></a>
                    <table class="table table-striped">
                        <thead class="table-dark">
                            <tr>
                                <th>Document Code</th>
                                <th>Document Name</th>
                                <th>Date Issued</th>
                                <th>Date Expiry</th>
                                <th>Issued To</th>
                                <th>Actions</th>
                            </tr>
                            <thead>
                            <tbody>
                            @foreach ($documents as $document)
                            <tr>
                                <td>{{ $document->code }}</td>
                                <td>{{ $document->name }}</td>
                                <td>{{ $document->date_issued }}</td>
                                <td>{{ $document->date_expiry }}</td>
                                <td>  
                                  <a href="/crews/{{$document->crew->id}}">{{ $document->crew->firstname }} {{ $document->crew->lastname }}</a>
                                </td>
                                <td>
                                  <a href="/documents/{{$document->id}}"><button>View</button></a>
                                  <a href="/documents/{{$document->id}}/edit"><button>Edit</button></a>
                                  <!-- DELETE -->
                                  <form action="/documents/{{$document->id}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" value="Delete">
                                  </form>
                                </td>
                            </tr>
                        @endforeach

                            </tbody>
                            
                    </table>
                    {{ $documents->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection