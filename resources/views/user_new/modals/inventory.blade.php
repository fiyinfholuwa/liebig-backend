

<div class="modal" id="move_wallet-btn_{{$reward->id}}" tabindex="-1">
    <form method="post" action="{{route('reward_to_wallet')}}">
        @csrf
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 style="font-weight:bold;" class="modal-title text-primary">Confirm Move to Wallet</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to move this reward to your wallet?</p>
                </div>
                <input type="hidden" name="reward_id" value="{{$reward->id}}">

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Proceed</button>
                </div>
            </div>
        </div>
    </form>
</div><!-- End Disabled Animation Modal-->


