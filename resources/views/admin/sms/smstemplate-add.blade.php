@extends("main.admin")
@section("content")
    <div class="content pt-4 pb-4">
        <div class="card useradd">
            <div class="card-body">
                @includeIf('partials.session-message')
                <form action="{{  route('postSmsTemplateEdit',[$result->id ?? 0])}}" method="post"
                      class="users-content">
                    @csrf
                    <fieldset class="mb-3">
                        <legend class="text-uppercase font-size-sm font-weight-bold">Sms Şablonu Yarat</legend>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Mətn
                            </label>
                            <div class="col-lg-10">
                                    <textarea maxlength="160" name="message" class="form-control" rows="5"
                                              placeholder="Yarat">{{ $result->message ?? "" }}</textarea>
                            </div>
                        </div>
                    </fieldset>
                    <div class="text-right">
                        <button type="button" onclick="window.location.href='{{ url()->previous() }}'"
                                class="btn btn-primary">Geri
                        </button>
                        <button type="submit" class="btn btn-primary">Yarat <i
                                class="icon-arrow-right14 position-right"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
