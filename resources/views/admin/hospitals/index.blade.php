@extends('admin.layouts')
@section('title', 'hospitals')
@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title mt-2">Hospitals Table</h3>
                <a href="{{ route('hospitals.create') }}" class="btn btn-success float-right">new hospital</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">

                @if (session()->has('message'))
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h5><i class="icon fas fa-check"></i> Success</h5>
                        <h2>{{ session()->get('message') }}</h2>
                    </div>
                @endif
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Name</th>
                            <th>location</th>
                            <th>Active</th>
                            <th>Image</th>
                            <th>Create Date</th>
                            <th>Update Date</th>
                            <td>Actions</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $hospital)
                            <tr>
                                <td>{{ $hospital->id }}</td>
                                <td>{{ $hospital->name }}</td>
                                <td>{{ $hospital->location }}</td>
                                <td><span
                                        class="badge {{ $hospital->is_active ? 'bg-success' : 'bg-danger' }}">{{ $hospital->active_status }}</span>
                                </td>
                                <td><img src="{{ Storage::url('hospitals/' . $hospital->cover) }}" alt="hospital image"
                                        width="60" height="60"></td>
                                <td>{{ $hospital->created_at }}</td>
                                <td>{{ $hospital->updated_at }}</td>
                                <td>
                                    <div class="btn-group">
                                        <div class="btn-group">
                                            <a href="{{ route('hospitals.edit', $hospital->id) }}" class="btn btn-info"><i
                                                    class="fas fa-edit"></i></a>
                                            {{-- ---------------------- --}}
                                            {{-- <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal">
                                                <i class="fab fa-elementor"></i></button> --}}
                                            {{-- ------------------------------------ --}}
                                            <form action="{{ route('hospitals.destroy', $hospital->id) }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger"><i
                                                        class="fas fa-trash"></i></button>
                                            </form>
                                        </div>

                                    </div>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                    <li class="page-item"><a class="page-link" href="#">«</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">»</a></li>

                </ul>
            </div>
        </div>
    </div>
@endsection
