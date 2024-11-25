<div class="modal" id="move_wallet-btn_{{$reward->id}}" tabindex="-1">
    <form method="post" action="{{route('reward_to_wallet')}}">
        @csrf
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 style="font-weight:bold;" class="modal-title text-dark">Bestätigen Sie den Transfer zum Wallet</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Sind Sie sicher, dass Sie diese Belohnung in Ihr Wallet verschieben möchten?</p>
                </div>
                <input type="hidden" name="reward_id" value="{{$reward->id}}">

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Schließen</button>
                    <button type="submit" class="btn btn-primary">Fortfahren</button>
                </div>
            </div>
        </div>
    </form>
</div><!-- End Disabled Animation Modal-->
