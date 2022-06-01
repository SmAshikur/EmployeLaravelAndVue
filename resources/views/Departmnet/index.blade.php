@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header ">
            <h3>Index of department</h3>
            <div class="d-flex justify-content-around mt-2">
                <a class="btn btn-success" href="{{route('home')}}">Home</a>
                <a class="btn btn-success" href="{{route('department.create')}}">Create department</a>
            </div>

        </div>
        <div class="card-body p-5  col-md-8 offset-md-2">
            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
            <table class="table table-bordered table-striped text-center mt-0">
                <tr>
                    <th>Id</th>
                    <th>Department Name</th>

                    <th>Action</th>
                </tr>
                @foreach ($depts as $dept )
                    <tr>
                        <td>{{$dept->id}}</td>
                        <td>{{$dept->name}}</td>

                        <td class="d-flex justify-content-around">
                            <div><a class="btn btn-warning " href="{{route('department.edit',$dept)}}">Edit</a></div>
                            <div>
                                <form method="POST" action="{{route('department.destroy',$dept)}}"> @csrf
                                    <input name="_method" type="hidden" value="DELETE">
                                    <button type="submit" class="show_confirm btn btn-xs btn-danger btn-flat "
                                     data-toggle="tooltip" title='Delete'>Delete</button>
                                </form>
                        </div>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection
