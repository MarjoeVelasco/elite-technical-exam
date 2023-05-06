@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <a href="/crews/create"><button class="mb-2">Add new Crew</button></a>
                    <table class="table table-striped">
                        <thead class="table-dark">
                            <tr>
                                <th>Firstname</th>
                                <th>Lastname</th>
                                <th>Middlename</th>
                                <th>Email</th>
                                <th>Assigned Document</th>
                                <th>Actions</th>
                            </tr>
                            <thead>
                            <tbody>
                                @foreach($crews as $crew)
                                <tr>
                                    <td>{{$crew->firstname}}</td>
                                    <td>{{$crew->lastname}}</td>
                                    <td>{{$crew->middlename}}</td>
                                    <td>{{$crew->email}}</td>
                                    <td>
                                    @if($crew->document_id == null) 
                                        <a href="/documents/create/{{$crew->id}}"><button>Add Document</button></a>
                                    @else
                                        <a href="/documents/{{$crew->document_id}}">{{$crew->name}}</a>                                        
                                    @endif
                                    </td>

                                    <td> 
                                        <a href="/crews/{{$crew->id}}"><button>View</button></a>
                                        <a href="/crews/{{$crew->id}}/edit"><button>Edit</button></a>
                                        <!-- DELETE -->
                                        <form action="/crews/{{$crew->id}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <input type="submit" value="Delete">
                                        </form>

                                        <!-- if crew has no assigned document -->
                                        
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                    </table>
                        {{ $crews->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection