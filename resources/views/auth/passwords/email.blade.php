@extends("main.site")
@section("content")
    <div class="container p-5">
        <div class="row">
            <h3 class="m-auto pb-5">Send Mail</h3>
        </div>
        <div class="row">

            <div class="col-4 m-auto">
                <form method="POST" action="{{ route('password.email') }}" class="text-left">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputPassword1">E-mail</label>
                        <input id="email" type="email" class="input-pl10 form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    </div>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                             <strong>{{ $message }}</strong>
                         </span>
                    @enderror
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <button type="submit" class="btn btn-primary">Send Mail</button>
                </form>
            </div>
        </div>
    </div>
@endsection
@section("css")
    <style>
        .invalid-feedback {
            display: block !important;
        }

    </style>
@endsection
