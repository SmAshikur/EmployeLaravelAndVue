@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header ">
                <h3>Edit City</h3>
                <div class="d-flex justify-content-around mt-2">
                    <a class="btn btn-success" href="{{route('home')}}">Home</a>
                    <a class="btn btn-success" href="{{route('city.index')}}">Back</a>
                </div>

            </div>
            <div class="card-body p-5 col-md-4 offset-md-4">
                <form action="{{route('city.update',$city)}}" method="post">
                @csrf @method('put')
                <div class="form-group">
                    <label for="country_id" class="form-label">City</label>
                    <select class="form-control @error('name') is-invalid @enderror" name="country_id" value="{{$city->country_id}}">

                        @foreach ($countries as $country )
                       <option value="{{$country->id}}" @if ($country->id==$city->country_id)
                        selected
                    @endif>{{$country->name}}</option>
                       @endforeach
                    </select>
                    @error('country_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="name" class="form-label">City Name</label>
                    <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" value="{{$city->name}}">
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group d-flex justify-content-center mt-5">
                    <button type="submit" class="btn btn-success form-control"> Submit</button>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection
