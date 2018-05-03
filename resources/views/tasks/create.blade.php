@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            
            <div class="text-center">
            <h1>タスク新規作成ページ</h1>
            </div>
    
    
    {!! Form::model($task, ['route' => 'tasks.store'], ['class' => 'form-horizontal']) !!}

        <div class="form-group">
        {!! Form::label('content', 'タスク内容:') !!}
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
        

        {!! Form::submit('登録', ['class' => 'btn btn-primary btn-lg center-block']) !!}

    {!! Form::close() !!}
    
    </div>
    </div>

@endsection