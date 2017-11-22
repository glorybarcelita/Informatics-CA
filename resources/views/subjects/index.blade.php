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
  <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#mod-syllabus">Syllabus</button>
</div>

<div class="card">
  <div class="card-body">
    <h4 class="card-title">Subjects List</h4>
    <div id="grid"></div>    
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
      <form id="add-record-topics">
        <input type="text" name="user_id" style="display:none" value="{{ old('user_id') }}">
        <div class="modal-header">
          <h5 class="modal-title" id="editUserModalLabel">Subject Syllabus</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Subject</label>
            <div class="col-sm-10">
              <select class="form-control" id="subject-syallabus">
                <option hidden>Select subjects</option>
                @foreach($subjects as $subject)
                  <option value="{{ $subject->id }}">{{ $subject->subj_name }}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="form-group" id="initial-topic" style="display: none">
            <button class="btn btn-outline-primary" id="btn-topic-inputs" data-toggle="collapse" data-target="#add-topic-form">Add Topic</button>
            <div class="collapse mt-2" id="add-topic-form"">
              <div class="card">                
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Topic</label>
                    <div class="col-sm-10">
                      <div id="input_topic_add">
                        <div class="input-group">
                          <input type="text" class="form-control" name="topics[]" placeholder="Subject topic">
                          <span class="input-group-btn">
                            <button class="btn btn-outline-primary add_topic_control" type="button">Add</button>
                          </span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-footer" align="center">
                  <button type="button" class="btn btn-outline-danger" id="btn-reset-topics">Reset</button>
                  <button type="button" class="btn btn-outline-success" id="btn-save-topics">Save Topics</button>
                </div>
              </div>
            </div>            
          </div> 
      </form>
      <div id="syllabi-grid"></div>          
    </div>
  </div>
</div>

{{-- update subject topics --}}
<div class="modal fade" id="mod-syllabus-update" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form id="update-record-topic">
        <div class="modal-header">
          <h5 class="modal-title">Update Topic Details</h5>
        </div>
        <div class="modal-body">
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Subject</label>
            <div class="col-sm-10">
              <select class="form-control" id="subject-syallabus">
                <option hidden>Select subjects</option>
                @foreach($subjects as $subject)
                  <option value="{{ $subject->id }}">{{ $subject->subj_name }}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Topic</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="topic">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" id="btn-update-topic">Close</button>
          <button type="button" class="btn btn-primary" id="btn-save">Save Changes</button>
        </div>
      </form>
    </div>
  </div>
</div>

{{-- delete subject topics --}}
<div class="modal fade" id="mod-syllabus-delete" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form id="delete-record-topic">
        <div class="modal-header">
          <h5 class="modal-title">Delete Topic?</h5>
        </div>
        <div class="modal-body">
          <label>Are you sure you want to delete this topic?</label>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" id="btn-delete-topic-no">No</button>
          <button type="button" class="btn btn-primary" id="btn-delete">Yes</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection

@section('script')
<script src="{{asset('vendor/kendo/src/js/kendo.all.js')}}"></script>

