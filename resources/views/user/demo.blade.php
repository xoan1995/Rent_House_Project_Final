

<form method="POST" action="{{ route('user.changePassword') }}">
    @csrf

    <div class="form-group row">
        <label class="col-md-4 col-form-label text-md-right">Old Password</label>
        <div class="col-md-6">
            <input id="passwordOld" name="passwordOld" type="password" class="form-control" required
                   autofocus>
        </div>
    </div>

    <div class="form-group row">
        <label for="password" class="col-md-4 col-form-label text-md-right">New Password</label>
        <div class="col-md-6">
            <input id="passwordNew1" type="password"
                   class="form-control @error('password') is-invalid @enderror"
                   name="passwordNew1" required autocomplete="current-password">
            @error('password')
            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="password" class="col-md-4 col-form-label text-md-right">Re-enter Password</label>
        <div class="col-md-6">
            <input id="passwordNew2" type="password"
                   class="form-control @error('password') is-invalid @enderror"
                   name="passwordNew2" required autocomplete="current-password">
            @error('password')
            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
            @enderror
        </div>
    </div>
    <div class="form-group row mb-0">
        <div class="col-md-8 offset-md-4">
            <button type="submit" class="btn btn-success">
                Change
            </button>
        </div>
    </div>
</form>

<script type="text/javascript" src="js/app.js"></script>
{!! toastr()->render() !!}

