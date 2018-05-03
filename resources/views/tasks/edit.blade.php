@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
    <h1>このタスクを編集する</h1>

    {!! Form::model($task, ['route' => ['tasks.update', $task->id], 'method' => 'put'],['class' => 'form-horizontal']) !!}
        
        <div class="form-group">
        {!! Form::label('content', '登録したタスクの内容') !!}
        {!! Form::text('content') !!}
        </div>
        
        <div class="form-group">
        {!! Form::label('type', 'タイプ') !!}
        {!! Form::select('type', [
        '家の用事'=>'家の用事',
        '会社'=>'会社',
        '趣味'=>'趣味']
        ) !!}
        </div>
        
        <div class="form-group">
        {!! Form::label('state', '進捗状況') !!}
        {!! Form::select('state', [
        '未実行'=>'未実行',
        '実行中'=>'実行中',
        '完了'=>'完了']
        ) !!}　<!--連想配列を利用-->
       </div>
        
        
        
        
        <div class="form-group">
        {!! Form::submit('更新',  ['class' => 'btn btn-success btn-lg center-block']) !!}
        </div>
        
        
    {!! Form::close() !!}
    
    </div>
    </div>
    
   

@endsection