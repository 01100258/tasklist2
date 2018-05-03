<ul class="media-list">
   
    <table class="table table-striped container-fluid table-condensed" style="table-layout:fixed;width:95%">
            <thead>
                <tr>
                    <th class="col-xs-3">タスク名</th>
                    <th class="col-xs-2">タイプ</th>
                    <th class="col-xs-3">状態</th>
                    <th class="col-xs-1"></th>
                    <th class="col-xs-1"></th>
                </tr>
            </thead>
            
            <tbody>
                @foreach ($tasks as $task)
                    <tr>
                        <td>{{ $task->content }}</td>
                    
                        <?php $icon = 'camera'; ?>
                        @if($task->type === '家の用事')
                            <?php $icon = 'home'; ?>
                        @elseif($task->type === '会社')
                            <?php $icon = 'briefcase'; ?>
                        @endif
                        <td class="glyphicon glyphicon-{{$icon}}"></td>
                    
                        
                        <td>{{ $task->state }}</td>
                        <td>{!! link_to_route('tasks.edit', '編集',['id' => $task->id],['class' => 'btn btn-info']) !!}</td>
                        <td>
                           {!! Form::model($task, ['route' => ['tasks.destroy', $task->id], 'method' => 'delete']) !!}
                            {!! Form::submit('削除', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    
</ul>
{!! $tasks->render() !!}