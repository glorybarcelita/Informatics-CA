<div class="form-group row">
  <label for="user-status" class="col-sm-2 col-form-label">Course</label>
    <div class="col-sm-10">
      <select class="form-control" name="course">
        @foreach($courses as $course)
          <option value="{{ $course->id }}">{{ $course->course_name }}</option>
        @endforeach
      </select>
      <!-- <select id="required" name="course" multiple="multiple" class="form-control" data-placeholder="Select Courses...">
        @foreach($courses as $course)
          <option value="{{ $course->id }}">{{ $course->course_name }}</option>
        @endforeach
      </select> -->
    </div>
  </div>
  <div class="form-group row">
  <label for="user-status" class="col-sm-2 col-form-label">Year Level</label>
    <div class="col-sm-10">
      <select class="form-control" name="year_level">
          <option value=1>First Year</option>
          <option value=2>Second Year</option>
          <option value=3>Third Year</option>
      </select>
    </div>
  </div>
  <div class="form-group row">
  <label for="user-status" class="col-sm-2 col-form-label">Term</label>
    <div class="col-sm-10">
      <select class="form-control" name="term">
        @foreach($terms as $term)
          <option value="{{ $term->id }}">{{ $term->term_name }}</option>
        @endforeach
      </select>
    </div>
  </div>
  <div class="form-group row">
  <label for="user-status" class="col-sm-2 col-form-label">Subject Code</label>
    <div class="col-sm-10">
      <input class="form-control" name="subj_code" />
      <span class="text-danger" id="error-msg-subj-code"></span>
    </div>
  </div>
  <div class="form-group row">
  <label for="user-status" class="col-sm-2 col-form-label">Subject Name</label>
    <div class="col-sm-10">
      <input class="form-control" name="subj_name" />
      <span class="text-danger" id="error-msg-subj-name"></span>
    </div>
  </div>
</div>