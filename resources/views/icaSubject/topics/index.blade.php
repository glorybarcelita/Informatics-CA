@extends('layouts.app')

@section('css')
  <link rel="stylesheet" href="{{asset('vendor/kendo/src/styles/web/kendo.common-bootstrap.css')}}" />
  <link rel="stylesheet" href="{{asset('vendor/kendo/src/styles/web/kendo.bootstrap.css')}}" />
  <link rel="stylesheet" href="{{asset('vendor/kendo/src/styles/web/kendo.bootstrap.mobile.css')}}" />
@endsection

@section('content')

<legend>{{ $topic->topic_title }}</legend>
<hr>

<h5 class="mb-3">Tagged Subject:</h5>
<table class="table table-bordered" style="width: 40rem;">
@foreach($syllabi as $syllabus)
<tr>
  <td>{{ $syllabus->topics }}</td>  
  <td class="text-right"><button class="btn btn-outline-danger btn-sm" id="{{ $topic->id }}" onclick="removeICASubjectSyllabus(this.id, {{ $syllabus->id }})">Remove</button></td>  
</tr>
@endforeach
</table>
<br>
<h5>Notes:</h5>
<div class="row" id="cont-note">
  <div class="col-lg-12">
    {!! html_entity_decode($topic->note) !!}
  </div>  
</div>
<br>
<h5>Videos:</h5>
<div class="row">
  @foreach($links as $link)
  <div class="col-sm-12 col-md-4">
    <div class="card">
      <div class="card-body">
        <div class="embed-responsive embed-responsive-16by9 mb-2">
          <iframe class="embed-responsive-item" src="{{ $link->link }}" allowfullscreen></iframe>
        </div>
        <button class="btn btn-sm btn-danger btn-sm" id="{{ $link->id }}" onclick="deleteVideo(this.id)">Delete</button>
      </div>
    </div>
  </div>
  @endforeach
</div>
<div class="row mt-2">
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">
        <form id="save-links">
          <h4 class="card-title">Add Links</h4>
          <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Video Link</label>
            <div class="col-sm-10">
              <div id="input_link_add">
                <div class="input-group">
                  <input type="text" class="form-control" name="links[]" placeholder="Topic video link">
                  <span class="input-group-btn">
                    <button class="btn btn-outline-primary add_link_control" type="button">Add</button>
                  </span>
                </div>
              </div>
            </div>
          </div>
          <div class="text-right">
            <button type="button" class="btn btn-outline-success btn-sm" id="btn-save">Save links</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<hr>
<button class="btn btn-outline-primary btn-sm" onclick="editIcaTopic({{ $topic->id }})">Edit Topic</button>

<!-- Update ICA Subj Topic Modal -->
<div class="modal fade" id="mod-update-ica-subj-topic" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <form id="update-ica-subj">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update ICA Subject Topic</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <input class="form-control" name="ica_subj_id" id="ica-subj-id" value="{{ Route::input('ica_subj_id') }}" hidden>
          <div class="form-group row">
            <label for="ica-topic-title" class="col-sm-2 col-form-label">Topic Title</label>
              <div class="col-sm-10">
                <input class="form-control" id="ica-topic-title" name="ica_topic_title">
                <span class="text-danger" id="error-ica-topic-title"></span> 
              </div>
          </div>
          <div class="form-group row">
            <label for="ica-topic-syllabus" class="col-sm-2 col-form-label">Syllabus</label>
              <div class="col-sm-10">
                <select class="form-control" multiple="multiple" data-placeholder="Select subjects..."  id="ica-topic-syllabus" name="ica_topic_syllabus[]">
                  @foreach($topics as $row)
                    <option value="{{ $row->id }}">{{ $row->subj_code.' - '.$row->topics }}</option>
                  @endforeach
                </select>
                <span class="text-danger" id="error-ica-topic-syllabus"></span> 
              </div>
          </div>
          <div class="form-group row">
            <label for="ica-topic-syllabus" class="col-sm-2 col-form-label">Note</label>
              <div class="col-sm-10">
                <textarea id="note" name="note" aria-label="note"></textarea>
                <span class="text-danger" id="error-ica-topic-syllabus"></span> 
              </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" id="btn-save" onclick="updateTopic({{ $topic->id }})">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection

@section('script')
<script src="{{asset('vendor/kendo/src/js/kendo.all.js')}}"></script>

