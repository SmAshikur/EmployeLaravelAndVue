@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header ">
                <h3>Create new Country</h3>
                <div class="d-flex justify-content-around mt-2">
                    <a class="btn btn-success" href="{{route('home')}}">Home</a>
                    <a class="btn btn-success" href="{{route('country.index')}}">Back</a>
                </div>

            </div>
            <div class="card-body p-5 col-md-4 offset-md-4">
                <form action="{{route('country.store')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="name" class="form-label">Country Name</label>
                    <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" value="{{old('name')}}">
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="country_code" class="form-label">Country Code</label>
                    <input class="form-control @error('name') is-invalid @enderror" type="text" name="country_code" value="{{old('country_code')}}">
                    @error('country_code')
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
