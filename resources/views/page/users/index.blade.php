
@extends('layouts.app')

@section('title', 'Posts')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet"
        href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Users</h1>
                <div class="section-header-button">
                    <a href="{{route('user.create')}}"
                        class="btn btn-primary">Add New</a>
                </div>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Users</a></div>
                    <div class="breadcrumb-item">All Users</div>
                </div>
            </div>
            @include('layouts.alert')

            <div class="section-body">
                <h2 class="section-title">Users</h2>
                <p class="section-lead">
                    You can manage all Users, such as editing, deleting and more.
                </p>

                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>All Users</h4>
                            </div>
                            <div class="card-body">
                                <div class="float-left">
                                    <select class="form-control selectric">
                                        <option>Action For Selected</option>
                                        <option>Move to Draft</option>
                                        <option>Move to Pending</option>
                                        <option>Delete Pemanently</option>
                                    </select>
                                </div>
                                <div class="float-right">
                                    <form>
                                        <div class="input-group">
                                            <input type="text"
                                            name="name"
                                                class="form-control"
                                                placeholder="Search">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <div class="clearfix mb-3"></div>

                                <div class="table-responsive">
                                    <table class="table-striped table">
                                        <tr>
            
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                            <th>Phone </th>
                                        </tr>
                                        <tr>
                                            @foreach($users as $user)
                                            <td>{{$user->name}}
                                                <div class="table-links">
                                                    <a href="#">View</a>
                                                    <div class="bullet"></div>
                                                    <a href="{{route('user.edit', $user->id)}}">Edit</a>
                                                    <div class="bullet"></div>
                                                    <a href="#"
                                                    onclick="event.preventDefault(); document.getElementById('delete-form-{{$user->id}}').submit();"
                                                        class="text-danger">Delete</a>
                                                        <form action="{{route('user.destroy', $user->id)}}" method="post" id="delete-form-{{$user->id}}">
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>
                                                </div>
                                            </td>
                                            <td>
                                                <a href="#">{{$user->email}}</a>,
                                            <td>
                                                <a href="#">
                                                    <div class="d-inline-block ml-1">{{$user->role}}</div>
                                                </a>
                                            </td>
                                             <td>
                                                <a href="#">
                                                    <div class="d-inline-block ml-1">{{$user->phone}}</div>
                                                </a>
                                            </td>
                                        
                                        </tr>
                                        <tr>
                                            @endforeach
                                         
                                    </table>
                                </div>
                                <div class="float-right">
                                    <nav>
                                        <ul class="pagination">
                                           {{$users->links()}}
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/features-posts.js') }}"></script>
@endpush
