


@extends('user_new.app')

@section('title', 'Inventar verwalten')
@section('page', 'Inventar verwalten')
@section('content')



    <main id="main" class="main">

        <section class="section">
            <div class="row">

                <div style="margin-bottom: 30px; margin-top: 20px;" class="">
                    <a  data-bs-toggle="modal" data-bs-target="#add_category" class="btn btn-primary text-white border-0" style="background-color: deeppink"> <i class="fa fa-plus"></i>Geschenk kaufen

                    </a>
                    <div class="modal fade" id="add_category" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <form method="post" action="{{route('user.buy.gift')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Geschenk kaufen</h5>

                                    </div>
                                    <div class="modal-body">

                                        <div class="form-group">
                                            <label>Geschenke auswählen</label>
                                            <select required name="gift_id" class="form-control">
                                                <option value="">Option auswählen</option>
                                                @foreach($gifts as $gift)
                                                    <option value="{{$gift->id}}">{{$gift->name}} | Entsprechende Münzen {{$gift->points}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fa fa-cancel"></i> Verwerfen</button>
                                        <button type="submit" class="btn btn-primary"> Fortfahren</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>



                </div>

                <div class="col-lg-5">

                    <div class="card">
                        <div class="card-body">
                            {{--              <h5 class="card-title"></h5>--}}


                            <!-- Table with stripped rows -->
                            <div class="table-responsive">
                                <table id="my-table" class="table datatable">
                                    <thead>
                                    <tr>
                                        <th>
                                            ID
                                        </th>
                                        <th>
                                            Gewonnenes Item
                                        </th>
                                        <th>Gewinnhöhe</th>
                                        <th>Ausführen</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                        $i=1;
                                    @endphp
                                    <?php $i = 1; ?>
                                    @foreach($payments as $reward)
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>{{$reward->reward_name}}</td>
                                            <td>{{$reward->reward_amount}}</td>
                                            <td>

                                                <a   class="btn btn-danger text-white" data-bs-toggle="modal" data-bs-target="#move_wallet-btn_{{$reward->id}}">
                                                    Ins Inventar legen
                                                </a>
                                            </td>
                                        </tr>

                                        @include('user_new.modals.inventory')
                                    @endforeach

                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-lg-7">
                    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing card" style="padding: 30px;">

                        <div class="widget-content widget-content-area br-6">
                            <h3>Profil aktualisieren</h3>

                            <div class="row">
                                <div class="col-lg-12">
                                    <form action="{{route('user.user.update', $user->id)}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row mb-4">
                                            <div class="col-lg-12 mt-3">
                                                <label>Vollständiger Name</label>
                                                <input type="text" value="{{$user->name}}" class="form-control" name="name" placeholder="Vollständigen Namen eingeben">
                                                @error('name')
                                                <p style="color: red; font-size:10px; font-weight: bolder">{{$message}}</p>
                                                @enderror
                                            </div>

                                            <div class="col-lg-6 mt-3">
                                                <label>E-Mail</label>
                                                <input readonly type="email" value="{{$user->email}}" class="form-control" name="email" placeholder="E-Mail eingeben">
                                                @error('email')
                                                <p style="color: red; font-size:10px; font-weight: bolder">{{$message}}</p>
                                                @enderror
                                            </div>
                                            <div class="col-lg-6 mt-3">
                                                <label>Benutzername</label>
                                                <input type="text" value="{{$user->username}}" class="form-control" name="username" placeholder="Benutzernamen eingeben">
                                                @error('username')
                                                <p style="color: red; font-size:10px; font-weight: bolder">{{$message}}</p>
                                                @enderror
                                            </div>

                                            <div class="col-lg-12 mt-3">
                                                <label>Interessiert an</label>
                                                <select name="interested" class="form-control">
                                                    <option value="">Option auswählen</option>
                                                    <option value="women" {{strtolower($user->interested_in) == 'women' ? 'selected' : ''}}>Frauen</option>
                                                    <option value="men" {{strtolower($user->interested_in) == 'men' ? 'selected' : ''}}>Männer</option>
                                                </select>
                                                @error('interested')
                                                <p style="color: red; font-size:10px; font-weight: bolder">{{$message}}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Konto aktualisieren</button>
                                    </form>
                                </div>

                                <div class="row">
                                    <h3 style="margin-top: 20px;">Informationen aktualisieren</h3>
                                    <div class="col-lg-12">
                                        <form action="{{ route('update.model.user') }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row mb-4">
                                                <div class="col-lg-6 mt-3">
                                                    <label>Profilbild</label>
                                                    <input type="file" class="form-control" name="profile_image">
                                                    @error('profile_image')
                                                    <p style="color: red; font-size:10px; font-weight: bolder">{{ $message }}</p>
                                                    @enderror
                                                    <div class="col-lg-9 col-md-8">
                                                        <img style="height: 60px; width: 60px;" src="{{asset($user->profile_image)}}" alt="" class="profile-img">
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 mt-3">
                                                    <label>Alter</label>
                                                    <input type="number" class="form-control" name="age" placeholder="Alter eingeben" value="{{ old('age', $user->age) }}">
                                                    @error('age')
                                                    <p style="color: red; font-size:10px; font-weight: bolder">{{ $message }}</p>
                                                    @enderror
                                                </div>

                                                <div class="col-lg-12 mt-3">
                                                    <label>Über mich</label>
                                                    <textarea class="form-control" name="about_me" placeholder="Über mich eingeben">{{ old('about_me', $user->about_me) }}</textarea>
                                                    @error('about_me')
                                                    <p style="color: red; font-size:10px; font-weight: bolder">{{ $message }}</p>
                                                    @enderror
                                                </div>

                                                <div class="col-lg-6 mt-3">
                                                    <label>Meine Interessen</label>
                                                    <textarea class="form-control" name="my_interest" placeholder="Interessen eingeben">{{ old('my_interest', $user->my_interest) }}</textarea>
                                                    @error('my_interest')
                                                    <p style="color: red; font-size:10px; font-weight: bolder">{{ $message }}</p>
                                                    @enderror
                                                </div>

                                                <div class="col-lg-6 mt-3">
                                                    <label>Adresse</label>
                                                    <textarea class="form-control" name="address" placeholder="Adresse eingeben">{{ old('address', $user->address) }}</textarea>
                                                    @error('address')
                                                    <p style="color: red; font-size:10px; font-weight: bolder">{{ $message }}</p>
                                                    @enderror
                                                </div>

                                                <div class="col-lg-4 mt-3">
                                                    <label>Sexualität</label>
                                                    <input type="text" class="form-control" name="sexuality" placeholder="Sexualität eingeben" value="{{ old('sexuality', $user->sexuality) }}">
                                                    @error('sexuality')
                                                    <p style="color: red; font-size:10px; font-weight: bolder">{{ $message }}</p>
                                                    @enderror
                                                </div>

                                                <div class="col-lg-4 mt-3">
                                                    <label>Augenfarbe</label>
                                                    <input type="text" class="form-control" name="eye_color" placeholder="Augenfarbe eingeben" value="{{ old('eye_color', $user->eye_color) }}">
                                                    @error('eye_color')
                                                    <p style="color: red; font-size:10px; font-weight: bolder">{{ $message }}</p>
                                                    @enderror
                                                </div>

                                                <div class="col-lg-4 mt-3">
                                                    <label>Haare</label>
                                                    <input type="text" class="form-control" name="hair" placeholder="Haare eingeben" value="{{ old('hair', $user->hair) }}">
                                                    @error('hair')
                                                    <p style="color: red; font-size:10px; font-weight: bolder">{{ $message }}</p>
                                                    @enderror
                                                </div>

                                                <div class="col-lg-4 mt-3">
                                                    <label>Körpertyp</label>
                                                    <input type="text" class="form-control" name="body_type" placeholder="Körpertyp eingeben" value="{{ old('body_type', $user->body_type) }}">
                                                    @error('body_type')
                                                    <p style="color: red; font-size:10px; font-weight: bolder">{{ $message }}</p>
                                                    @enderror
                                                </div>

                                                <div class="col-lg-4 mt-3">
                                                    <label>Größe</label>
                                                    <input type="text" class="form-control" name="height" placeholder="Größe eingeben" value="{{ old('height', $user->height) }}">
                                                    @error('height')
                                                    <p style="color: red; font-size:10px; font-weight: bolder">{{ $message }}</p>
                                                    @enderror
                                                </div>

                                                <input type="hidden" class="form-control" name="userid" value="{{ $user->id}}">
                                            </div>

                                            <button type="submit" class="btn btn-primary">Modellinformationen aktualisieren</button>
                                        </form>
                                    </div>
                                </div>


                                <h3 class="mt-3">Passwort ändern</h3>
                                <section id="multiple-column-form">
                                    <div class="card-body">
                                        <form action="{{route('user.password.change')}}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group mt-2">
                                                <label for="email2">Altes Passwort</label>
                                                <input type="password" class="form-control" id="email2" required name="old_password" placeholder="Geben Sie das alte Passwort ein">
                                                <small style="color:red; font-weight:500">
                                                    @error('old_password')
                                                    {{$message}}
                                                    @enderror
                                                </small>
                                            </div>

                                            <div class="form-group mt-2">
                                                <label for="email2">Neues Passwort</label>
                                                <input type="password" class="form-control" id="email2" required name="new_password" placeholder="Geben Sie das neue Passwort ein">
                                                <small style="color:red; font-weight:500">
                                                    @error('new_password')
                                                    {{$message}}
                                                    @enderror
                                                </small>
                                            </div>

                                            <div class="form-group mt-2">
                                                <label for="email2">Neues Passwort bestätigen</label>
                                                <input type="password" class="form-control" id="email2" required name="new_password_confirmation" placeholder="Geben Sie die Bestätigung des neuen Passworts ein">
                                                <small style="color:red; font-weight:500">
                                                    @error('new_password_confirmation')
                                                    {{$message}}
                                                    @enderror
                                                </small>
                                            </div>

                                            <div class="card-action mt-4">
                                                <button class="btn btn-primary">Passwort ändern</button>
                                            </div>
                                        </form>
                                    </div>
                                </section>

        </section>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>



    </main><!-- End #main -->

@endsection
