@extends('layouts.app')

@section('content')
        
    @if (Auth::check())
        <div class="container">
            <div class="row pull-right">
                
            <div class="dropdown">
            <button type="button" class="btn btn-default btn-sm" data-toggle="collapse" data-target="#kensaku">検索フォームを展開</button>
            </div>
            </div>
            <br><br>
            <div id="kensaku" class="collapse pull-right">
            {!! Form::open(['method' => 'GET', 'route' => 'tasks.home']) !!}
            {!! Form::text('s', null,array('placeholder'=>'検索したいワードを入力')) !!}
            

            {!! Form::label('t', 'タイプ') !!}
            {!! Form::select('t', [
            '' => '--',
            '家の用事'=>'家の用事',
            '会社'=>'会社',
            '趣味'=>'趣味']
            ) !!}
            
            
            
            {!! Form::label('st', '進捗状況') !!}
            {!! Form::select('st', [
            '' => '--',
            '未実行'=>'未実行',
            '実行中'=>'実行中',
            '完了'=>'完了']
            ) !!}
            
            
            
            {!! Form::submit('検索', ['class' => 'btn btn-primary btn-xs'] ) !!}
            {!! Form::close() !!}
            
        
             </div>
        
        </div>
            
        <div class="container">
            <div>
                @if (count($tasks) > 0)
                    @include('tasks.tasks', ['tasks' => $tasks])
                @endif
                
            </div>
            {!! link_to_route('tasks.create', '新しいタスクの登録') !!}
        
        </div>
        
        
        
        
    @else
    <div class="center jumbotron">
        <div class="text-center">
            <h1>Welcome to the Tasklist</h1>
            {!! link_to_route('signup.get', 'Sign up now!', null, ['class' => 'btn btn-lg btn-primary']) !!}
        </div>
    </div>
    @endif
    
    <!--<script type="text/javascript" src="js/test.js"></script>-->
    
@endsection