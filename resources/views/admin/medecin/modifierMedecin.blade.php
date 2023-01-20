@extends('admin.dashboard')
@section('content')
    <form method="POST" action="{{ route('admin.medecin.modifier',$utilisateur->id) }}">
        @csrf
        <div class="card">
            <div class="card-header text-center fw-bold text-black fs-4 bg-primary">Modifier Utilisateur</div>
            <div class="card-body">
                <div class="container mt-2">
                    <div class="row p-5">
                        <div class="col-6">
                            <div class="row mb-4 mt-2">
                                <div class="input-group col-sm">
                                    <span class="input-group-text border border-dark" id="basic-addon1"><i
                                            class="fas fa-user" style="color: blue"></i></span>
                                    <input type="text" name="nom" class="form-control border border-dark"
                                        id="inputEmail3" placeholder="nom" value="{{ $utilisateur->nom }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="row mb-4 mt-2">
                                <div class="input-group col-sm">
                                    <span class="input-group-text border border-dark" id="basic-addon1"><i
                                            class="fas fa-user" style="color: blue"></i></span>
                                    <input type="text" name="prenom" class="form-control border border-dark"
                                        id="inputEmail3" placeholder="prenom" value="{{ $utilisateur->prenom }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="row mb-4 mt-2">
                                <div class="input-group col-sm">
                                    <span class="input-group-text border border-dark" id="basic-addon1"><i
                                            class="bi bi-bag-fill" style="color: blue"></i></span>
                                    <input type="text" name="specialite" class="form-control border border-dark"
                                        id="inputEmail3" placeholder="spécialité" value="{{ $utilisateur->specialite }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="row mb-4 mt-2">
                                <div class="input-group col-sm">
                                    <span class="input-group-text border border-dark" id="basic-addon1"><i
                                            class="bi bi-geo-alt-fill" style="color: blue"></i></i></span>
                                    <input type="text" name="adresse" class="form-control border border-dark"
                                        id="inputEmail3" placeholder="adresse" value="{{ $utilisateur->adresse }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="row mb-4 mt-2">
                                <div class="input-group col-sm">
                                    <span class="input-group-text border border-dark" id="basic-addon1"><i
                                            class="bi bi-telephone-fill" style="color: blue"></i></span>
                                    <input type="text" name="telephone" class="form-control border border-dark"
                                        id="inputEmail3" placeholder="+221 7* *** ** **" value="{{ $utilisateur->telephone }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="row mb-4 mt-2">
                                <div class="input-group col-sm">
                                    <span class="input-group-text border border-dark" id="basic-addon1">role</i></span>
                                    <input type="text" name="role" class="form-control border border-dark"
                                        id="inputEmail3" placeholder="role" value="{{ $utilisateur->role }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="row mb-4 mt-2">
                                <div class="input-group col-sm">
                                    <span class="input-group-text border border-dark" id="basic-addon1"><i
                                        class="fas fa-user" style="color: blue"></i></span>
                                    <input type="text" name="name" class="form-control border border-dark"
                                        id="inputEmail3" placeholder="Pseudo" value="{{ $utilisateur->name }}">
                                </div>
                            </div>
                        </div>
                        <!--
                        <div class="col-6">
                            <div class="row mb-4 mt-2">
                                <div class="input-group col-sm">
                                    <span class="input-group-text border border-dark" id="basic-addon1">password</i></span>
                                    <input type="text" name="password" class="form-control border border-dark"
                                        id="inputEmail3" placeholder="password" value="">
                                </div>
                            </div>
                        </div>
                    -->
                        <div class="col-6">
                            <div class="row mb-4 mt-2">
                                <div class="input-group col-sm">
                                    <span class="input-group-text border border-dark" id="basic-addon1">email</i></span>
                                    <input type="text" name="email" class="form-control border border-dark"
                                        id="inputEmail3" placeholder="email" value="{{ $utilisateur->email }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <button type="submit" class="btn btn-primary mt-1" style="margin-left: 10%">ajouter</button>
                    <a href="" class="btn btn-danger" style="margin-left: 60%">retour</a>
                </div>
            </div>
        </div>
    </form>
@endsection
