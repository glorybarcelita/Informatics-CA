<!-- Modal -->
<div class="modal fade" id="mod-add-ica-subj" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <form id="add-ica-subj">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">New ICA Subject</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group row">
            <label for="user-status" class="col-sm-2 col-form-label">ICA subject name</label>
              <div class="col-sm-10">
                <input class="form-control" id="icasubj-name"> 
                <span class="text-danger" id="error-icasubj-name"></span>
              </div>
          </div>

          <div class="form-group row">
            <label for="user-status" class="col-sm-2 col-form-label">Course</label>
              <div class="col-sm-10">
                <select class="form-control" id="course">
                  <option value hidden>Select course</option>
                  @foreach($courses as $course)
                    <option value="{{ $course->id }}">{{ $course->course_name }}</option>
                  @endforeach
                </select>
                <span class="text-danger" id="error-course"></span>
              </div>
          </div>

          <div class="form-group row">
            <label for="user-status" class="col-sm-2 col-form-label">Subjects</label>
              <div class="col-sm-10">
                <select multiple="multiple" data-placeholder="Select subjects..." class="form-control" id="subjects">
                  @foreach($subjects as $subject)
                    <option value="{{ $subject->id }}">{{ $subject->subj_code.' - '.$subject->subj_name }}</option>
                  @endforeach
                </select>
                <span class="text-danger" id="error-subject"></span>
              </div>
          </div>

          <div class="form-group row">
              <label for="user-status" class="col-sm-2 col-form-label">Overview</label>
              <div class="col-sm-10">
                  <textarea rows="5" class="form-control" id="overview"></textarea>
                  <span class="text-danger" id="error-overview"></span>
              </div>
          </div>

          <div class="form-group row">
              <label for="user-status" class="col-sm-2 col-form-label">Lecturer</label>
              <div class="col-sm-10">
                <select class="form-control" id="lecturer">
                  <option value hidden>Select lecturer</option>
                  @foreach($lecturers as $lecturer)
                    <option value="{{ $lecturer->id }}">{{ $lecturer->first_name.' '.$lecturer->last_name }}</option>
                  @endforeach
                </select>
                <span class="text-danger" id="error-lecturer"></span>
              </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" id="btn-save">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>

@section('ica-subj-add-script')
<script type="text/javascript">
  var subjects = $("#add-ica-subj #subjects").kendoMultiSelect().data("kendoMultiSelect");

  $('#add-ica-subj #btn-save').click(function(){
    $.ajax({
      headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
      url: "{{ url('ica-subject/store') }}",
      method:"POST",
      data:{
        ica_subj_name: $('#add-ica-subj #icasubj-name').val(),
        course: $('#add-ica-subj #course').val(),
        subjects: subjects.value(),
        overview: $('#add-ica-subj #overview').val(), 
        lecturer: $('#add-ica-subj #lecturer').val(), 
      }, 
      success: function(result){
        /* show console logs */
        console.log(result);

        /* close modal */
        $('#mod-add-ica-subj').modal('hide');

        /* reset form after success insert */
        $('#add-ica-subj')[0].reset();

        location.reload();
      },
      error: function(XMLHttpRequest, textStatus, errorThrown) {
        var errors = XMLHttpRequest.responseJSON.errors;
        console.log(errors);
        if(errors.ica_subj_name){ errorIndicator('add-ica-subj', 'icasubj-name', errors.ica_subj_name); }
        else{ validIndicator('add-ica-subj', 'icasubj-name'); }

        if(errors.course){ errorIndicator('add-ica-subj', 'course', errors.ica_subj_name); }
        else{ validIndicator('add-ica-subj', 'course'); }

        if(errors.lecturer) { errorIndicator('add-ica-subj', 'lecturer', errors.lecturer); }
        else{ validIndicator('add-ica-subj', 'lecturer'); }

        if(errors.subjects) { errorIndicator('add-ica-subj', 'subjects', errors.subjects); }
        else{ validIndicator('add-ica-subj', 'subjects'); }

        if(errors.overview) { errorIndicator('add-ica-subj', 'overview', errors.overview); }
        else{ validIndicator('add-ica-subj', 'overview'); }
        
      } 
    });
  });
  
  function errorIndicator(action, field, error){
    console.log(error);
    $('#'+action + ' #' + field ).addClass("is-invalid");
    $('#'+action + ' #' + field).removeClass("is-valid");
    $('#'+action + ' #error-' + field).text(error);
  }
  function validIndicator(action, field){
    $('#'+action + ' #' + field ).addClass("is-valid");
    $('#'+action + ' #' + field).removeClass("is-invalid");
    $('#'+action + ' #error-' + field).text('');
  }

  $('#add-ica-subj #course').change(function(){
    $.ajax({
      headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
      url: "{{ url('subject/by-course') }}",
      method:"POST",
      data:{
        course_id: $('#add-ica-subj #course').val(),
      }, 
      success: function(result){
        /* show console logs */
        console.log(result);

        /* set selected subjects in subjects field */
        // var multiselect = $("#add-ica-subj #subjects").data("kendoMultiSelect");

        // // set the value of the multiselect.
        // icaSubjSubjects = [];
        // for (var i = 0; i < result.length; i++) {
        //   icaSubjSubjects.push(result[i].subj_id);
        // }
        // multiselect.setDataSource(icaSubjSubjects); //select items which have value respectively "1" and "2"  

        // var dataSource = new kendo.data.DataSource({
        //   data: [ "Bananas", "Cherries" ]
        // });
        // var multiselect = $("#add-ica-subj #subjects").data("kendoMultiSelect");
        // multiselect.setDataSource(dataSource); 

        // $("#add-ica-subj #subjects").data("kendoMultiSelect").destroy();

        // $('#add-ica-subj #subjects').kendoMultiSelect({
        //     // autoBind: true,
        //     dataTextField: 'subj_name',
        //     dataValueField: 'id',
        //     dataSource: result,
        // });

        $("#add-ica-subj #subjects").data(new kendo.data({ 
          dataTextField: 'subj_name',
          dataValueField: 'id',
          dataSource: result,
        }));

      },
      error: function(XMLHttpRequest, textStatus, errorThrown) {
        var errors = XMLHttpRequest.errors;
        var responseText = $.parseJSON(XMLHttpRequest.responseText);
        console.log(responseText);
        console.log(errors);

        if(errors.ica_subj_name){
           $('#add-ica-subj #icasubj-name').addClass('is-invalid');
        }
      } 
    });
  });
</script>
@endsection