<script type="text/javascript">
  /* initialize subject data when page is loaded */
  $(document).ready(function(){
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
                    { field: "subj_name", aggregate: "count" },                    
                ],
            },   
            {
                field: "year_level", aggregates: [
                    { field: "course_name", aggregate: "count" },
                    { field: "year_level", aggregate: "count" },
                    { field: "term_name", aggregate: "count" },
                    { field: "subj_name", aggregate: "count" },                    
                ],
            },
            {
                field: "term_name", aggregates: [
                    { field: "course_name", aggregate: "count" },
                    { field: "year_level", aggregate: "count" },
                    { field: "term_name", aggregate: "count" },
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
                template: '<center><button id="#= id #" class="btn btn-outline-success btn-sm" onclick="edit_subj(this.id)">Edit</button>',
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
                title: "Code",
                width: 300,
            },
            {
                field: "subj_name",
                title: "Subject Name",
                width: 300,
            },
            {
                field: "lecturer",
                title: "Lecturer Name",
                width: 300,
            },
        ]
    });    
  });

  /* save new subject */
  $("#add-record #btn-save").click(function() {
    $.ajax({
      headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
      url: "{{ url('subject/store') }}",
      method:"POST",
      data:{
        course_id: $('#add-record [name=course]').val(),
        year_level: $('#add-record [name=year_level]').val(),
        term_id: $('#add-record [name=term]').val(), 
        subj_name: $('#add-record [name=subj_name]').val(),
        lecturer: $('#add-record [name=lecturer_name]').val(),
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
        $('#add-record [name=subj_name]').val('');

        

        $('#add-record [name=subj_name]').removeClass('is-invalid');
        $('#error-msg-subj-name').empty();

        /* refresh subj grid */
        $("#grid").data("kendoGrid").dataSource.read();
        $('#grid').data('kendoGrid').refresh();
      },
      error: function(XMLHttpRequest, textStatus, errorThrown) {
        var responseText = $.parseJSON(XMLHttpRequest.responseText);

        // console.log(responseText);

        

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

        /* pass the results in  */
        subject_id = result.id;
        $('#update-record [name=course]').val(result.course_id),
        $('#update-record [name=year_level]').val(result.year_level),
        $('#update-record [name=term]').val(result.term_id), 
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

  /* save changes in subject details */
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

        $('#update-record [name=subj_name]').removeClass('is-invalid');
        $('#update-record #error-msg-subj-name').empty();

        /* reload grid after update */
        $("#grid").data("kendoGrid").dataSource.read();
        $('#grid').data('kendoGrid').refresh();
      },
      error: function(XMLHttpRequest, textStatus, errorThrown) {
        var responseText = $.parseJSON(XMLHttpRequest.responseText);

        // console.log(responseText);


        $('#update-record [name=subj_name]').addClass('is-invalid');
        $('#update-record #error-msg-subj-name').html(responseText.errors.subj_name);
      } 
    });
  });

  function viewSyllabus(id){
    //
    $('#mod-syllabus').modal('show');
  }

  /* dynamic field for topic */
  var topicContainer = $('#input_topic_add'); //Input field wrapper
	var addTopic = $('.add_topic_control'); //Add button selector
	$(addTopic).click(function(){ //Once add button is clicked
		$(topicContainer).append(
      '<div class="remove_this">'+
        '<br>'+
        '<div class="input-group">'+
          '<input type="text" class="form-control" name="topics[]" placeholder="Subject topic">'+
          '<span class="input-group-btn">'+
            '<button class="btn btn-danger remove_button" type="button">'+
              'Remove'+
            '</button>'+
          '</span>'+
        '</div>'+
      '</div>'); // Add field html
	});

  topicContainer.on('click', '.remove_button', function(e){ //Once remove button is clicked
		e.preventDefault();
		$(this).closest('.remove_this').remove(); //Remove field html
	});

  /* display subject topics and dynamic topic field when select change */
  $("#add-record-topics #subject-syallabus").change(function() {
    $('.remove_this').remove();
    $('#initial-topic').show('alert');

    /* this will return all the topics of selected subject using subject code. data will be displayed to grid if success */
    $.ajax({
      headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
      url: "{{ url('topic/list') }}",
      method:"POST",
      data:{
        subj_name: $('#add-record-topics #subject-syallabus').val(),
      }, 
      success: function(result){
        /* show console logs */
        console.log(result);

        /* generate subject syllabi via subject code */
        syllabi(result);
      },
      error: function(XMLHttpRequest, textStatus, errorThrown) {
        var responseText = $.parseJSON(XMLHttpRequest.responseText);
      } 
    });
  });

  /* save new topics */
  $('#add-record-topics #btn-save-topics').click(function(){
    var topics= new Array();
    $('input[name^="topics"]').each(function() {
      topics.push($(this).val());
    });

    $.ajax({
      headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
      url: "{{ url('topic/store') }}",
      method:"POST",
      data:{
        subj_name: $('#subject-syallabus').val(), 
        topics: topics,
      }, 
      success: function(result){
        /* show console logs */
        console.log(result);

        /* close topics form */
        $('#btn-topic-inputs').trigger('click');
        $('#btn-reset-topics').trigger('click');

        /* reload syllabi grid */
        syllabi(result.syllabi);

        /* clear initial topic field */
        $('input[name^="topics"]').val('');
      },
      error: function(XMLHttpRequest, textStatus, errorThrown) {
        var responseText = $.parseJSON(XMLHttpRequest.responseText);
      } 
    });    

    $('#btn-reset-topics').click(function(){
      $('.remove_this').remove();
    });
  });

  /* initialize grid for syllabi */
  function syllabi(results){
    /* hide add topic form */
    $('#add-topic-form').collapse('hide');

    /* initialize and destroy grid */
    $('#syllabi-grid').kendoGrid();        
    $('#syllabi-grid').kendoGrid('destroy').empty();

    /* grid */
    $("#syllabi-grid").kendoGrid({
      dataSource: {
        data: results,
        pageSize: 5,
      },
      resizable: true,
      filterable: true,
      sortable: true,
      pageable: {
        pageSizes: true,
        buttonCount: 5
      },
      columns: [
        {
          field: "id",
          title: "Actions",
          template: "<button type='button' class='btn btn-sm btn-outline-info' id='#= id #' onclick='update_topic(this.id)'>Edit</button> "+
          "<button type='button' class='btn btn-sm btn-outline-danger' id='#= id #' onclick='delete_topic(this.id)'>Delete</button>"
        },
        // {
        //   field: "subj_code",
        //   title: "Subject Code",
        // }, 
        {
          field: "topics",
          title: "Topic Name",
        }, 
      ]
    });
  }
  
  var topic_id = '';
  function update_topic(id){
    /* this will return all the topics of selected subject using subject code. data will be displayed to grid if success */
    $.ajax({
      headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
      url: "{{ url('topic/edit') }}",
      method:"GET",
      data:{
        topic_id: id,
      }, 
      success: function(result){
        /* show console logs */
        // console.log(result);

        /* modal for update topic */
        $('#mod-syllabus-update').modal('show');

        /* pass results to form */
        $('#update-record-topic #subject-syallabus').val(result.subj_name);
        $('#update-record-topic #topic').val(result.topics);
        
        topic_id = result.id;
      },
      error: function(XMLHttpRequest, textStatus, errorThrown) {
        var responseText = $.parseJSON(XMLHttpRequest.responseText);
      } 
    });
  }

  $('#update-record-topic #btn-save').click(function(){
    $.ajax({
      headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
      url: "{{ url('topic/update') }}",
      method: "POST",
      data:{
        id: topic_id,
        subj_name: $('#update-record-topic #subject-syallabus').val(),
        topic: $('#update-record-topic #topic').val()
      },
      success: function(result){
        console.log(result);

        /* reload grid data */
        syllabi(result.syllabi);

        /* close modal */
        $('#mod-syllabus-update').modal('hide');

        /* change selected subject cdoe value in case it is the update made */
        console.log(result.syllabi[0].subj_name);
        $('#add-record-topics #subject-syallabus').val(result.syllabi[0].subj_name);
      },
      error: function(XMLHttpRequest, textStatus, errorThrown){
        var responseText = $.parseJSON(XMLHttpRequest.responseText);
      }
    });
  });

  $('#btn-update-topic').click(function(){
    // 
    $('#mod-syllabus-update').modal('hide');
  });

  function delete_topic(id){
    topic_id = id;

    /* show modal to confirm deletion of topic */
    $('#mod-syllabus-delete').modal('show');
  }

  $('#btn-delete-topic-no').click(function(){
    // 
    $('#mod-syllabus-delete').modal('hide');
  });

  $('#delete-record-topic #btn-delete').click(function(){
    $.ajax({
      headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
      url: "{{ url('topic/delete') }}",
      method: "GET",
      data:{
        topic_id: topic_id,
      },
      success: function(result){
        console.log(result);

        /* reload grid data */
        syllabi(result.syllabi);

        /* close modal */
        $('#mod-syllabus-delete').modal('hide');
      },
      error: function(XMLHttpRequest, textStatus, errorThrown){
        var responseText = $.parseJSON(XMLHttpRequest.responseText);
      }
    });
  });
</script>
@endsection