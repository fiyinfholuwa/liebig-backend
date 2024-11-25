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
                            <a  data-bs-toggle="modal" data-bs-target="#add_category" class="btn btn-primary text-white"> <i class="fa fa-plus"></i> Modellbild hinzufügen</a>
                            <div class="modal fade" id="add_category" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <form method="post" action="{{route('model.image.update')}}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Bild hinzufügen</h5>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <input type="hidden" name="model_id" value="{{Auth::user()->id}}">
                                                    <label>Modell auswählen</label>
                                                </div>

                                                <div class="form-group">
                                                    <label>Bild</label>
                                                    <input name="image" required class="form-control" type="file" placeholder="Artikelbild">
                                                </div>

                                                <div class="form-group">
                                                    <label>Bildtyp</label>
                                                    <select required name="image_type" class="form-control" id="imageType">
                                                        <option value="">Bildtyp auswählen</option>
                                                        <option value="free">Kostenlos</option>
                                                        <option value="censored">Zensiert</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Bildkosten (Nur für zensiertes Bild)</label>
                                                    <input name="amount" id="imageCost" step="0.01" required class="form-control" type="number" placeholder="Bildkosten">
                                                </div>

                                                <script>
                                                    document.getElementById('imageType').addEventListener('change', function () {
                                                        const costInput = document.getElementById('imageCost');
                                                        if (this.value === 'free') {
                                                            costInput.value = 0;
                                                            costInput.readOnly = true; // Verhindert manuelles Bearbeiten
                                                        } else if (this.value === 'censored') {
                                                            costInput.value = ''; // Eingabefeld löschen
                                                            costInput.readOnly = false; // Manuelles Bearbeiten erlauben
                                                        }
                                                    });
                                                </script>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fa fa-cancel"></i> Verwerfen</button>
                                                <button type="submit" class="btn btn-primary">Bild speichern</button>
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
                                    <th>Bild</th>
                                    <th>Bildtyp</th>
                                    <th>Betrag</th>
                                    <th class="no-content">Aktionen</th>
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
                                    @include('user_new.modals.model_image')
                                @endforeach

                                </tbody>

                            </table>

                        </div>
                    </div>
                </div>

            </div>

        </div>

@endsection
