@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('URLs') }}</div>
                <div class="card-body d-flex flex-column">
                    <a type="button" href="{{route('urls.create')}}" class="btn btn-primary ms-auto mb-2">{{ __('Create') }}</a>

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">{{ __('Destination') }}</th>
                                <th scope="col">{{ __('Shortened URL') }}</th>
                                <th scope="col">{{ __('View') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($urls as $index => $url)
                            <tr>
                                <th scope="row">{{ $index + 1 }}</th>
                                <td>{{ $url->destination }}</td>
                                <td>{{ $url->shortened_url }}</td>
                                <td>{{ $url->views }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection