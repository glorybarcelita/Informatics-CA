@extends('layouts.app')

@section('css')
  <link rel="stylesheet" href="{{asset('vendor/kendo/src/styles/web/kendo.common-bootstrap.css')}}" />
  <link rel="stylesheet" href="{{asset('vendor/kendo/src/styles/web/kendo.bootstrap.css')}}" />
  <link rel="stylesheet" href="{{asset('vendor/kendo/src/styles/web/kendo.bootstrap.mobile.css')}}" />
@endsection

@section('content')
<div class="alert alert-success alert-dismissible fade show" role="alert" id="container-message" style="display: none">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  <h4 class="alert-heading">Well done!</h4>
  <p id="submit-message"></p>
</div>

<div class="form-group">
  <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#mod-add">Register New Subject</button>
</div>

<div class="card">
  <div class="card-body">
    <h4 class="card-title">Subjects List</h4>
    <div id="grid"></div>    
    {{-- <table class="table table-responsive table-hover">
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
    </table> --}}
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
          @include('subjects.subject_form')
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" id="btn-save">Save Subject</button>
        </div>
      </form>
    </div>
  </div>
</div>

{{-- update subject details modal --}}
<div class="modal fade" id="mod-update" tabindex="-1" role="dialog" aria-labelledby="editUserModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <form id="update-record">
        <input type="text" name="user_id" style="display:none" value="{{ old('user_id') }}">
        <div class="modal-header">
          <h5 class="modal-title" id="editUserModalLabel">Subject Details</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          @include('subjects.subject_form')
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" id="btn-save">Apply Changes</button>
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
            <button class="btn btn-primary btn-sm" data-toggle="collapse" data-target="#add-syllabus-card">Add Topic</button>
          </div>
          <div class="collapse" id="add-syllabus-card">
            <div class="card card-body">
              <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Topic</label>
                <div class="col-sm-10">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Subject topic">
                    <span class="input-group-btn">
                      <button class="btn btn-secondary" type="button">Save Topic</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>
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
<script src="{{asset('vendor/kendo/src/js/kendo.all.js')}}"></script>

