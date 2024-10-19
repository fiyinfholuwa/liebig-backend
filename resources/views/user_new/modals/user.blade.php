



<div class="modal fade" id="user_block_{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form method="post" action="{{route('admin.member.block', $user->id)}}">
        @csrf
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 style="font-weight:bold;" class="modal-title text-primary">User Block</h5>
                </div>
                <div class="modal-body">
                    <div class=" mb-3">
                        <label>Current Block Status:

                            @if($user->user_status == 1)
                                <span class="btn btn-success btn-sm">Unblocked<span>
                        <input name="status" value="2" type="hidden">
                      @else
                                            <span class="btn btn-danger btn-sm">  Blocked</span>
                                            <input name="status"  value="1" type="hidden">
                            @endif
                        </label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    @if($user->user_status ==1 )
                        <button type="submit"  class="btn btn-danger">Block</button>
                    @else
                        <button type="submit" class="btn btn-success"> Unblock
                            @endif</button>
                </div>
            </div>
        </div>
    </form>
</div><!-- End Disabled Animation Modal-->

<div class="modal fade" id="user_password_{{$user->id}}" tabindex="-1">
    <form method="post" action="{{route('admin.member.password.change', $user->id)}}">
        @csrf
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 style="font-weight:bold;" class="modal-title text-primary">Password Change</h5>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="email2">New Password</label>
                        <input  type="password" class="form-control" id="email2" required name="new_password" placeholder="Enter New Password">

                    </div>

                    <div class="form-group">
                        <label for="email2">New Password</label>
                        <input  type="password" class="form-control" id="email2" required name="new_password_confirmation" placeholder="Enter New Password  Confirmation">


                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                    <button type="submit" class="btn btn-success">Change Password</button>
                </div>
            </div>
        </div>
    </form>
</div><!-- End Disabled Animation Modal-->



<div class="modal fade" id="delete_{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form method="post" action="{{route('admin.user.delete', $user->id)}}">
        @csrf
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">User Delete</h5>

                </div>
                <div class="modal-body">
                    Are you sure you want to delete this User?
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal"><i class="fa fa-cancel"></i> Discard</button>
                        <button type="submit" class="btn btn-danger">Delete User</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>








