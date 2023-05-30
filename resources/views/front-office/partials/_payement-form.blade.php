<form action="{{ route('payement', $demande) }}" method="POST" class="pl-5 col-md-12">
    @csrf
    <h1 class="h1-text text-center mb-4">Payement de {{ number_format( config("main.payement.montant"), 0, ",", " " ) }} FCFA </h1>

    <div class="row col-md-12 ">
        <div class="col-md-6">
            <div class="form-group">
                <label class="form-control-label text-muted" for="telephone">Votre numéro de téléphone</label>
                <input required type="number" class="form-control form-control-lg" name="telephone" id="telephone"
                    placeholder="Ex: 76xxxxxx" @error('telephone') is-invalid @enderror
                    value="{{ old('telephone') }}">
                @error('telephone')
                <span class="text-danger" role="alert">
                    <small>{{ $message }}</small>
                </span>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="form-control-label text-muted" for="otp">Le Code OTP</label>
                <input required type="number" class="form-control form-control-lg" name="otp" id="otp"
                    placeholder="Entrez votre Code OTP" @error('otp') is-invalid @enderror value="{{ old('otp') }}">
                @error('otp')
                <span class="text-danger" role="alert">
                    <small>{{ $message }}</small>
                </span>
                @enderror
            </div>
        </div>
    </div>
    <div class="row col-md-12 justify-content-center my-3 px-3">
        <button type="submit" class="btn btn-primary btn-block btn-color">Procéder au paiement de {{ number_format( config("main.payement.montant"), 0, ",", " " ) }} FCFA</button>
    </div>
</form>