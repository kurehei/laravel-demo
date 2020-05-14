<!-- layoutsのhtmlを埋め込んでいる　-->
@extends('layouts.app')

@section('content')
<!-- ここにcontentのページを描いていく -->
<h1>{{ $message->id }}の詳細ページ</h1>
  @foreach ( $errors->all() as $error)
    <li class="alert alert-danger">{{ !! $error }}</li>
  @endforeach
<!-- Form::model()に$message->idを入れることで、IDをパラメーターで渡している -->
 {!! Form::model($message, ['route' => ['messages.update',$message->id ], 'method' => 'put']) !!}
    <div class="form-group">
      {!! Form::label('content','メッセージ') !!}
      {!! Form::text('content',null, ['class' => 'form-control']) !!}
    </div>
    {!! Form::submit('投稿',['class' => 'btn btn-primary']) !!}
 {!! Form::close() !!}
@endsection
