<div class="form-group row">
    <label for="user-status" class="col-sm-2 col-form-label {{ $errors->has('name') ? 'text-danger' : '' }}">Name</label>
    <div class="col-sm-10">
        <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" 
        name="course_name">
        <span id="error-course-name"></span>
    </div>
</div>

<div class="form-group row">
    <label for="user-status" class="col-sm-2 col-form-label {{ $errors->has('description') ? 'text-danger' : '' }}">Description</label>
    <div class="col-sm-10">
        <textarea rows="5" class="form-control {{ $errors->has('description') ? 'text-danger' : '' }}" name="course_description"></textarea>
        <span id="error-description"></span>
    </div>
</div>
