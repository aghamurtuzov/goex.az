@extends("main.admin")
@section("content")
    <div class="content pt-4 pb-4">
        <div class="card useradd">
            @includeIf('partials.session-message')
            <div class="card-body">
                <form id="form" action="{{route("postSmsEdit",['id' => $result->id ?? 0])}}" method="post"
                      class="users-content">
                    @csrf
                    <fieldset class="mb-3">
                        <legend class="text-uppercase font-size-sm font-weight-bold">Sms göndər</legend>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Qəbul edən şəxs</label>
                            <div class="col-lg-10">
                                <div class="form-group">
                                    <select name="type" class="form-control select-search">
                                        <option value="0">Bütün</option>
                                        <option value="1">Müştəri</option>
                                        <option value="2">Ad günü olanlar</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row customer-code-field">
                            <label class="col-form-label col-lg-2">Müştəri kodu</label>
                            <div class="col-lg-6">
                                <input type="text" name="code" class="form-control customer-code" value="">
                                <input type="hidden" name="phone" class="customer-number" value="">
                            </div>
                            <div class="col-lg-4">
                                <span id="customer-fullname-number"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Sms Şablonu</label>
                            <div class="col-lg-10">
                                <select name="message" class="form-control select-search sms-template-choose"
                                        data-fouc>
                                    <option value="0">---Sms şablonu seç---</option>
                                    @foreach($smsTemplates as $smsTemplate)
                                        <option value="{{ $smsTemplate->message }}">{{ $smsTemplate->message }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row sms-message-field">
                            <label class="col-form-label col-lg-2">Mətn</label>
                            <div class="col-lg-10">
                                <textarea name="message" rows="4" cols="98">{{ $result->message ?? "" }}</textarea>
                            </div>
                        </div>
                    </fieldset>

                    <div class="text-right">
                        <button type="button" onclick="window.location.href='{{ url()->previous() }}'"
                                class="btn btn-primary">Geri
                        </button>
                        <button type="submit" id="sms-add-button" class="btn btn-primary">Yadda Saxla <i
                                class="icon-paperplane ml-2"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section("js")
    <script src="{{ asset('/admin/assets/js/sms.js') }}"></script>
    <script> let url = '{{ route('getCustomerWithCode') }}'; </script>
@endsection
