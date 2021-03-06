@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row py-5">
            <div class="w-100">
                <h3 class="text-center">Add your domain</h3>
            </div>
        </div>
        <domain-register
        :categories = "{{$categories}}"
        :subcategories = "{{$subcategories}}"
        ></domain-register>
    </div>
@endsection