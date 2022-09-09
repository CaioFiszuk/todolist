<div class="modal fade" id="window">
   <div class="modal-dialog">
     <div class="modal-content">
        <div class="modal-header">
            <h3 class="modal-title">Add a task</h3>
            <button class="btn btn-close" data-bs-dismiss="modal"></button>
        </div>

        <div class="modal-body">
            <form action="{{route('create.task')}}" method="post">
                @csrf

                <input type="text" name="task" class="form-control">

                <input type="submit" value="Add" class="btn btn-success">
            </form>
        </div>
     </div>
   </div>
</div>