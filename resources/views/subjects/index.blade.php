@extends('layouts.app')

@section('content')
<div class="alert alert-success alert-dismissible fade show" role="alert" id="container-message" style="display: none">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  <h4 class="alert-heading">Well done!</h4>
  <p id="submit-message"></p>
</div>

<div class="form-group">
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#mod-add">Register New Subject</button>
</div>

<div class="card p-4">
  <div class="card-body">
    <h4 class="card-title">Subjects List</h4>    
    <table class="table table-hover">
      <thead>
        <tr>
          <th>Actions</th>
          <th>Course</th>
          <th>Year Level</th>
          <th>Term</th>
          <th>Code</th>
          <th>Subject</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody>
        @foreach($subjects as $subject)
          <tr>
            <td>
              <button class="btn btn-success btn-sm" id="{{ $subject->id }}" onclick="editCourse(this.id)">Edit</button>
              <button class="btn btn-secondary btn-sm" id="{{ $subject->id }}" onclick="viewSyllabus(this.id)">Syllabus</button></td>
            <td>{{ $subject->course_name }}</td>
            <td>
              @switch($subject->year_level)
                    @case(1)
                        First Year
                        @break

                    @case(2)
                        Second Year
                        @break

                    @default
                        Third Year
                @endswitch
            </td>
            <td>{{ $subject->term_name }}</td>
            <td>{{ $subject->subj_code }}</td>
            <td>{{ $subject->subj_name }}</td>
            <td>
              @if($subject->status=='false')
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

{{-- insert new subject details modal --}}
<div class="modal fade" id="mod-add" tabindex="-1" role="dialog" aria-labelledby="editUserModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <form id="add-record">
        <input type="text" name="user_id" style="display:none" value="{{ old('user_id') }}">
        <div class="modal-header">
          <h5 class="modal-title" id="editUserModalLabel">Subject Details</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group row">
          <label for="user-status" class="col-sm-2 col-form-label">Course</label>
            <div class="col-sm-10">
              <select class="form-control" name="course">
                @foreach($courses as $course)
                  <option value="{{ $course->id }}">{{ $course->course_name }}</option>
                @endforeach
              </select>
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
            </div>
          </div>
          <div class="form-group row">
          <label for="user-status" class="col-sm-2 col-form-label">Subject Name</label>
            <div class="col-sm-10">
              <input class="form-control" name="subj_name" />
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" id="btn-save">Save Subject</button>
        </div>
      </form>
    </div>
  </div>
</div>

{{-- insert subject syllabus modal --}}
<div class="modal fade" id="mod-syllabus" tabindex="-1" role="dialog" aria-labelledby="editUserModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <form id="add-record">
        <input type="text" name="user_id" style="display:none" value="{{ old('user_id') }}">
        <div class="modal-header">
          <h5 class="modal-title" id="editUserModalLabel">Subject Syllabus</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <button class="btn btn-primary btn-sm">Add Topic</button>
          </div>
          <div class="form-group row" style="display: none">
          <label for="user-status" class="col-sm-2 col-form-label">Subject Name</label>
            <div class="col-sm-10">
              <input class="form-control" name="subj_name" />
            </div>
          </div>
          <div class="form-group">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>Actions</th>
                  <th>Topic</th>
                </tr>
              </thead>
              <tbody>
            </table>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" id="btn-save">Save Subject</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection

@section('script')
<script type="text/javascript">
  $("#btn-save").click(function() {
    $.ajax({
      headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
      url: "{{ url('subject/store') }}",
      method:"POST",
      data:{
        course_id: $('#add-record [name=course]').val(),
        year_level: $('#add-record [name=year_level]').val(),
        term_id: $('#add-record [name=term]').val(), 
        subj_code: $('#add-record [name=subj_code]').val(), 
        subj_name: $('#add-record [name=subj_name]').val(), 
      }, 
      success: function(result){
        /* show console logs */
        console.log(result);

        /* display success message */
        $('#container-message').show('alert');
        $('#submit-message').html(result.message);

        /* close modal */
        $('#mod-add').modal('hide');

        /* clear value to inputs */
        $('#add-record [name=course]').val('');
        $('#add-record [name=year_level]').val('');
        $('#add-record [name=term]').val('');
        $('#add-record [name=subj_code]').val('');
        $('#add-record [name=subj_name]').val('');
      },
      error: function(XMLHttpRequest, textStatus, errorThrown) { 
        /* display error */
        alert("Status: " + textStatus); alert("Error: " + errorThrown); 
      } 
    });
  });

  function viewSyllabus(id){
    $('#mod-syllabus').modal('show');
  }
</script>
@endsection