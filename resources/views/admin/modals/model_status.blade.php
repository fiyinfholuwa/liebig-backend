



<div class="modal fade" id="delete_{{$Item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form method="post" action="{{route('admin.status.delete', $Item->id)}}">
        @csrf
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Model Status Delete</h5>

                </div>
                <div class="modal-body">
                    Are you sure you want to delete this Model Status?
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal"><i class="fa fa-cancel"></i> Discard</button>
                        <button type="submit" class="btn btn-danger">Delete item</button>
                    </div>
                </div>
            </div>

    </form>
</div>
