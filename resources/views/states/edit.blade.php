@extends('layouts.main')
@section("content")
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">States</h1>
    </div>
    <div class="row">    
        <div class="card mx-auto">
            <div class="card-header">
                Update State
                <a href="{{route('states.index')}}" class="float-right">Back</a>
            </div>
            <div class="card-body">
                    <form method="POST" action="{{ route('states.update', $state->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <label for="country_code" class="col-md-4 col-form-label text-md-end">{{ __('Country') }}</label>

                            <div class="col-md-6">
                                <select name="country_id" class="form-control" aria-label="Default select example">
                                    <option value="">Select One</option>                                        
                                    @foreach ($countries as $country)
                                        <option value="{{$country->id}}" {{$country->id == $state->country_id ? 'selected' : ''}}>{{$country->country_code}}</option>                                        
                                    @endforeach
                                    
                                </select>
                                @error('country_code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('State Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name',$state->name) }}" required >

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                {{-- delete button  --}}
                <div class="row">
                    <div class="col-md-4" >
                        
                    </div>
                    <div class="col-md-4 p-3">
                        <form method="POST" action="{{ route('states.destroy', $state->id) }}">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger px-3">Delete</button>
                        </form>
                    </div>                        
                </div>
        </div>
    </div>  
@endsection