@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-6 d-flex flex-column justify-content-center">
                <div><h1>Link Bluding with us</h1></div>
                <div><h4>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Neque consectetur quo eos? Necessitatibus, vitae. Corporis rem vero quod, iusto aperiam<h4></div>
                <div><a href="{{route('domain.create')}}" class="btn btn-primary">Submit your domain</a></div>
            </div>
            <div class="col-sm-6">
                <domain-display
                :domains = "{{$domains}}"
                :categories = "{{$categories}}"
                :subcategories = "{{$subcategories}}">
                </domain-display>
            </div>
        </div>
    </div>
@endsection