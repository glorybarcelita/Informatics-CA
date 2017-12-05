<!-- Modal -->
<div class="modal fade" id="mod-update-ica-subj" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <form id="update-ica-subj">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update ICA Subject</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group row">
            <label for="user-status" class="col-sm-2 col-form-label">Status</label>
              <div class="col-sm-10">
                <select class="form-control" id="icasubj-status">
                    <option value="pending">Pending</option>
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                </select>
              </div>
          </div>

          <div class="form-group row">
            <label for="user-status" class="col-sm-2 col-form-label">ICA subject name</label>
              <div class="col-sm-10">
                <input class="form-control" id="icasubj-name"> 
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
              </div>
          </div>

          <div class="form-group row">
            <label for="user-status" class="col-sm-2 col-form-label">Subjects</label>
              <div class="col-sm-10">
                <select multiple="multiple" data-placeholder="Select subjects..." class="form-control" id="subjects">
                  @foreach($subjects as $subject)
                    <option value="{{ $subject->id }}">{{ $subject->subj_name }}</option>
                  @endforeach
                </select>
              </div>
          </div>

          <div class="form-group row">
              <label for="user-status" class="col-sm-2 col-form-label">Overview</label>
              <div class="col-sm-10">
                  <textarea rows="5" class="form-control" id="overview"></textarea>
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

@section('ica-subj-update-script')
<script type="text/javascript">
  $("#update-ica-subj #subjects").kendoMultiSelect().data("kendoMultiSelect");
  var icaSubjectId = '';

  /* display ica subject details to modal */
  function editIcaSubj(id){
    $.ajax({
      headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
      url: "{{ url('ica-subject/edit') }}",
      method:"GET",
      data:{
        ica_subj_id: id 
      }, 
      success: function(result){
        /* show console logs */
        console.log(result);

        $('#mod-update-ica-subj').modal('show');
        icaSubjectId = id;
        $('#update-ica-subj #icasubj-status').val(result.status);
        $('#update-ica-subj #icasubj-name').val(result.icasubj_name);
        $('#update-ica-subj #course').val(result.course_id);
        $('#update-ica-subj #overview').val(result.overview);
        $('#update-ica-subj #lecturer').val(result.lecturer_id);

        /* set selected subjects in subjects field */
        var multiselect = $("#update-ica-subj #subjects").data("kendoMultiSelect");

        // set the value of the multiselect.
        icaSubjSubjects = [];
        for (var i = 0; i < result.subjects.length; i++) {
          icaSubjSubjects.push(result.subjects[i].subj_id);
        }
        multiselect.value(icaSubjSubjects); //select items which have value respectively "1" and "2"
      },
      error: function(XMLHttpRequest, textStatus, errorThrown) {
        var responseText = $.parseJSON(XMLHttpRequest.responseText);

        console.log(responseText);
      } 
    });
  }

  $('#update-ica-subj #btn-save').click(function(){
    var subjects = $("#update-ica-subj #subjects").kendoMultiSelect().data("kendoMultiSelect");

    $.ajax({
      headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
      url: "{{ url('ica-subject/update') }}",
      method:"POST",
      data:{
        id: icaSubjectId,
        status: $('#update-ica-subj #icasubj-status').val(),
        ica_subj_name: $('#update-ica-subj #icasubj-name').val(),
        course: $('#update-ica-subj #course').val(),
        subjects: subjects.value(),
        overview: $('#update-ica-subj #overview').val(), 
        lecturer: $('#update-ica-subj #lecturer').val(), 
      }, 
      success: function(result){
        /* show console logs */
        console.log(result);

        /* close modal */
        $('#mod-update-ica-subj').modal('hide');

        /* reset form after success insert */
        $('#update-ica-subj')[0].reset();

        window.location.reload();
      },
      error: function(XMLHttpRequest, textStatus, errorThrown) {
        var responseText = $.parseJSON(XMLHttpRequest.responseText);

        console.log(responseText);

        // $('#add-record [name=subj_code]').addClass('is-invalid');
        // $('#error-msg-subj-code').html(responseText.errors.subj_code);
      } 
    });
  });
</script>
@endsection