<script type="text/javascript">
  $(document).ready(function(){
    // create MultiSelect from select HTML element
    var required = $("#required").kendoMultiSelect().data("kendoMultiSelect");
    // var optional = $("#optional").kendoMultiSelect({
    //     autoClose: false
    // }).data("kendoMultiSelect");

    $("#get").click(function() {
        alert("Attendees:\n\nRequired: " + required.value());
    });

    $("#grid").kendoGrid({
        dataSource: {                                            
            transport: {
                read: {
                    url: "{{ url('subject/select') }}",
                    dataType: "JSON"
                }
            },
            schema: {
                model: {
                    fields: {
                        course_name: { type: "string" },
                        year_level: { type: "number" },
                        term_name: { type: "string" },
                        subj_code: { type: "string" },
                        subj_name: { type: "string" },
                        id: { type: "string" },
                    }
                }
            },
            group: [{
                field: "course_name", aggregates: [
                    { field: "course_name", aggregate: "count" },
                    { field: "year_level", aggregate: "count" },
                    { field: "term_name", aggregate: "count" },
                    { field: "subj_code", aggregate: "count" },
                    { field: "subj_name", aggregate: "count" },                    
                ],
            },   
            {
                field: "year_level", aggregates: [
                    { field: "course_name", aggregate: "count" },
                    { field: "year_level", aggregate: "count" },
                    { field: "term_name", aggregate: "count" },
                    { field: "subj_code", aggregate: "count" },
                    { field: "subj_name", aggregate: "count" },                    
                ],
            },
            {
                field: "term_name", aggregates: [
                    { field: "course_name", aggregate: "count" },
                    { field: "year_level", aggregate: "count" },
                    { field: "term_name", aggregate: "count" },
                    { field: "subj_code", aggregate: "count" },
                    { field: "subj_name", aggregate: "count" },                    
                ],              
            }],                                      
            pageSize: 10,
        },
        sortable: true,
        pageable: {
          refresh: true,
          pageSizes: true,
          buttonCount: 10
        },
        groupable: true,
        filterable: true,
        columnMenu: true,
        resizable: true,
        columns: [
            {   
                field: "id",
                title: "Actions",
                width: 130,
                template: '<center><button id="#= id #" class="btn btn-outline-success btn-sm" onclick="edit_subj(this.id)">Edit</button>&nbsp <button id="#= id #" class="btn btn-outline-secondary btn-sm" onclick="viewSyllabus(this.id)">Syllabus</button></center>',
            }, 
            {
                hidden: true,
                field: "course_name",
                title: "Course Name",
            },
            {
                hidden: true, 
                field: "year_level",
                title: "Year Level",
                groupHeaderTemplate: "#= value == '1' ? 'First Year' : value == '2' ? 'Secord Year' : 'Third Year' #",
            },
            {
                hidden: true,
                field: "term_name",
                title: "Term Name",
                aggregates: ["min", "max", "count"],
                groupHeaderTemplate: "#= value # (Subjects: #= count#)",
            },
            {
                field: "subj_code",
                title: "Code",
                width: 300,
            },
            {
                field: "subj_name",
                title: "Subject Name",
                width: 300,
            },
        ]
    });
  });

  $("#add-record #btn-save").click(function() {
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
        // console.log(result);

        /* display success message */
        $('#container-message').show('alert');
        $('#submit-message').html(result.message);

        /* close modal */
        $('#mod-add').modal('hide');

        /* clear value to inputs */
        $('#add-record [name=subj_code]').val('');
        $('#add-record [name=subj_name]').val('');

        $('#add-record [name=subj_code]').removeClass('is-invalid');
        $('#error-msg-subj-code').empty();

        $('#add-record [name=subj_name]').removeClass('is-invalid');
        $('#error-msg-subj-name').empty();

        $("#grid").data("kendoGrid").dataSource.read();
        $('#grid').data('kendoGrid').refresh();
      },
      error: function(XMLHttpRequest, textStatus, errorThrown) {
        var responseText = $.parseJSON(XMLHttpRequest.responseText);

        // console.log(responseText);

        $('#add-record [name=subj_code]').addClass('is-invalid');
        $('#error-msg-subj-code').html(responseText.errors.subj_code);

        $('#add-record [name=subj_name]').addClass('is-invalid');
        $('#error-msg-subj-name').html(responseText.errors.subj_name);
      } 
    });
  });

  var subject_id = 0;

  function edit_subj(id){
    $.ajax({
      headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
      url: "{{ url('subject/edit') }}",
      method:"GET",
      data:{
        subject_id: id,
      }, 
      success: function(result){
        // console.log(result);

        subject_id = result.id;
        $('#update-record [name=course]').val(result.course_id),
        $('#update-record [name=year_level]').val(result.year_level),
        $('#update-record [name=term]').val(result.term_id), 
        $('#update-record [name=subj_code]').val(result.subj_code), 
        $('#update-record [name=subj_name]').val(result.subj_name),

        /* close modal */
        $('#mod-update').modal('show');
      },
      error: function(XMLHttpRequest, textStatus, errorThrown) {
        var responseText = $.parseJSON(XMLHttpRequest.responseText);

        // console.log(responseText);
      } 
    });
  }

  $('#update-record #btn-save').click(function (){
    $.ajax({
      headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
      url: "{{ url('subject/update') }}",
      method:"POST",
      data:{
        subject_id: subject_id,
        course_id: $('#update-record [name=course]').val(),
        year_level: $('#update-record [name=year_level]').val(),
        term_id: $('#update-record [name=term]').val(), 
        subj_code: $('#update-record [name=subj_code]').val(), 
        subj_name: $('#update-record [name=subj_name]').val(),
      }, 
      success: function(result){
        /* show console logs */
        // console.log(result);

        /* display success message */
        $('#container-message').show('alert');
        $('#submit-message').html(result.message);

        /* close modal */
        $('#mod-update').modal('hide');

        /* clear inputs css errors */
        $('#update-record [name=subj_code]').removeClass('is-invalid');
        $('#update-record #error-msg-subj-code').empty();

        $('#update-record [name=subj_name]').removeClass('is-invalid');
        $('#update-record #error-msg-subj-name').empty();

        /* reload grid after update */
        $("#grid").data("kendoGrid").dataSource.read();
        $('#grid').data('kendoGrid').refresh();
      },
      error: function(XMLHttpRequest, textStatus, errorThrown) {
        var responseText = $.parseJSON(XMLHttpRequest.responseText);

        // console.log(responseText);

        $('#update-record [name=subj_code]').addClass('is-invalid');
        $('#update-record #error-msg-subj-code').html(responseText.errors.subj_code);

        $('#update-record [name=subj_name]').addClass('is-invalid');
        $('#update-record #error-msg-subj-name').html(responseText.errors.subj_name);
      } 
    });
  });

  function viewSyllabus(id){
    $('#mod-syllabus').modal('show');
  }
</script>
@endsection