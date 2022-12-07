@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Delete Contact') }}</div>
                <br>
                <br>

                   <form action="{{ route('user.destroy', $contacts->id) }}" method="post">
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
                            <div class="col-md-8 offset-md-5 ">
                                <button type="submit" class="btn btn-danger">
                                    Yes
                                </button>
                                <a href="{{ route('user.index') }}" class="btn btn-info">No</a>
                            </div>
                        </div>
                        <br>
                        <br>
                      
                    </form>
                       
                </div>
            </div>
        </div>
    </div>
</div>
@endsection