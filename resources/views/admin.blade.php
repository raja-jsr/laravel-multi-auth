@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">ADMIN Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{-- session('status') --}}
                            You are logged in as <strong>ADMIN!</strong>
                        </div>
                    @endif                    
                </div>
                <div class="container">  
                    <table class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>User Name</th>
                            <th>Image Title</th>
                            <th>Image</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($images as $image)
                        <tr>
                            <td>{{ $image->user->name }}</td>
                            <td>{{ $image->title }}</td>
                            <td><img src="{{ asset("images/$image->image") }}" height="30px" width="30px"></td>          
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $images->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
