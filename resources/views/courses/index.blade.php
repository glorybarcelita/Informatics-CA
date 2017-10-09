@extends('layouts.app')

@section('content')
@if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif

<div class="card p-4">
  <div class="card-body">
    <h4 class="card-title">Courses List</h4>

    <div class="form-group">
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#mod-add-course">Register New Course</button>
    </div>
    <table class="table table-hover">
      <thead>
        <tr>
          <th>Actions</th>
          <th>Name</th>
          <th>Overview</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody>
        @foreach($courses as $course)
          <tr>
            <td><button class="btn btn-success btn-sm" id="{{ $course->id }}" onclick="editCourse(this.id)">Edit</button></td>
            <td>{{ $course->course_name }}</td>
            <td>{{ $course->overview }}</td>
            <td>
              @if($course->activated=='false')
                <label class="text-danger">Inactive</label>
              @else
                <label class="text-primary">Active</label>
              @endif
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>

{{-- insert new course details modal --}}
<div class="modal fade" id="mod-add-course" tabindex="-1" role="dialog" aria-labelledby="editUserModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <input type="text" name="user_id" style="display:none" value="{{ old('user_id') }}">
        <div class="modal-header">
          <h5 class="modal-title" id="editUserModalLabel">Course Details</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          @include('courses.course_form')
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" id="btn-save">Save Course</button>
        </div>
    </div>
  </div>
</div>  

{{-- update course details modal --}}
<div class="modal fade" id="mod-update-course" tabindex="-1" role="dialog" aria-labelledby="editUserModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <input type="text" name="user_id" style="display:none" value="{{ old('user_id') }}">
        <div class="modal-header">
          <h5 class="modal-title" id="editUserModalLabel">Update Course Details</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group row">
              <label for="course-status" class="col-sm-2 col-form-label">Status</label>
              <div class="col-sm-10">
                  <select class="form-control" name="status" id="course-status">
                      <option value="true">Active</option>
                      <option value="false">Inactive</option>
                  </select>
              </div>
          </div>
          @include('courses.course_form')
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" id="btn-save">Save Changes</button>
        </div>
    </div>
  </div>
</div>
@endsection

@section('script')
<script type="text/javascript">
  $( "#btn-save" ).click(function() {
    $.ajax({
      headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
      url: "{{ url('course/store') }}",
      method:"POST",
      data:{
        name: $('[name=course_name]').val(),
        description: $('[name=course_description]').val(), 
      }, 
      success: function(result){
        /* show console logs */
        console.log(result);

        $('#mod-add-course').modal('hide');
      },
      error: function(XMLHttpRequest, textStatus, errorThrown) { 
        alert("Status: " + textStatus); alert("Error: " + errorThrown); 
      } 
    });
  });

  function editCourse(id){
    $.ajax({
      headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
      url: "{{ url('course/edit') }}",
      method:"POST",
      data:{
        id: id, 
      }, 
      success: function(result){
        /* open update modal */
        $('#mod-update-course').modal('show');
        
        /* pass value to inputs */
        $('[name=status').val(result.status);
        $('[name=course_name').val(result.course_name);
        $('[name=course_description').val(result.overview);

        /* show console logs */
        console.log(result);
      },
      error: function(XMLHttpRequest, textStatus, errorThrown) { 
        alert("Status: " + textStatus); alert("Error: " + errorThrown); 
      } 
    });
  }
</script>
@endsection