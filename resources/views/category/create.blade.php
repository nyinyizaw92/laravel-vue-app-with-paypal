@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div>Dashboard</div>
                    <a href="{{route('home')}}">back</a>
                </div>

                <div class="card-body">
                   Add category
                    <form action="{{route('category.store')}}" method="POST">
                        @csrf 
                        <div class="form-group">
                            <label for="category">Enter category</label>
                            <input type="text" class="form-control" name="categoryname">
                            @error('categoryname')
                                <div class="error text-danger">{{$message}}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
