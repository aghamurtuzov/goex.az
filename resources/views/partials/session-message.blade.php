@if(Session::has('success-message'))
    <p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('success-message') }}</p>
@endif
@if ($errors->any())
    @foreach ($errors->all() as $error)
        <p class="alert alert-class alert-danger">{{ $error }}</p>
    @endforeach
@endif
@if(Session::has('success-error'))
    <p class="alert alert-class alert-danger">{{ Session::get('success-error') }}</p>
@endif
