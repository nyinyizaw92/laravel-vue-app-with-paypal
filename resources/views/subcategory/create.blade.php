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
                    <form action="{{route('subcategory.store')}}" method="POST">
                        @csrf 
                        <label for="category">Category</label>
                        <select name="category_id" id="category" class="form-control">
                            @foreach($categories as $category)
                           
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                        <div class="form-group">
                            <label for="subcategory">Enter subcategory</label>
                            <input type="text" class="form-control" name="subcategoryname">
                            @error('subcategoryname')
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
