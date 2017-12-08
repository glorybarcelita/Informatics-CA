@extends('layouts.app')

@section('css')
  <link rel="stylesheet" href="{{asset('vendor/kendo/src/styles/web/kendo.common-bootstrap.css')}}" />
  <link rel="stylesheet" href="{{asset('vendor/kendo/src/styles/web/kendo.bootstrap.css')}}" />
  <link rel="stylesheet" href="{{asset('vendor/kendo/src/styles/web/kendo.bootstrap.mobile.css')}}" />
@endsection

@section('content')
  <legend>{{ $topic->topic_title }} \ Quiz</legend>
  <div class="form-group">
    <button class="btn btn-outline-primary btn-sm" id="btn-new-quiz">Create Quiz</button>
  </div>
  <div id="quiz-grid"></div>

  <!-- Modal -->
  <div class="modal fade" id="mod-add" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Create Quiz</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="card mb-2">
            <div class="card-body">
              {{-- <div class="form-group row">
                <label for="q1" class="col-sm-2 col-form-label">Question #1</label>
                <div class="col-sm-10">
                  <div class="form-group">
                    <textarea type="text" class="form-control" id="q1"></textarea>
                  </div>
                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon" id="basic-addon1">A.</span>
                      <input type="text" class="form-control" placeholder="" id="q1-c1">
                      <span class="input-group-addon">
                        <input type="radio" name="q1-ans">
                      </span>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon" id="basic-addon1">B.</span>
                      <input type="text" class="form-control" placeholder="" id="q1-c2">
                      <span class="input-group-addon">
                        <input type="radio" name="q1-ans">
                      </span>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon" id="basic-addon1">C.</span>
                      <input type="text" class="form-control" placeholder="" id="q1-c3">
                      <span class="input-group-addon">
                        <input type="radio" name="q1-ans">
                      </span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="card mb-2">
            <div class="card-body">
              <div class="form-group row">
                <label for="q2" class="col-sm-2 col-form-label">Question #2</label>
                <div class="col-sm-10">
                  <div class="form-group">
                    <textarea type="text" class="form-control" id="q2"></textarea>
                  </div>
                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon" id="basic-addon1">A.</span>
                      <input type="text" class="form-control" placeholder="" id="q2-c1">
                      <span class="input-group-addon">
                        <input type="radio" name="q2-ans">
                      </span>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon" id="basic-addon1">B.</span>
                      <input type="text" class="form-control" placeholder="" id="q2-c2">
                      <span class="input-group-addon">
                        <input type="radio" name="q2-ans">
                      </span>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon" id="basic-addon1">C.</span>
                      <input type="text" class="form-control" placeholder="" id="q2-c3">
                      <span class="input-group-addon">
                        <input type="radio" name="q2-ans">
                      </span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="card mb-2">
            <div class="card-body">
              <div class="form-group row">
                <label for="q3" class="col-sm-2 col-form-label">Question #3</label>
                <div class="col-sm-10">
                  <div class="form-group">
                    <textarea type="text" class="form-control" id="q3"></textarea>
                  </div>
                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon" id="basic-addon1">A.</span>
                      <input type="text" class="form-control" placeholder="" id="q3-c1">
                      <span class="input-group-addon">
                        <input type="radio" name="q3-ans">
                      </span>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon" id="basic-addon1">B.</span>
                      <input type="text" class="form-control" placeholder="" id="q3-c2">
                      <span class="input-group-addon">
                        <input type="radio" name="q3-ans">
                      </span>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon" id="basic-addon1">C.</span>
                      <input type="text" class="form-control" placeholder="" id="q3-c3">
                      <span class="input-group-addon">
                        <input type="radio" name="q3-ans">
                      </span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="card mb-2">
            <div class="card-body">
              <div class="form-group row">
                <label for="q4" class="col-sm-2 col-form-label">Question #4</label>
                <div class="col-sm-10">
                  <div class="form-group">
                    <textarea type="text" class="form-control" id="q4"></textarea>
                  </div>
                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon" id="basic-addon1">A.</span>
                      <input type="text" class="form-control" placeholder="" id="q4-c1">
                      <span class="input-group-addon">
                        <input type="radio" name="q4-ans">
                      </span>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon" id="basic-addon1">B.</span>
                      <input type="text" class="form-control" placeholder="" id="q4-c2">
                      <span class="input-group-addon">
                        <input type="radio" name="q4-ans">
                      </span>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon" id="basic-addon1">C.</span>
                      <input type="text" class="form-control" placeholder="" id="q4-c3">
                      <span class="input-group-addon">
                        <input type="radio" name="q4-ans">
                      </span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-body">
              <div class="form-group row">
                <label for="q5" class="col-sm-2 col-form-label">Question #5</label>
                <div class="col-sm-10">
                  <div class="form-group">
                    <textarea type="text" class="form-control" id="q5"></textarea>
                  </div>
                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon" id="basic-addon1">A.</span>
                      <input type="text" class="form-control" placeholder="" id="q5-c1">
                      <span class="input-group-addon">
                        <input type="radio" name="q5-ans">
                      </span>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon" id="basic-addon1">B.</span>
                      <input type="text" class="form-control" placeholder="" id="q5-c2">
                      <span class="input-group-addon">
                        <input type="radio" name="q5-ans">
                      </span>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon" id="basic-addon1">C.</span>
                      <input type="text" class="form-control" placeholder="" id="q5-c3">
                      <span class="input-group-addon">
                        <input type="radio" name="q5-ans">
                      </span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            </div>

            <div class="card mb-2">
            <div class="card-body">
              <div class="form-group row">
                <label for="q4" class="col-sm-2 col-form-label">Question #4</label>
                <div class="col-sm-10">
                  <div class="form-group">
                    <textarea type="text" class="form-control" id="q4"></textarea>
                  </div>
                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon" id="basic-addon1">A.</span>
                      <input type="text" class="form-control" placeholder="" id="q4-c1">
                      <span class="input-group-addon">
                        <input type="radio" name="q4-ans">
                      </span>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon" id="basic-addon1">B.</span>
                      <input type="text" class="form-control" placeholder="" id="q4-c2">
                      <span class="input-group-addon">
                        <input type="radio" name="q4-ans">
                      </span>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon" id="basic-addon1">C.</span>
                      <input type="text" class="form-control" placeholder="" id="q4-c3">
                      <span class="input-group-addon">
                        <input type="radio" name="q4-ans">
                      </span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-body">
              <div class="form-group row">
                <label for="q5" class="col-sm-2 col-form-label">Question #5</label>
                <div class="col-sm-10">
                  <div class="form-group">
                    <textarea type="text" class="form-control" id="q5"></textarea>
                  </div>
                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon" id="basic-addon1">A.</span>
                      <input type="text" class="form-control" placeholder="" id="q5-c1">
                      <span class="input-group-addon">
                        <input type="radio" name="q5-ans">
                      </span>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon" id="basic-addon1">B.</span>
                      <input type="text" class="form-control" placeholder="" id="q5-c2">
                      <span class="input-group-addon">
                        <input type="radio" name="q5-ans">
                      </span>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon" id="basic-addon1">C.</span>
                      <input type="text" class="form-control" placeholder="" id="q5-c3">
                      <span class="input-group-addon">
                        <input type="radio" name="q5-ans">
                      </span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            </div>
          </div>
        </div> --}}

         
            
                  <div class="form-group row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Topic</label>
                    <div class="col-sm-10">
                      <div id="input_question_add">
                        <div class="input-group">
                          <textarea type="text" class="form-control mr-5" name="topics[]" placeholder="Subject topic"></textarea>
                          
                          <span class="input-group-btn">
                            <button class="btn btn-outline-primary add_topic_control" type="button">Add</button>
                          </span>
                        </div>
                      </div>
                    </div>
                  </div>
               {{-- Choices --}}
                <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon" id="basic-addon1">A.</span>
                      <input type="text" class="form-control" placeholder="" id="">
                      <span class="input-group-addon">
                        <input type="radio" name="q3-ans">
                      </span>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon" id="basic-addon1">B.</span>
                      <input type="text" class="form-control" placeholder="" id="">
                      <span class="input-group-addon">
                        <input type="radio" name="q3-ans">
                      </span>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon" id="basic-addon1">C.</span>
                      <input type="text" class="form-control" placeholder="" id="">
                      <span class="input-group-addon">
                        <input type="radio" name="q3-ans">
                      </span>
                    </div>
                  </div>
               
              
              <div class="card-footer" align="center">
                  <button type="button" class="btn btn-outline-danger" id="btn-reset-topics">Reset</button>
                  <button type="button" class="btn btn-outline-success" id="btn-save-topics">Submit</button>
                </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          
        </div>
      </div>
    </div>
  </div>


