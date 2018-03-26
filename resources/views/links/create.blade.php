@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Add a new link</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('links.store') }}">
                            @csrf
                            <input type="hidden" value="{{ Auth::user()->id }}" name="user_id" />
                            <div class="form-group row">
                                <label for="link" class="col-sm-4 col-form-label text-md-right">Link</label>

                                <div class="col-md-6">
                                    <input id="link" type="text" class="form-control{{ $errors->has('link') ? ' is-invalid' : '' }}" name="link" value="{{ old('link') }}" required autofocus>

                                    @if ($errors->has('link'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('link') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Shorten this link
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
