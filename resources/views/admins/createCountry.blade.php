@extends('layouts.adminsApp')

@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-5 d-inline">Create Countries</h5>
                    <form method="POST" action="{{ route('admin.store.country') }}" enctype="multipart/form-data">
                        @csrf
                        <!-- Email input -->
                        <div class="form-outline mb-4 mt-4">
                            <input type="text" name="name" id="form2Example1" class="form-control"
                                placeholder="name" value="{{ old('name') }}"/>
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                        </div>
                        <div class="form-outline mb-4 mt-4">
                            <input type="file" name="image" id="form2Example1" class="form-control" value="{{ old('image') }}"/>
                            @error('image')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-outline mb-4 mt-4">
                            <input type="text" name="continent" id="form2Example1" class="form-control"
                                placeholder="continent" value="{{ old('continent') }}"/>
                            @error('continent')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                        </div>
                        <div class="form-outline mb-4 mt-4">
                            <input type="text" name="population" id="form2Example1" class="form-control"
                                placeholder="population" value="{{ old('population') }}"/>
                            @error('population')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                        </div>
                        <div class="form-outline mb-4 mt-4">
                            <input type="text" name="territory" id="form2Example1" class="form-control"
                                placeholder="territory" value="{{ old('territory') }}"/>
                            @error('territory')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                        </div>
                        <div class="form-outline mb-4 mt-4">
                            <input type="text" name="avg_price" id="form2Example1" class="form-control"
                                placeholder="average price" value="{{ old('avg_price') }}"/>
                            @error('territory')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                        </div>
                        <div class="form-floating">
                            <textarea name="description" class="form-control" placeholder="description" id="floatingTextarea2"
                                style="height: 100px">{{ old('description') }}</textarea>
                            @error('description')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <br>

                        <!-- Submit button -->
                        <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">create</button>


                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
