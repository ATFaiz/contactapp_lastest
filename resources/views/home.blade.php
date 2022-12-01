@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Your Contact List') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a href="{{route('contact.create')}}" class="btn btn-success btn-sm" title="Add New Contact">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <!-- <th>Address</th> -->
                                        <th>Mobile</th>
                                        <th>Photo</th>
                                        <th>Action</th>
                                </thead>
                                </thead>
                                <tbody>
                                @foreach($contacts as $contact)
                                @can('user-contact',$contact)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $contact->name }}</td>
                                        <!-- <td>{{ $contact->address }}</td> -->
                                        <td>{{ $contact->mobile }}</td>
                                        <td>
                                            <img src="{{ asset($contact->photo) }}" width= '50' height='50' class="img img-responsive" />
 
 
                                        </td>
                                     
                                        <td>
                                        <a href="{{ route('contact.edit', $contact->id) }}" class="btn btn-sm btn-outline-success" title="Edit Contact"><i class="fa fa-pencil-square-o"></i></a>
                                        <a href="{{ route('contact.show', $contact->id) }}" class="btn btn-sm btn-outline-danger" title="Delete Contact"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                  @endcan
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
