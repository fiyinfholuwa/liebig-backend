@extends('user_new.app')

@section('title', 'Manage Model Pictures')
@section('page', 'Manage Model Pictures')
@section('content')
    <div id="content" class="main-content">
        <div class="layout-px-spacing">

            <div class="row layout-top-spacing">

                <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing card" style="padding: 30px;">

                    <div class="widget-content widget-content-area br-6">
                        <div style="margin-bottom: 30px; margin-top: 20px;" class="">
                            <a  data-bs-toggle="modal" data-bs-target="#add_category" class="btn btn-primary text-white"> <i class="fa fa-plus"></i> Add Model Image</a>
                            <div class="modal fade" id="add_category" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <form method="post" action="{{route('model.image.update')}}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Add Image</h5>

                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <input type="hidden" name="model_id" value="{{Auth::user()->id}}">
                                                    <label>Select Model</label>
                                                </div>

                                                <div class="form-group">
                                                    <label>Image</label>
                                                    <input name="image" required class="form-control" type="file" placeholder="Item Image">
                                                </div>

                                                <div class="form-group">
                                                    <label>Image Type</label>
                                                    <select required name="image_type" class="form-control" id="imageType">
                                                        <option value="">Select Image Type</option>
                                                        <option value="free">Free</option>
                                                        <option value="censored">Censored</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Image Cost (Only for Censored Image)</label>
                                                    <input name="amount" id="imageCost" step="0.01" required class="form-control" type="number" placeholder="Image Cost">
                                                </div>

                                                <script>
                                                    document.getElementById('imageType').addEventListener('change', function () {
                                                        const costInput = document.getElementById('imageCost');
                                                        if (this.value === 'free') {
                                                            costInput.value = 0;
                                                            costInput.readOnly = true; // Prevent manual editing
                                                        } else if (this.value === 'censored') {
                                                            costInput.value = ''; // Clear the input
                                                            costInput.readOnly = false; // Allow manual editing
                                                        }
                                                    });
                                                </script>


                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fa fa-cancel"></i> Discard</button>
                                                <button type="submit" class="btn btn-primary">Save Image</button>
                                            </div>
                                        </div>
                                    </div>

                                </form>

                            </div>



                        </div>
                        {{--                        <h5>Post Categories</h5>--}}
                        <div class="table-responsive">
                            <table id="my-table"  class="table dt-table-hover" style="width:100%">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Image</th>
                                    <th>Image Type</th>
                                    <th>Amount</th>
                                    <th class="no-content">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i = 1; ?>
                                @foreach($items as $Item)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td><img height="50" width="50" src="{{asset($Item->image)}}" alt="image"></td>
                                        <td>{{ $Item->image_type }}</td>
                                        <td>{{ $Item->amount }}</td>
                                        <td>
                                            <a href="#" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete_{{$Item->id}}" ><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    @include('admin.modals.model_image')
                                @endforeach

                                </tbody>

                            </table>

                        </div>
                    </div>
                </div>

            </div>

        </div>

@endsection
