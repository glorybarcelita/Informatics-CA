<div class="form-group row">
  <label for="user-status" class="col-sm-2 col-form-label {{$errors->has('name') ? 'text-danger' : '' }}">ICA subject name</label>
    <div class="col-sm-10">
    <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
    name="icasubj_name"> 
    </div>
</div>

<div class="form-group row">
    <label for="user-status" class="col-sm-2 col-form-label {{ $errors->has('description') ? 'text-danger' : '' }}">Description</label>
    <div class="col-sm-10">
        <textarea rows="5" class="form-control {{ $errors->has('description') ? 'text-danger' : '' }}" name="course_description"></textarea>
    </div>
</div>