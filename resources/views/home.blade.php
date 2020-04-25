@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div>Dashboard</div>
                    <div>
                        <form action="{{route('logout')}}" method="POST">
                            @csrf 
                            <button type="submit">logout</button>
                        </form>
                    </div>
                </div>

                <div class="card-body">
                    You are logged in!
                    <div class="d-flex align-items-between">
                        <a href="{{route('category.create')}}" class="btn btn-success">Add category</a>
                        <a href="{{route('category.index')}}" class="btn btn-success">Show category</a>
                    </div>
                    <div class="d-flex align-items-between">
                        <a href="{{route('subcategory.create')}}" class="btn btn-success">Add subcategory</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