<script type="text/javascript">
  var syllabus = $("#ica-topic-syllabus").kendoMultiSelect().data("kendoMultiSelect");

  $("#update-ica-subj #note").kendoEditor({ 
      resizable: {
      content: true,
      toolbar: true
  }});

  function editIcaTopic(id){
    $.ajax({
      headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
      url: "{{ url('icasubject/topic/edit') }}",
      method:"POST",
      data:{
        ica_topic_id: id 
      }, 
      success: function(result){
        /* show console logs */
        console.log(result);
        $('#mod-update-ica-subj-topic').modal('show');

        $('#update-ica-subj #ica-topic-title').val(result.icasubj_topic.topic_title);
        $('#update-ica-subj #note').data('kendoEditor').value(' {!! html_entity_decode(str_replace("'","",$topic->note)) !!} ');
        
        /* set selected subjects in subjects field */
        var multiselect = $("#update-ica-subj #ica-topic-syllabus").data("kendoMultiSelect");

        // set the value of the multiselect.
        TopicsSyllabi = [];
        for (var i = 0; i < result.icasubj_topic_syllabi.length; i++) {
          TopicsSyllabi.push(result.icasubj_topic_syllabi[i].id);
        }
        multiselect.value(TopicsSyllabi); //select items which have value respectively "1" and "2"
      },
      error: function(XMLHttpRequest, textStatus, errorThrown) {
        var responseText = $.parseJSON(XMLHttpRequest.responseText);
        console.log(responseText);
      } 
    });
  }

  function updateTopic(id){
   $.ajax({
      headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
      url: "{{ url('icasubject/topic/update') }}",
      method:"POST",
      data:{
        ica_topic_id: id,
        topic_tite: $('#update-ica-subj #ica-topic-title').val(),
        syllabi: $("#update-ica-subj #ica-topic-syllabus").data("kendoMultiSelect").value(),
        note: $('#update-ica-subj #note').data('kendoEditor').value()
      }, 
      success: function(result){
        /* show console logs */
        console.log(result);
        $('#mod-update-ica-subj-topic').modal('hide');
        location.reload();  
      },
      error: function(XMLHttpRequest, textStatus, errorThrown) {
        var responseText = $.parseJSON(XMLHttpRequest.responseText);
        console.log(responseText);
      } 
    }); 
  }

  function deleteVideo(id){
    $.ajax({
      headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
      url: "{{ url('icasubject/topic/video/delete') }}",
      method:"POST",
      data:{
        video_id: id 
      }, 
      success: function(result){
        /* show console logs */
        console.log(result);
        location.reload();
      },
      error: function(XMLHttpRequest, textStatus, errorThrown) {
        var responseText = $.parseJSON(XMLHttpRequest.responseText);
        console.log(responseText);
      } 
    });
  }

   /* dynamic field for topic */
  var linkContainer = $('#input_link_add'); //Input field wrapper
  var addLink = $('.add_link_control'); //Add button selector
  $(addLink).click(function(){ //Once add button is clicked
    $(linkContainer).append(
      '<div class="remove_this">'+
        '<br>'+
        '<div class="input-group">'+
          '<input type="text" class="form-control" name="links[]" placeholder="Video link">'+
          '<span class="input-group-btn">'+
            '<button class="btn btn-danger remove_button" type="button">'+
              'Remove'+
            '</button>'+
          '</span>'+
        '</div>'+
      '</div>'); // Add field html
  });

  linkContainer.on('click', '.remove_button', function(e){ //Once remove button is clicked
    e.preventDefault();
    $(this).closest('.remove_this').remove(); //Remove field html
  });

  $('#save-links #btn-save').click(function(){
    var links= new Array();
    $('input[name^="links"]').each(function() {
      links.push($(this).val());
    });

    $.ajax({
      headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
      url: "{{ url('lecturer/ica-subject/topic/video-links') }}",
      method:"POST",
      data:{
        ica_topic_id: {!! $topic->id !!},
        links: links,
      }, 
      success: function(result){
        /* show console logs */
        console.log(result);
        
        location.reload();  
      },
      error: function(XMLHttpRequest, textStatus, errorThrown) {
        var responseText = $.parseJSON(XMLHttpRequest.responseText);
        console.log(responseText);
      } 
    }); 
  });

  function removeICASubjectSyllabus(topic_id, syllabus_id){
    $.ajax({
      headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
      url: "{{ url('lecturer/ica-subject/topic/syllabus/remove') }}",
      method:"POST",
      data:{
        topic_id: topic_id,
        syllabus_id: syllabus_id,
      }, 
      success: function(result){
        /* show console logs */
        console.log(result);
        
        location.reload();  
      },
      error: function(XMLHttpRequest, textStatus, errorThrown) {
        var responseText = $.parseJSON(XMLHttpRequest.responseText);
        console.log(responseText);
      } 
    });
  }
</script>

@endsection