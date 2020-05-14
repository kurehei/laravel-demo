<!-- layoutsのhtmlを埋め込んでいる　-->
@extends('layouts.app')

@section('content')
<!--- ここにcontentのページを描いていく --->
  <h1 class="text-center">メッセージ一覧</h1>
  @if (count($messages) > 0)
    <table class="table table-striped">
      <thead>
        <tr>
          <th>id</th>
          <th>message</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($messages as $message)
        <tr>
          <!--- --->
          <td>{!! link_to_route('messages.show','詳細ページへ',[$message->id]) !!}</td>
          <td>{{ $message->content }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  @else
    <h1 class="text-center">データに値がありません！</h1>
  @endif
  <!--- link先を指定する link_to route()を使用する --->
  {!! link_to_route('messages.create','新規メッセージの作成へ',[],['class' => 'btn btn-primary'])!!}
@endsection
