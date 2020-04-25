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
                {{-- @foreach ($categories as $category)
                    <h4>{{$category->name}}</h4>
                    <ul>
                        @foreach($category->subcategory as $subcategory)
                            <li>{{$subcategory->subcategoryname}}</li>
                        @endforeach 
                    </ul>
                @endforeach --}}
                <show-category :categories="{{$categories}}">
                   
                </show-category>
            </div>
        </div>
    </div>
</div>
@endsection
