@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @foreach($items as $item)
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">{{ $item['name'] }}</div>
                        <div class="card-body">
                            <p>{{ $item['description'] }}</p>
                            <p>Price: {{ $item['price'] }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection