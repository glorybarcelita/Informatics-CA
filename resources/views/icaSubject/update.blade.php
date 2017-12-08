@extends('layouts.app')

@section('css')
  <link rel="stylesheet" href="{{asset('vendor/kendo/src/styles/web/kendo.common-bootstrap.css')}}" />
  <link rel="stylesheet" href="{{asset('vendor/kendo/src/styles/web/kendo.bootstrap.css')}}" />
  <link rel="stylesheet" href="{{asset('vendor/kendo/src/styles/web/kendo.bootstrap.mobile.css')}}" />
@endsection

@section('content')

  <legend>Learning Resources</legend>
  <hr>
  <h5 class="mb-3">{{ $ica_subject->icasubj_name }} / edit</h5>
  <h5>Overview</h5>
  <p class="lead">
    {{ $ica_subject->overview }}
  </p>
  <button class="btn btn-outline-primary mt-3 " id="btn-add-ica-subj-topic" >Add ICA Subject Topic</button>
<a href="{{ url('lecturer/exam')}}" class="btn btn-outline-primary mt-3">Add ICA Exam</a>

  <div class="row mt-3">
    @foreach($ica_topics as $ica_topic)
        <div class="col-md-4 my-3">
          <div class="card">
            <div class="card-header">{{ $ica_topic->topic_title }}</div>
            <div class="card-body">
                <div class="item">
                  <a data-toggle="collapse" href="#syllabus-container{{ $ica_topic->id }}" aria-expanded="false" aria-controls="syllabus-container" id="{{ $ica_topic->id }}" onclick="getTaggedSyllabus(this.id)">
                    Tagged Syllabus <i class="fa fa-caret-square-o-down" aria-hidden="true"></i>
                  </a>
                  <div id="syllabus-container{{ $ica_topic->id }}" class="collapse mt-3" role="tabpanel">
                  </div>
                </div>
            </div>
            <div class="card-footer">
              <a href="{{ url('ica-subject/topic/').'/'.$ica_topic->id.'/quiz' }}" class="btn btn-outline-info" id="btn-edit-{{ $ica_topic->id }}">Quiz</a>
              <a href="{{ url('icasubject/topic/').'/'.$ica_topic->id }}" class="btn btn-outline-secondary" id="btn-edit-{{ $ica_topic->id }}">Open Topic</a>
              {{-- <button class="btn btn-outline-secondary">Attachments</button> --}}
            </div>
          </div>
        </div>
    @endforeach
  </div>
  <!-- Modal -->
  <div class="modal fade" id="mod-add-ica-subj-topic" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <form id="add-ica-subj">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">New ICA Subject Topic</h5>
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
                    @foreach($topics as $topic)
                      <option value="{{ $topic['id'] }}">{{ $topic['topics'] }}</option>
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
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" id="btn-save" onclick="addTopic()">Save changes</button>
          </div>
        </form>
      </div>
    </div>
  </div>

   <!-- Modal QUIZ -->
  <div class="modal fade" id="mod-add-quiz" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <form id="add-ica-subj">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">ICA Topic</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <input class="form-control" name="quiz_id" id="quiz-id" value="{{ Route::input('ica_subj_id') }}" hidden>
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
                    @foreach($topics as $topic)
                      <option value="{{ $topic['id'] }}">{{ $topic['topics'] }}</option>
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
            <div class="form-group row">
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
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" id="btn-save" onclick="addTopic()">Save changes</button>
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

  $("#note").kendoEditor({ resizable: {
      content: true,
      toolbar: true
  }});

  $("#files").kendoUpload({
      validation: {
          allowedExtensions: [".pdf", '.xls', '.pptx', '.ppt', '.docx', '.doc']
      }
  });

  $('#btn-add-ica-subj-topic').click(function(){
    $('#mod-add-ica-subj-topic').modal('show');
  });

  // $("#add-ica-subj").submit(function(){
  //     var formData = new FormData(this);

  //     $.ajax({
  //       headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
  //       url: "{{ url('lecturer/ica-subject/topic/store/') }}",
  //       type: 'POST',
  //       data: formData,
  //       async: false,
  //       success: function (data) {
  //           console.log(data);
  //           location.reload();
  //       },
  //       cache: false,
  //       contentType: false,
  //       processData: false
  //     });

  //     return false;
  // });

  /* save new topics */
  function addTopic(){
    var links= new Array();
    $('input[name^="links"]').each(function() {
      links.push($(this).val());
    });

    $.ajax({
      headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
      url: "{{ url('lecturer/ica-subject/topic/store/') }}",
      method:"POST",
      data:{
        ica_subj_id: $('#add-ica-subj #ica-subj-id').val(), 
        ica_topic_syllabus: $("#add-ica-subj #ica-topic-syllabus").kendoMultiSelect().data("kendoMultiSelect").value(), 
        topic_title: $('#add-ica-subj #ica-topic-title').val(), 
        note: $('#note').val(),
        links: links,
      }, 
      success: function(result){
        /* show console logs */
        console.log(result);

        location.reload();
      },
      error: function(XMLHttpRequest, textStatus, errorThrown) {
        var responseText = $.parseJSON(XMLHttpRequest.responseText);
      } 
    });
  }

  function getTaggedSyllabus(id){
    $.ajax({
      headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
      url: "{{ url('lecturer/ica-subject/topic/select') }}",
      method:"GET",
      data:{
        ica_subj_id: id 
      }, 
      success: function(result){
        /* show console logs */
        console.log(result);

        var tagged_syllabus = '';
        for (var i = 0; i < result.length; i++) {          
          // tagged_syllabus = tagged_syllabus + '<a href="#" class="font-weight-bold">#'+result[i].subj_code+' - '+result[i].topics+'</a> &nbsp';

          tagged_syllabus = tagged_syllabus+'<ul>'+
                                              '<li>'+result[i].subj_name+' - '+result[i].topics+'</li>'+         
                                            '</ul>';

          $('#syllabus-container'+result[i].ica_subjects_topics).html(tagged_syllabus);
        }
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
</script>

@endsection