@endsection

@section('script')
<script src="{{asset('vendor/kendo/src/js/kendo.all.js')}}"></script>
<script type="text/javascript">
  $("#quiz-grid").kendoGrid({
      dataSource: {                                            
          transport: {
              read: {
                  url: "{{ url('ica-subject/topic/quiz').'/'.$topic->topic_title }}"+"/select",
                  dataType: "JSON"
              }
          },                
          pageSize: 10,
      },
      sortable: true,
      pageable: {
        refresh: true,
        pageSizes: true,
        buttonCount: 10
      },
      filterable: true,
      columnMenu: true,
      resizable: true,
      columns: [
          {   
              field: "id",
              title: "Actions",
              width: 130,
              template: '<button id="#= id #" class="btn btn-outline-success btn-sm" onclick="edit_subj(this.id)">Edit</button>&nbsp'+
                        '<button id="#= id #" class="btn btn-outline-danger btn-sm" onclick="delete_subj(this.ids)">Delete</button>',
          }, 
          {
              field: "question",
              title: "Question",
          },
      ]
  });

  $("#btn-new-quiz").click(function(){
    $('#mod-add').modal('show');
  });

// dynamic add question
  var questionContainer = $('#input_question_add'); //Input field wrapper
  var addQuestion = $('.add_topic_control'); //Add button selector
  $(addQuestion).click(function(){ //Once add button is clicked
    $(questionContainer).append(
      '<div class="remove_this">'+
        '<br>'+
        '<div class="input-group">'+
          ' <textarea type="text" class="form-control mr-5" name="topics[]" placeholder="Subject topic"></textarea>'+
          '<span class="input-group-btn">'+
            '<button class="btn btn-danger remove_button" type="button">'+
              'Remove'+
            '</button>'+
          '</span>'+
        '</div>'+
      '</div>'); 

    //   '<div class="form-group">'+
    //   '<div class="input-group">'
    //     '<span class="input-group-addon" id="basic-addon1">A.</span>'+
    //     '<input type="text" class="form-control" placeholder="" id="">'+
    //     '<span class="input-group-addon">'+
    //       '<input type="radio" name="q3-ans">'+
    //     '</span>'+
    //   '</div>'+
    // '</div>'+
    // '<div class="form-group">'+
    //   '<div class="input-group">'+
    //     '<span class="input-group-addon" id="basic-addon1">B.</span>'+
    //     '<input type="text" class="form-control" placeholder="" id="">'+
    //     '<span class="input-group-addon">'+
    //       '<input type="radio" name="q3-ans">'+
    //     '</span>'+
    //   '</div>'+
    // '</div>'+
    // '<div class="form-group">'+
    //   '<div class="input-group">'+
    //     '<span class="input-group-addon" id="basic-addon1">C.</span>'+
    //     '<input type="text" class="form-control" placeholder="" id="">'+
    //     '<span class="input-group-addon">'+
    //       '<input type="radio" name="q3-ans">'+
    //     '</span>'+
    //   '</div>'+
    // '</div>');

  });
  questionContainer.on('click', '.remove_button', function(e){ //Once remove button is clicked
    e.preventDefault();
    $(this).closest('.remove_this').remove(); //Remove field html
  });


</script>
@endsection