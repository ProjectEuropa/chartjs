<div class="container" id="search-form">
<h4>検索条件</h4>
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