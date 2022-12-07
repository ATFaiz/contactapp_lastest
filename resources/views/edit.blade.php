@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit {{ $contacts->name }} Contact Detail</div>

                <div class="card-body">
                   

                    <a href="{{ route('user.index') }}" class="btn btn-success btn-sm" title="Back to Your Contact List">
                            <i class="fa fa-arrow-left"></i> Go Back
                        </a>
                        <br/>
                        <br/>

                        <div class="card-body">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if(session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show w-50">
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            {{ session()->get('success') }}
                        </div>
                    @endif

                    <form method="POST" action="{{route('user.update', $contacts->id)}}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" id="id" value="{{$contacts->id}}" id="id" />
                        <label>Name</label></br>
                        <input type="text" name="name" id="name" value="{{$contacts->name}}" class="form-control"></br>
                        <label>Mobile</label></br>
                        <input type="text" name="mobile" id="mobile" value="{{$contacts->mobile}}" class="form-control"></br>
                        <input class="form-control" name="photo" type="file" id="photo">
                        <img src="{{ asset($contacts->photo) }}" width= '50' height='50' class="img img-responsive" />
                
                        <input type="submit" value="Update" class="btn btn-success" title="Update Contact"></br>
                     </form>
                       
                </div>
            </div>
        </div>
    </div>
</div>
@endsection