<div class="container" id="search-form">
<h4>検索条件</h4>
<legend>対象地域</legend>
<div class="row">
    <div class="col-md-4">
        <select id="prefecture" name="prefecture" class="form-control">
        <option value="0">全国</option>
        @foreach($prefectures as $prefecture)
        <option value="{{ $prefecture->id }}"
        @if($prefecture->id == $prefecture_selected)
        selected
        @endif
        >{{ $prefecture->name }}</option>
        @endforeach
        </select>
    </div>
    <div class="col-md-4">
        <select id="city" name="city" class="form-control"
        @if($prefecture_selected == 0)
        style="display:none"
        @endif
        >
        <option value="0"
        @if($city_selected == 0)
        selected
        @endif
        >全域</option>
        @if($cities)
            @foreach($cities as $city)
            <option value="{{ $city->id }}"
            @if($city->id == $city_selected)
            selected
            @endif
            >{{ $city->name }}</option>
            @endforeach
        @endif
        </select>
    </div>
    <div class="col-md-4">
        <select id="ward" name="ward" class="form-control"
        @if(!$ward_count)
        style="display:none"
        @endif
        >
        <option value="0"
        @if($ward_selected == 0)
        selected
        @endif
        >全域</option>
        @if($wards)
            @foreach($wards as $ward)
            <option value="{{ $ward->id }}"
            @if($ward->id == $ward_selected)
            selected
            @endif
            >{{ $ward->name }}</option>
            @endforeach
        @endif
        </select>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <legend>開始日</legend>
        <input type="date" name="start_day" value="{{ $start_day }}" />
    </div>
    <div class="col-md-4">
        <legend>終了日</legend>
        <input type="date" name="end_day" value="{{ $end_day }}"/>
    </div>
    <div class="col-md-4">
        <button type="submit" class="btn btn-primary" id="search">検索</button>
    </div>
</div>
</div>