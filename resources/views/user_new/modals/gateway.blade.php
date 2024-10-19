
<div class="modal fade" id="edit_{{$gateway->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form method="post" action="{{route('admin.gateway.update', $gateway->id)}}">
        @csrf
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Gateway</h5>

                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Gateway Name</label>
                        <input readonly name="name" value="{{$gateway->name}}" required class="form-control" type="text" placeholder="Gateway Name">
                    </div>

                    <div class="form-group">
                        <label>Secret Key</label>
                        <input name="secret_key" value="{{$gateway->secret_key}}" required class="form-control" type="text" placeholder="Gateway Secret Key">
                    </div>


                    <div class="form-group">
                        <label>Public Key</label>
                        <input name="public_key" value="{{$gateway->public_key}}" required class="form-control" type="text" placeholder="Gateway Public Key">
                    </div>


                    <div class="form-group">
                        <label>Gateway Status</label>
                        <select required name="status" class="form-control">
                            <option value="">Select Option</option>
                            <option {{$gateway->status ==  1 ? 'selected' : ''}} value="1">Active</option>
                            <option {{$gateway->status ==  0 ? 'selected' : ''}} value="0">Inactive</option>
                        </select>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fa fa-cancel"></i> Discard</button>
                    <button type="submit" class="btn btn-primary">Update Gateway</button>
                </div>
            </div>
        </div>

    </form>
</div>




<div class="modal fade" id="delete_{{$gateway->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form method="post" action="{{route('admin.gateway.delete', $gateway->id)}}">
        @csrf
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Gateway Delete</h5>

                </div>
                <div class="modal-body">
                    Are you sure you want to delete this Gateway?
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal"><i class="fa fa-cancel"></i> Discard</button>
                        <button type="submit" class="btn btn-danger">Delete Gateway</button>
                    </div>
                </div>
            </div>

    </form>
</div>
