<div class="modal fade" id="delete_{{$Item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form method="post" action="{{route('model.image.delete', $Item->id)}}">
        @csrf
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modellbild löschen</h5>
                </div>
                <div class="modal-body">
                    Sind Sie sicher, dass Sie dieses Modellbild löschen möchten?
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal"><i class="fa fa-cancel"></i> Verwerfen</button>
                        <button type="submit" class="btn btn-danger">Artikel löschen</button>
                    </div>
                </div>
            </div>
    </form>
</div>
</div>
