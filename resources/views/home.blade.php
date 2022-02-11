@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}

                    <form action="{{ route('update-dob') }}" method="post">
                        @csrf
                        <div class="form-group col-md-3">
                            <label for="dob">Date of birth</label>
                            <input class="form-control" type="date" name="dob" id="">
                        </div>
                        <button class="btn btn-secondary" type="submit">Save</button>
                    </form>
                    <a href="/birthday" class="btn btn-primary">Send Birthday Message</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
