<div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label {{ $errors->has('role') ? 'text-danger' : '' }}">User Role</label>
    <div class="col-sm-10">
        <select class="form-control {{ $errors->has('role') ? 'is-invalid' : '' }}" name="role">
            @foreach($roles as $role)
                <option value="{{ $role->id }}">{{ $role->name }}</option>
            @endforeach
        </select>
        @if ($errors->has('role')) 
            <div class="text-danger error-msg">
                {{ $errors->first('role') }}
            </div>
        @endif
    </div>
</div>

<div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label {{ $errors->has('first_name') ? 'text-danger' : '' }}">Full Name</label>
    <div class="col">
        <input type="text" class="form-control {{ $errors->has('first_name') ? 'is-invalid' : '' }}" id="staticEmail" value="{{ old('first_name') }}" name="first_name" placeholder="First Name">
        @if ($errors->has('first_name')) 
            <div class="text-danger error-msg">
                {{ $errors->first('first_name') }}
            </div>
        @endif
    </div>

    <div class="col">
        <input type="text" class="form-control" id="staticEmail" value="{{ old('middle_name') }}" name="middle_name" placeholder="Middle Initial" maxlength="2">
    </div>

    <div class="col">
        <input type="text" class="form-control {{ $errors->has('last_name') ? 'is-invalid' : '' }}" id="staticEmail" value="{{ old('last_name') }}" name="last_name" placeholder="Last Name">
        @if ($errors->has('last_name')) 
            <div class="text-danger error-msg">
                {{ $errors->first('last_name') }}
            </div>
        @endif
    </div>
</div>

<div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label {{ $errors->has('school_index') ? 'text-danger' : '' }}">School Index</label>
    <div class="col-sm-10">
        <input type="number" class="form-control {{ $errors->has('school_index') ? 'is-invalid' : '' }}" id="staticEmail" value="{{ old('school_index') }}" name="school_index">
        @if ($errors->has('school_index')) 
            <div class="text-danger error-msg">
                {{ $errors->first('school_index') }}
            </div>
        @endif
    </div>
</div>

<div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label {{ $errors->has('birthday') ? 'text-danger' : '' }}">Birthday</label>
    <div class="col-sm-10">
        <input type="date" class="form-control {{ $errors->has('birthday') ? 'is-invalid' : '' }}" id="staticEmail" value="{{ old('birthday') }}" name="birthday">
        @if ($errors->has('birthday')) 
            <div class="text-danger error-msg">
                {{ $errors->first('birthday') }}
            </div>
        @endif
    </div>
</div>

<div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label {{ $errors->has('contact_no') ? 'text-danger' : '' }}">Contact No</label>
    <div class="col-sm-10">
        <input type="number" class="form-control {{ $errors->has('contact_no') ? 'is-invalid' : '' }}" id="staticEmail" value="{{ old('contact_no') }}" name="contact_no">
        @if ($errors->has('contact_no')) 
            <div class="text-danger error-msg">
                {{ $errors->first('contact_no') }}
            </div>
        @endif
    </div>
</div>

<div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label {{ $errors->has('address') ? 'text-danger' : '' }}">Address</label>
    <div class="col-sm-10">
        <input type="text" class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" id="staticEmail" value="{{ old('address') }}" name="address">
        @if ($errors->has('address')) 
            <div class="text-danger error-msg">
                {{ $errors->first('address') }}
            </div>
        @endif
    </div>
</div>

<div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label {{ $errors->has('email') ? 'text-danger' : '' }}">E-mail</label>
    <div class="col-sm-10">
        <input type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" id="staticEmail" value="{{ old('email') }}" name="email">
        @if ($errors->has('email')) 
            <div class="text-danger error-msg">
                {{ $errors->first('email') }}
            </div>
        @endif
    </div>
</div>