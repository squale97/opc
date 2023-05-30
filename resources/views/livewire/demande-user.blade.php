<div class="">
    <div class="app-content">
        <div class="side-app">
            @if ($session != null)
                @if (Carbon\Carbon::parse($session->date_fermeture) < Carbon\Carbon::now())
                    <div class="text-center mt-10">
                        <p>Cette session est espiré depuis le
                            {{ Carbon\Carbon::parse($session->date_fermeture)->format('d-m-Y') }}</p>
                    </div>
                @else
                    <div class="row">
                        <div class="col-md-12 ">
                            <div class="text-center mb-2">
                                <h2>Nouvelle demande d'inscription à l'OPC</h2>
                            </div>
                            <div class="alert alert-danger text-center" role="alert">
                                Veuillez renseigner les informations correctes sous peine de poursuites judiciaires
                            </div>

                            <form wire:submit.prevent="saveDemande" method="post" enctype="multipart/form-data">

                                {{ method_field('POST') }}
                                @csrf

                                <div class="card">

                                    <div class="card-header">
                                        <h3 class="mb-0 card-title">IDENTITE</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Nom <span
                                                            class="text-red">*</span></label>
                                                    <input type="text" class="form-control" name="nom"
                                                        placeholder="Entrer votre Nom complet" wire:model="nom">
                                                    @error('nom')
                                                        <div class="text-red"> {{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label">Date de naissance <span
                                                            class="text-red">*</span></label>
                                                    <input type="date" class="form-control" name="datenaissance"
                                                        placeholder="Entrer votre Date de naissance"
                                                        wire:model="datenaissance">
                                                    @error('datenaissance')
                                                        <div class="text-red"> {{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group ">
                                                    <label class="form-label mt-0">Genre <span
                                                            class="text-red">*</span></label>
                                                    <select
                                                        class="form-control select2 custom-select select2-hidden-accessible"
                                                        wire:model="genre" data-placeholder="Chosir" tabindex="-1"
                                                        aria-hidden="true" name="genre">
                                                        <option label="Choisir le genre">
                                                        </option>
                                                        <option value="M"
                                                            {{ $demande->genre == 'M' ? 'selected' : '' }}>Masculin
                                                        </option>
                                                        <option value="F"
                                                            {{ $demande->genre == 'F' ? 'selected' : '' }}>Feminin
                                                        </option>
                                                    </select>
                                                    @error('genre')
                                                        <div class="text-red"> {{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label class="form-label">Numéro de pièce d’identification <span
                                                            class="text-red">*</span></label>
                                                    <input type="text" class="form-control" name="refidentite"
                                                        placeholder="Entrer votre la Référence de pièce d’identification "
                                                        wire:model="refidentite">
                                                    @error('refidentite')
                                                        <div class="text-red"> {{ $message }}</div>
                                                    @enderror
                                                    <input type="hidden" class="form-control" name="session"
                                                        value="{{ $session }}" wire:mode="session">

                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Prénom <span
                                                            class="text-red">*</span></label>
                                                    <input type="text" class="form-control" name="prenom"
                                                        placeholder="Entrer votre prenom" wire:model="prenom">
                                                    @error('prenom')
                                                        <div class="text-red"> {{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label">Lieu de naissance <span
                                                            class="text-red">*</span></label>
                                                    <input type="text" class="form-control" name="lieunaissance"
                                                        placeholder="Entrer votre Lieu de naissance"
                                                        wire:model="lieunaissance">
                                                    @error('lieunaissance')
                                                        <div class="text-red"> {{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group form-elements">
                                                    <div class="form-label">Type de pièce d’identification <span
                                                            class="text-red">*</span> </div>
                                                    <div class="custom-controls-stacked">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="type"
                                                                id="inlineRadio1" value="CNIB"
                                                                {{ $demande->typepiece == 'CNIB' ? 'checked' : '' }}
                                                                wire:model="type">
                                                            <label class="form-check-label"
                                                                for="inlineRadio1">CNIB</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="type"
                                                                id="inlineRadio2" value="PASSEPORT"
                                                                {{ $demande->typepiece == 'PASSEPORT' ? 'checked' : '' }}
                                                                wire:model="type">
                                                            <label class="form-check-label"
                                                                for="inlineRadio2">PASSEPORT</label>
                                                        </div>


                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label">Date de délivrance de la pièce <span
                                                            class="text-red">*</span></label>
                                                    <input type="date" class="form-control" name="datedelivrance"
                                                        placeholder="Entrer la Date de delivrance de la pièce"
                                                        wire:model="datedelivrance">
                                                    @error('datenaissance')
                                                        <div class="text-red"> {{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="mb-0 card-title">ADRESSE PERMANENTE </h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">N° téléphone <span
                                                            class="text-red">*</span></label>
                                                    <input type="number" class="form-control" name="telephone"
                                                        placeholder="N° téléphone" wire:model="telephone">
                                                    @error('telephone')
                                                        <div class="text-red"> {{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label">Adresse E-mail <span
                                                            class="text-red">*</span></label>
                                                    <input type="email" wire:model="email" class="form-control "
                                                        name="email" placeholder="Adresse E-mail..">
                                                    @error('email')
                                                        <div class="text-red"> {{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group ">
                                                    <label class="form-label mt-0">Milieu d’habitation <span
                                                            class="text-red">*</span></label>
                                                    <select
                                                        class="form-control select2 custom-select select2-hidden-accessible"
                                                        wire:model="habitation" data-placeholder="Chosir" tabindex="-1"
                                                        aria-hidden="true" name="habitation">
                                                        <option label="Chosir votre milieu d’habitation">
                                                        </option>
                                                        <option value="Urbain"
                                                            {{ $demande->residence == 'Urbain' ? 'selected' : '' }}>
                                                            Urbain </option>
                                                        <option value="Rural"
                                                            {{ $demande->residence == 'Rural' ? 'selected' : '' }}>
                                                            Rural</option>
                                                    </select>
                                                    @error('habitation')
                                                        <div class="text-red"> {{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Personne à contacter en cas de besoin
                                                        <span class="text-red">*</span></label>
                                                    <input type="text" class="form-control " wire:model="nom_personne"
                                                        name="nom_personne" placeholder="Nom et prénom (s)">
                                                    @error('nom_personne')
                                                        <div class="text-red"> {{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label">Téléphone de la personne à contacter
                                                        <span class="text-red">*</span> </label>
                                                    <input type="number" class="form-control"
                                                        wire:model="tel_personne" name="tel_personne"
                                                        placeholder="N° téléphone">
                                                    @error('tel_personne')
                                                        <div class="text-red"> {{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="form-group ">
                                                    <label class="form-label mt-0">Région <span
                                                            class="text-red">*</span></label>
                                                    <select id="region" class="form-control" name="region"
                                                        wire:model="region">
                                                        <option selected> Choisir la région</option>
                                                        @if (count($regions) > 0)
                                                            @foreach ($regions as $laRegion)
                                                                <option value="{{ $laRegion->uuid }}">
                                                                    {{ $laRegion->libelle }}</option>
                                                            @endforeach
                                                        @else
                                                            <option>Aucune région trouvée</option>
                                                        @endif
                                                    </select>
                                                    @error('region')
                                                        <div class="text-red"> {{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            @if ($region)

                                                <div class="col-md-6 col-12 ">
                                                    <div class="form-group ">
                                                        <label for="provinces"><small><strong>Province de
                                                                    résidence</strong></small><span
                                                                class="text-danger">*</span></label>
                                                        <select name="provinces"
                                                            class="form-control @error('province') is-invalid @enderror"
                                                            wire:model="provinces">
                                                            <option value="">Choisir la province</option>
                                                            @if ($province != null)
                                                                @foreach ($province as $laProvince)
                                                                    <option value="{{ $laProvince->uuid }}">
                                                                        {{ $laProvince->libelle }}</option>
                                                                @endforeach
                                                            @else
                                                                <option>Aucune province trouvée</option>
                                                            @endif
                                                        </select>
                                                        @error('provinces')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            @endif
                                            @if ($provinces)
                                                <div class="col-md-6 col-12 mb-1">
                                                    <label for="communes"><small><strong>Commune de
                                                                résidence</strong></small><span
                                                            class="text-danger">*</span></label>
                                                    <select name="communes"
                                                        class="form-control  @error('commune') is-invalid @enderror"
                                                        wire:model="communes">
                                                        <option value="">Choisir la commune</option>
                                                        @if ($commune != null)
                                                            @foreach ($commune as $laCommune)
                                                                <option value="{{ $laCommune->uuid }}">
                                                                    {{ $laCommune->libelle }}</option>
                                                            @endforeach
                                                        @else
                                                            <option>Aucune commune trouvée</option>
                                                        @endif
                                                    </select>
                                                    @error('communes')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            @endif
                                        </div>
                                        <div class="row">
                                            @if ($communes)
                                                @if ($commune_statut == true)
                                                    <div class="col-md-12 col-12 mb-1">
                                                        <label for="province"><small><strong>Arrondissement de
                                                                    résidence</strong></small><span
                                                                class="text-danger">*</span></label>
                                                        <select name="arrondisements"
                                                            class="form-control @error('arrondisements') is-invalid @enderror"
                                                            wire:model="arrondissements">
                                                            <option value="">Choisir l'arrondissement</option>
                                                            @if ($arrondissement != null)
                                                                @foreach ($arrondissement as $laArrondissement)
                                                                    <option value="{{ $laArrondissement->uuid }}">
                                                                        {{ $laArrondissement->libelle }}</option>
                                                                @endforeach
                                                            @else
                                                                <option>Aucun arrondissement trouvé</option>
                                                            @endif
                                                        </select>
                                                        @error('arrondissements')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                @else
                                                    <div class="col-md-6 col-12 mb-1">
                                                        <label for="province"><small><strong>Secteur de
                                                                    résidence</strong></small></label>
                                                        <select name="secteurs"
                                                            class="form-control  @error('secteurs') is-invalid @enderror"
                                                            wire:model="secteurs">
                                                            <option value="">Choisir le secteur</option>
                                                            @if ($secteur != null)
                                                                @foreach ($secteur as $laSecteur)
                                                                    <option value="{{ $laSecteur->uuid }}">
                                                                        {{ $laSecteur->libelle }}</option>
                                                                @endforeach
                                                            @else
                                                                <option>Aucun secteur trouvée</option>
                                                            @endif
                                                        </select>
                                                        @error('secteurs')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-6 col-12 mb-1">
                                                        <label for="province"><small><strong>village de
                                                                    résidence</strong></small></label>
                                                        <select name="villages"
                                                            class="form-control  @error('villages') is-invalid @enderror"
                                                            wire:model="villages">
                                                            <option value="">Choisir le vilage</option>
                                                            @if ($village != null)
                                                                @foreach ($village as $laVillage)
                                                                    <option value="{{ $laVillage->uuid }}">
                                                                        {{ $laVillage->libelle }}</option>
                                                                @endforeach
                                                            @else
                                                                <option>Aucune village trouvée</option>
                                                            @endif
                                                        </select>
                                                        @error('villages')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                @endif
                                            @endif
                                        </div>

                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="mb-0 card-title">FORMATION </h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <span class="custom-control">Type d’enseignement <span
                                                        class="text-red">*</span></span>
                                                @foreach ($formations as $laFormation)
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="formation"
                                                            value="{{ $laFormation->uuid }}" wire:model="formation">
                                                        <label class="form-check-label"
                                                            for="{{ $laFormation->uuid }}">{{ $laFormation->libelle }}</label>
                                                    </div>
                                                @endforeach
                                            </div>

                                            @if ($formation)
                                                <div class="col-md-12">
                                                    @if ($typeFormation == 'Formation professionnelle')
                                                        <span class="custom-control">Niveau de formation
                                                            professionnelle <span>*</span></span>
                                                    @else
                                                        <span class="custom-control">Niveau d’instruction <span
                                                                class="text-red">*</span></span>
                                                    @endif
                                                    @foreach ($niveaux as $key => $leNiveau)
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio"
                                                                wire:model="niveau" value="{{ $leNiveau->uuid }}"
                                                                name="niveau" id="niveauCheck{{ $key }}">
                                                            <label class="form-check-label"
                                                                for="niveauCheck{{ $key }}">{{ $leNiveau->libelle }}</label>
                                                        </div>
                                                    @endforeach

                                                </div>
                                            @endif
                                            @if ($niveau)
                                                <div class="col-12 mt-4">

                                                    @if ($typeFormation == 'Enseignements général et technique' || $typeFormation == 'Aucun')

                                                        @if ($diplomes->count() != 0)
                                                            <span class="custom-control">Dernier diplome</span>
                                                            @foreach ($diplomes as $key => $leDiplome)
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio"
                                                                        wire:model="diplome"
                                                                        value="{{ $leDiplome->uuid }}" name="diplome"
                                                                        id="diplomeCheck{{ $key }}">
                                                                    <label class="form-check-label"
                                                                        for="diplomeCheck{{ $key }}">{{ $leDiplome->libelle }}</label>
                                                                </div>
                                                            @endforeach
                                                            {{-- @else
                                    <option>Aucun diplôme trouvé</option> --}}
                                                        @endif
                                                    @else
                                                        <div class="form-group mt-4">
                                                            <label class="form-label">Titre de
                                                                qualification</label>
                                                            <input type="text" class="form-control "
                                                                wire:model="qualification"
                                                                value="{{ old('qualification') ?? $demande->qualification }}"
                                                                name="qualification"
                                                                placeholder="Titre de qualification">
                                                            @error('qualification')
                                                                <div class="text-red"> {{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    @endif
                                                </div>
                                            @endif

                                        </div>

                                        <div class="row">
                                            <div class="col-md-6 mt-4">
                                                <div class="form-group">
                                                    <span class="custom-control">Langue de formation <span
                                                            class="text-red">*</span></span>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio"
                                                            wire:model="langue" name="langue" id="fr" value="Français"
                                                            {{ $demande->langue == 'Français' ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="fr">Français</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio"
                                                            wire:model="langue" name="langue" id="m" value="Mooré"
                                                            {{ $demande->langue == 'Mooré' ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="m">Mooré</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio"
                                                            wire:model="langue" name="langue" id="d" value="Dioula"
                                                            {{ $demande->langue == 'Dioula' ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="d">Dioula</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio"
                                                            wire:model="langue" name="langue" id="f" value="Fulfuldé"
                                                            {{ $demande->langue == 'Fulfuldé' ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="f">Fulfuldé</label>
                                                    </div>
                                                    @error('langue')
                                                        <div class="text-red"> {{ $message }}</div>
                                                    @enderror
                                                </div>

                                            </div>
                                            <div class="col-md-6 mt-4">
                                                <div class="form-group">
                                                    <span class="custom-control">Catégorie de permis <span
                                                            class="text-red">*</span></span>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio"
                                                            wire:model="permis" name="permis" id="permis"
                                                            value="Permis C" onclick="selectionPermisC()">
                                                        <label class="form-check-label" for="permis">Permis C</label>
                                                        @error('permis')
                                                            <div class="text-red"> {{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio"
                                                            wire:model="permis" name="permis" id="permis1"
                                                            value="Permis D" onclick="selectionPermisD()">
                                                        <label class="form-check-label" for="permis1">Permis D</label>
                                                        @error('permis')
                                                            <div class="text-red"> {{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio"
                                                            wire:model="permis" name="permis" id="permis2"
                                                            value="Permis E">
                                                        <label class="form-check-label" for="permis2">Permis E</label>
                                                        @error('permis')
                                                            <div class="text-red"> {{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                </div>



                                            </div>
                                            <div class="col-12 text-center">
                                                <div class="form-group">
                                                    <label class="form-label">Occupation actuelle <span
                                                            class="text-red">*</span></label>
                                                    <input type="text" class="" name="occupation"
                                                        placeholder="Occupation actuelle " wire:model="occupation">
                                                    @error('occupation')
                                                        <div class="text-red"> {{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="mb-0 card-title">Documents </h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <div class="form-label">Copie simple de la CNIB <span
                                                            class="text-red">*</span></div>
                                                    <input type="file" wire:model="cnibfile" class="dropify"
                                                        name="cnibfile" data-height="300" />
                                                    @error('cnibfile')
                                                        <div class="text-red"> {{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            @if ($typeFormation != 'Aucun')
                                                @if ($typeniveau != 'Aucun')
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <div class="form-label">Copie simple du diplôme exigé
                                                            </div>
                                                            <input type="file" class="dropify"
                                                                wire:model="diplomefile" name="diplomefile"
                                                                data-height="300" />
                                                            @error('diplomefile')
                                                                <div class="text-red"> {{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                @endif
                                            @endif

                                            @if ($permis == 'Permis D')
                                                <div class="col-lg-6" id="prmisfile">
                                                    <div class="form-group">
                                                        <div class="form-label">copie simple du permis C</div>
                                                        <input type="file" class=""
                                                            wire:model="permisfile" name="permisfile"
                                                            data-height="300" />
                                                        @error('permisfile')
                                                            <div class="text-red"> {{ $message }}</div>
                                                        @enderror
                                                    </div>
                                            @endif
                                            @if ($permis == 'Permis E')
                                                <div class="col-lg-6" id="prmisfile">
                                                    <div class="form-group">
                                                        <div class="form-label">copie simple du permis D</div>
                                                        <input type="file" class="dropify"
                                                            wire:model="permisfile" name="permisfile"
                                                            data-height="300" />
                                                        @error('permisfile')
                                                            <div class="text-red"> {{ $message }}</div>
                                                        @enderror
                                                    </div>
                                            @endif

                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <div class="form-group">

                                                    <div class="form-group">
                                                        <label for="exampleFormControlFile1">Photo d'identité<span
                                                                class="text-red">*</span></label>
                                                        <input type="file" class="form-control-file" wire:model="photo"
                                                            name="photo" id="exampleFormControlFile1">
                                                    </div>
                                                    @error('photo')
                                                        <div class="text-red"> {{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <!-- <div class="form-label"></div>
                                    <input type="file" class="dropify" name="photo" data-height="300" />
                                    
                                </div> -->

                                    </div>
                                </div>

                        </div>
                        <div class="col-md-12 mb-2 mt-2 text-center">
                            <button type="submit" class="btn btn-info infos mb-1">Soumettre</button>
                           
                        </div>


                        </form>
                    </div>
        </div>
        @endif
    @else
        <div class="text-center mt-10">
            <p>Accune session d'insciption ouverte.</p>
        </div>
        @endif




    </div>
</div>
</div>
</div>
