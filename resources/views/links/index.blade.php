@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">{{ __('Links') }}</div>

                    <div class="card-body">
                        @if($links->count())
                        <ul class="list-group">
                        @foreach($links as $link)
                            <li  class="list-group-item"> <strong>{{ $link->original }}</strong>
                                <ul class="list-group">
                                    <li  class="list-group-item">
                                        {{ $link->description }}
                                    </li>
                                    <li  class="list-group-item">
                                        Shorten link: <a href="{{ $link->shorten }}">{!! $link->shorten !!}</a>
                                    </li>
                                    <li  class="list-group-item">
                                        Clicks: {{$link->clicks}}
                                    </li>
                                    <li  class="list-group-item">
                                        Delete? <a href="{{ route('links.delete', $link->shorten) }}">[DELETE]</a>
                                    </li>
                                </ul>
                            </li>
                        @endforeach
                        </ul>
                        @else
                            These aren't the droids you're looking for. Sorry no links to be listed yet. Try <a href="{{ route('links.create') }}">adding some links.</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
