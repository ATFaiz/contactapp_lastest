@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Admin dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Mobile</th>
                                        <th>Photo</th>
                                        <th>Added By</th>
                                </thead>
                                </thead>
                                <tbody>
                                   @foreach($contacts as $contact)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $contact->name }}</td>
                                        <td>{{ $contact->mobile }}</td>
                                        <td>
                                            <img src="{{ asset($contact->photo) }}" width= '50' height='50' class="img img-responsive" />
                                         </td>
                                         <td>{{ $contact->user->name }}</td>
                                     
                                   </tr>
                                
                                  @endforeach
                                </tbody>
                            </table>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
