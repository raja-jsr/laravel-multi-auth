@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">USER Dashboard</div>
    
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{ route('image.upload.post') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                        
                        <div class="form-group">
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', '' ) }} "/>
                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }} </strong>
                                </span>
                            @enderror
                        </div>
                        
                        
                        <div class="form-group">
                            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }} </strong>
                                </span>
                            @enderror
                        </div>  
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Upload</button>
                        </div>
                        
                    </form>
                </div>
                <hr>
                <div>
                    <h1> <center> User's Galary</center></h1>
                </div>
                <div class="container">  
                    <table class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>Image Title</th>
                            <th>Image</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($images as $image)
                        <tr>
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
