<div class="modal fade" id="edit_{{$Item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form method="post" action="{{route('admin.item.update', $Item->id)}}" enctype="multipart/form-data">
        @csrf
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Item</h5>

                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>item Name</label>
                        <input name="name" value="{{$Item->name}}" required class="form-control" type="text" placeholder="item Name">
                    </div>

                    <div class="form-group">
                        <label>item Image</label>
                        <input name="image"  class="form-control" type="file" placeholder="item Image">
                        <div>
                            <img height="60px" width="60px" src="{{asset($Item->image)}}" alt="image">
                        </div>
                    </div>


                    <div class="form-group">
                        <label>item Amount</label>
                        <input name="amount" value="{{$Item->amount}}" required class="form-control" type="number" placeholder="item Amount">
                    </div>


                    <div class="form-group">
                        <label>item Status</label>
                        <select required name="status" class="form-control">
                            <option value="">Select Option</option>
                            <option {{$Item->status ==  1 ? 'selected' : ''}} value="1">Active</option>
                            <option {{$Item->status ==  0 ? 'selected' : ''}} value="0">Inactive</option>
                        </select>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fa fa-cancel"></i> Discard</button>
                    <button type="submit" class="btn btn-primary">Update Item</button>
                </div>
            </div>
        </div>

    </form>
</div>




<div class="modal fade" id="delete_{{$Item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form method="post" action="{{route('admin.item.delete', $Item->id)}}">
        @csrf
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Item Delete</h5>

                </div>
                <div class="modal-body">
                    Are you sure you want to delete this Item?
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal"><i class="fa fa-cancel"></i> Discard</button>
                        <button type="submit" class="btn btn-danger">Delete item</button>
                    </div>
                </div>
            </div>

    </form>
</div>
