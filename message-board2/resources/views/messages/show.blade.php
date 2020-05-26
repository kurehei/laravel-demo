<!-- layoutsのhtmlを埋め込んでいる　-->
@extends('layouts.app')

@section('content')
<!-- ここにcontentのページを描いていく -->
<!-- 通常laravelでオブジェクトを展開する時は{{--  --}}で展開するこうすると、htmlspecialchar関数が適用される --->
  <div class="row">

    <table class="table table-bordered">
      <tr>
        <th>名前</th>
        <td>{{ $message->name }}</td>
      </tr>
      <tr>
        <th>メッセージ</th>
        <td>{{ $message->content }}</td>
      </tr>
      <tr>
        <th>アイコン</th>
        <td><img src="{{$message->image}}"style="width:88px; height:80px;"></td>
      </tr>
    </table>
  </div>


{!! link_to_route('messages.edit', 'このメッセージを編集', [$message->id], ['class' => 'btn btn-light']) !!}
{!! Form::model($message, ['route' => ['messages.destroy', $message->id], 'method' => 'delete']) !!}
  {!! Form::submit('削除', ['class' => 'btn btn-danger']) !!}
{!! Form::close() !!}
@endsection
