<!-- layoutsのhtmlを埋め込んでいる　-->
@extends('layouts.app')

@section('content')
  <h1>メッセージ新規作成ページ</h1>
  <div class="row">
    <div class="col-6">
      @foreach ( $errors->all() as $error)
        <li class="alert alert-danger">{{ !! $error }}</li>
      @endforeach
      <!--- Laravel CollectiveのFormを使用 --->
      <!--- @{!!-- --!!}は、渡されたデータの無害化を内部で行っている-->
      {!! Form::model($message,['route' => 'messages.store','files' => true]) !!}
        <div class="form-group">
          {!! Form::label('content','メッセージ:') !!}
          {!! Form::text('content', null, ['class' => 'form-control']) !!}
        </div>
        <div>
          {{ Form::file('image') }}
        </div>
        {!! Form::submit('投稿',['class' => 'btn btn-primary']) !!}
      {!! Form::close() !!}
    </div>
  </div>

@endsection
