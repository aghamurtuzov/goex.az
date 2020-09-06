<div class="calculate_form">
    <form id="form">
        <div class="form-row">
            <div class="col-md-3">
                <label>{{ translate('width') }} (sm)</label>
            </div>
            <div class="col-md-9">
                <input type="number" name="width" value="0" id="width" required placeholder="{{ translate('width') }} (sm)" class="form-control">
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-3">
                <label>{{ translate('height') }} (sm)</label>
            </div>
            <div class="col-md-9">
                <input type="number" name="height" value="0" id="height" required placeholder="{{ translate('height') }} (sm)" class="form-control">
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-3">
                <label>{{ translate('depth') }} (sm)</label>
            </div>
            <div class="col-md-9">
                <input type="number" name="depth" value="0" id="depth" required placeholder="{{ translate('depth') }} (sm)" class="form-control">
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-3">
                <label>{{ translate('weight') }} (sm)</label>
            </div>
            <div class="col-md-9">
                <input type="number" name="weight" value="0" id="weight" required placeholder="Ceki (sm)" class="form-control">
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-3">
                <label>{{ translate('country') }}</label>
            </div>
            <div class="col-md-9">
                <select name="country_id" id="country_id" required class="form-control">
                    @foreach($countries as $country)
                        <option value="{{$country->id}}">{{$country->name_az}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-3">
                <label>{{ translate('price') }}</label>
            </div>
            <div class="col-md-9">
                <span id="result" class="text-uppercase">0 AZN</span>
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-3">
            </div>
            <div class="col-md-9">
                <button class="form-control calculate_btn">{{ translate('calculate') }}</button>
            </div>
        </div>

    </form>
</div>


