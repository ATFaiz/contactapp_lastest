@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Delete Contact') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <!-- <a href="{{ route('contact.index') }}" class="btn btn-success btn-sm" title="Go to Index">
                            <i class="fa fa-arrow-left"></i> Go Back
                        </a> -->
                        <br/>
                        <br/>


                    <form action="{{ route('contact.destroy', $contacts->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <div class="form-group row mb-0" >
                            <div class="col-md-12" style="text-align: center;">
                                <h4>
                                    Are you sure you want to delete {{ $contacts->name }}?
                                </h4>
                            </div>
                        </div>
                        </br>
                        
                        <div class="form-group row mb-0" >
                            <div class="col-md-8 offset-md-4 ">
                                <button type="submit" class="btn btn-danger">
                                    Yes
                                </button>
                                <a href="{{ route('contact.index') }}" class="btn btn-info">No</a>
                            </div>
                        </div>
                      
                    </form>
                       
                </div>
            </div>
        </div>
    </div>
</div>
@endsection