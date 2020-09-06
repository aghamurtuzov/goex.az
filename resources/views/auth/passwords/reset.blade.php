@extends("main.site")
@section("content")
    <div class="container p-5">
        <div class="row">
            <h3 class="m-auto pb-5">Change Password</h3>
        </div>
        <div class="row">
            <div class="col-4 m-auto">
                @includeif('partials.session-message')
                <form action="{{route("reset")}}" method="post" class="text-left">
                    @csrf
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="email" name="email" class="form-control input-pl10" id="email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" name="password" class="form-control input-pl10" id="exampleInputPassword1">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Confirm Password</label>
                        <input type="password" name="password_confirmation" class="form-control input-pl10" id="exampleInputPassword2">
                    </div>
                    <input type="hidden" name="token" class="form-control input-pl10" value="{{ $token }}">
                    <button type="submit" class="btn btn-primary">Password</button>
                </form>
            </div>
        </div>
    </div>
@endsection
