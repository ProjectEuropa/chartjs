<nav class="navbar navbar-expand-lg navbar-light bg-warning">
    <a class="navbar-brand" href="#"><i class="fas fa-hospital-user"></i> ECIS</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      @if(Auth::check())
      <ul class="navbar-nav mr-auto">
        @if(Auth::user()->user_type == 1)
        <li class="nav-item active">
          <a class="nav-link" href="{{ route('mypage') }}">マイページ</a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              グラフ（施設）
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{ route('pcr_chart', ['data_type' => 'positive', 'graph_type' => 'count', 'chart_type' => 'facility']) }}">PCR検査陽性者数</a>
              <a class="dropdown-item" href="{{ route('pcr_chart', ['data_type' => 'positive', 'graph_type' => 'rate', 'chart_type' => 'facility']) }}">PCR検査陽性者割合</a>
              <a class="dropdown-item" href="{{ route('pcr_chart', ['data_type' => 'target', 'graph_type' => 'count', 'chart_type' => 'facility']) }}">PCR検査対象者数</a>
              <a class="dropdown-item" href="{{ route('pcr_chart', ['data_type' => 'target', 'graph_type' => 'rate', 'chart_type' => 'facility']) }}">PCR検査対象者割合</a>
              <a class="dropdown-item" href="{{ route('ppe_chart', ['data_type' => 'used', 'chart_type' => 'facility']) }}">PPE使用数</a>
              <a class="dropdown-item" href="{{ route('ppe_chart', ['data_type' => 'visit', 'chart_type' => 'facility']) }}">PPE使用訪問数</a>
              <a class="dropdown-item" href="{{ route('questionnaire_chart', ['data_type' => 1, 'chart_type' => 'facility']) }}">アンケート（医療機関）</a>
              <a class="dropdown-item" href="{{ route('questionnaire_chart', ['data_type' => 2, 'chart_type' => 'facility']) }}">アンケート（支援ニーズ）</a>
            </div>
        </li>
        @endif
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              グラフ（統計）
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{ route('pcr_chart', ['data_type' => 'positive', 'graph_type' => 'count', 'chart_type' => 'area']) }}">PCR検査陽性者数</a>
              <a class="dropdown-item" href="{{ route('pcr_chart', ['data_type' => 'positive', 'graph_type' => 'rate', 'chart_type' => 'area']) }}">PCR検査陽性者割合</a>
              <a class="dropdown-item" href="{{ route('pcr_chart', ['data_type' => 'target', 'graph_type' => 'count', 'chart_type' => 'area']) }}">PCR検査対象者数</a>
              <a class="dropdown-item" href="{{ route('pcr_chart', ['data_type' => 'target', 'graph_type' => 'rate', 'chart_type' => 'area']) }}">PCR検査対象者割合</a>
              <a class="dropdown-item" href="{{ route('ppe_chart', ['data_type' => 'used', 'chart_type' => 'area']) }}">PPE使用数</a>
              <a class="dropdown-item" href="{{ route('ppe_chart', ['data_type' => 'visit', 'chart_type' => 'area']) }}">PPE使用訪問数</a>
              <a class="dropdown-item" href="{{ route('questionnaire_chart', ['data_type' => 1, 'chart_type' => 'area']) }}">アンケート（医療機関）</a>
              <a class="dropdown-item" href="{{ route('questionnaire_chart', ['data_type' => 2, 'chart_type' => 'area']) }}">アンケート（支援ニーズ）</a>
            </div>
        </li>
        @if(Auth::user()->user_type == 3)
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              管理メニュー
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{ route('user.index') }}">ユーザー一覧</a>
              <a class="dropdown-item" href="{{ route('facility.index') }}">施設一覧</a>
              <a class="dropdown-item" href="{{ route('facility.create') }}">施設追加</a>
            </div>
        </li>
        @endif
      </ul>
      @endif
      @if(Auth::check())
        <button class="btn btn-success my-2 my-sm-0" type="submit" onclick="logout()">ログアウト</button>
      @endif
    </div>
  </nav>