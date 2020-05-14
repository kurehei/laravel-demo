<!-- layoutsのhtmlを埋め込んでいる　-->
@extends('layouts.app')

@section('content')
<!-- ここにcontentのページを描いていく -->
<!-- 通常laravelでオブジェクトを展開する時は{{--  --}}で展開するこうすると、htmlspecialchar関数が適用される --->
  <h1>{{ $message->id }}の詳細ページ</h1>

  <table class="table table-bordered">
    <tr>
      <th>id</th>
      <td>{{ $message->id }}</td>
    </tr>
    <tr>
      <th>メッセージ</th>
      <td>{{ $message->content }}</td>
    </tr>
  </table>

{!! link_to_route('messages.edit', 'このメッセージを編集', [$message->id], ['class' => 'btn btn-light']) !!}
{!! Form::model($message, ['route' => ['messages.destroy', $message->id], 'method' => 'delete']) !!}
  {!! Form::submit('削除', ['class' => 'btn btn-danger']) !!}
{!! Form::close() !!}
@endsection
