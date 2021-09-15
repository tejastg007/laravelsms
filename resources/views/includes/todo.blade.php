<div class="todo-container ">
    <form action="" onsubmit="addtask(event)" method="post">
        <div class="form-group">
            <label for=""></label>
            <textarea class="form-control" name="task" id="task" rows="3" style="resize:none" required></textarea>
        </div>

        <input type="submit" class="btn btn-primary  text-capitalize" value="add task">

    </form>
    <div class="task-container py-3  " style="overflow: none; position:relative">
        <h4>Your tasks:</h4>
        <div style="height:400px;overflow-x:hidden;overflow-y:scroll" class=" tasks">
            @foreach ($tasks as $task)
                <div class="border-bottom row mb-1" @if ($task->status == 1) style="background-color:#cfffdd" @endif>
                    <div class="col-1">
                        <h5>{{ $loop->iteration }}</h5>
                    </div>
                    {{-- enables on edit action --}}
                    <textarea rows="3" style="display: none !important; resize:none"
                        class="col-8 p-0 task-edit row-{{ $task->id }}">{{ $task->task }}</textarea>
                    <a style="display: none !important" href="javascript:void(0)"
                        class="col-2 d-flex align-items-center justify-content-end task-edit-save row-{{ $task->id }}"
                        onclick="taskeditaction({{ $task->id }})">
                        <i class="fas fa-check-double text-success"></i>
                    </a>
                    {{-- enables on edit action end --}}


                    <div class="col-10 pb-2 task-content row-{{ $task->id }}">
                        <strong> {{ $task->task }}</strong>
                        <p class="text-right m-0" style="font-size: 12px">task created at :
                            {{ $task->created_at }} </p>
                        <p class="text-right m-0" style="font-size: 12px">task updated at :
                            {{ $task->updated_at }}</p>
                    </div>

                    {{-- task action buttons --}}
                    <div class="col-11  d-flex justify-content-end task-actions row-{{ $task->id }}"
                        id="{{ $task->id }}">
                        <a href="javascript:void(0)" onclick="taskcomplete({{ $task->id }},event)">
                            <i class="fas fa-check-double text-success"></i>
                        </a>
                        <a href="javascript:void(0)" onclick="taskedit({{ $task->id }})">
                            <i class="fas fa-edit text-info "></i>
                        </a>
                        <a href="javascript:void(0)" onclick="taskdelete({{ $task->id }})">
                            <i class="fa fa-window-close text-danger" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
