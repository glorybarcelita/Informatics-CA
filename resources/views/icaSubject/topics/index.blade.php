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
@foreach($syllabi as $syllabus)
<ul>
  <li>{{ $syllabus->topics }}</li>     
</ul>
@endforeach
<br>
<h5>Notes</h5>
<div class="row" id="cont-note">
  <div class="col-lg-12">
    {!! html_entity_decode($topic->note) !!}
  </div>  
</div>
<br>
<br>
<h5>Videos</h5>
<div class="row">
  @foreach($links as $link)
    <div class="col-sm-12 col-md-4">
      <div class="embed-responsive embed-responsive-16by9 mb-2">
        <iframe class="embed-responsive-item" src="{{ $link->link }}" allowfullscreen></iframe>
      </div>
      <button class="btn btn-sm btn-danger" id="{{ $link->id }}" onclick="deleteVideo(this.id)"><i class="fa fa-trash" aria-hidden="true"></i> Delete</button>
    </div>
  @endforeach
</div>
<div class="row mt-2">
  <div class="col">
    <button class="btn btn-primary btn-sm">Add Link</button>
  </div>
</div>
<hr>
<button class="btn btn-outline-primary btn-sm" onclick="editIcaTopic({{ $topic->id }})">Edit Topic</button>

  <!-- Modal -->
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
        $('#update-ica-subj #note').data('kendoEditor').value('{!! html_entity_decode($topic->note) !!}');
        
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
</script>

@endsection