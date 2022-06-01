@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                            <table class="table table-bordered table-striped">
                                <tr>
                                    <th>Name</th>
                                    <th>Action</th>

                                </tr>
                                <tr>
                                    <td>Country</td>
                                    <td class="d-flex justify-content-center"><a class="btn btn-success" href="{{route('country.index')}}">Index</a></td>

                                </tr>
                                <tr>
                                    <td>City</td>
                                    <td class="d-flex justify-content-center"><a class="btn btn-success" href="{{route('city.index')}}">Index</a></td>


                                </tr>
                                <tr>
                                    <td>Department</td>
                                    <td class="d-flex justify-content-center"><a class="btn btn-success" href="{{route('department.index')}}">Index</a></td>

                                </tr>
                                <tr>
                                    <td>Employee</td>
                                    <td class="d-flex justify-content-center"><a class="btn btn-success" href="{{url('/employee')}}">Index</a></td>

                                </tr>
                            </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
