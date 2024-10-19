<div class="modal fade" id="edit_{{$plan->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form method="post" action="{{route('admin.plan.update', $plan->id)}}" enctype="multipart/form-data">
        @csrf
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Plan</h5>

                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Plan Name</label>
                        <input name="name" value="{{$plan->name}}" required class="form-control" type="text" placeholder="Plan Name">
                    </div>

                    <div class="form-group">
                        <label>Plan Image</label>
                        <input name="image"  class="form-control" type="file" placeholder="Plan Image">
                        <div>
                            <img height="60px" width="60px" src="{{asset($plan->image)}}" alt="image">
                        </div>
                    </div>


                    <div class="form-group">
                        <label>Plan Amount</label>
                        <input name="amount" value="{{$plan->amount}}" step="0.01" required class="form-control" type="number" placeholder="Plan Amount">
                    </div>

                    <div class="form-group">
                        <label>Equivalent Coins</label>
                        <input name="coins" required class="form-control" value="{{$plan->coins}}" type="number" placeholder="Equivalent Coins">
                    </div>



                    <div class="form-group">
                        <label>Plan Status</label>
                        <select required name="status" class="form-control">
                            <option value="">Select Option</option>
                            <option {{$plan->status ==  1 ? 'selected' : ''}} value="1">Active</option>
                            <option {{$plan->status ==  0 ? 'selected' : ''}} value="0">Inactive</option>
                        </select>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fa fa-cancel"></i> Discard</button>
                    <button type="submit" class="btn btn-primary">Update Plan</button>
                </div>
            </div>
        </div>

    </form>
</div>




<div class="modal fade" id="delete_{{$plan->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form method="post" action="{{route('admin.plan.delete', $plan->id)}}">
        @csrf
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Plan Delete</h5>

                </div>
                <div class="modal-body">
                    Are you sure you want to delete this Plan?
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal"><i class="fa fa-cancel"></i> Discard</button>
                        <button type="submit" class="btn btn-danger">Delete Plan</button>
                    </div>
                </div>
            </div>

    </form>
</div>
