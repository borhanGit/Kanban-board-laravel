<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel Project</title>
        <!-- CSS LINK -->
        <link href="{{ asset('/css/style.css') }}" rel="stylesheet">


        @include('script.script')
      
    </head>
    <body>
    <div class="container">
        <div class="kanban-heading">
            <form action="{{route('task.store')}}" method="post">
                @csrf
                <input type="text" class="w-text" name="task"  placeholder="Write your task....." required>
                <button type="submit" class="kanban-heading-text">ADD</button>
            </form>
        </div>
        <div class="kanban-board">
            <div class="kanban-block" id="todo">
                <strong>To Do</strong>
                
            </div>
            <div class="kanban-block" id="inprogress">
                <strong>In Progress</strong>
            </div>
            <div class="kanban-block" id="done">
                <strong>Done</strong>
            </div>
        </div>
        <div class="kanban-board">
            <div class="kanban-block" id="todo1">
                @foreach($todoList as $list)
                 <h2 class="task" id="{{$list->id}}" draggable="true" ondragstart="dragFromToDo(event)">{{$list->task}}</h2>
                @endforeach
               
                
            </div>
            <div class="kanban-block" id="inprogress1" ondrop="dropFromToDo(event)" ondragover="allowDrop(event)">
                  @foreach($progressList as $list)
                     <h2 class="task" id="{{$list->id}}" draggable="true" ondragstart="dragFromProgress(event)">{{$list->task}}</h2>
                 @endforeach
               
            </div>
            <div class="kanban-block" id="done1" ondrop="dropFromProcess(event)" ondragover="allowDrop(event)">
                 @foreach($doneList as $list)
                     <h2 class="task" id="{{$list->id}}">{{$list->task}}</h2>
                 @endforeach
              
            </div>
        </div>
    </div>
</body>
</html>
 