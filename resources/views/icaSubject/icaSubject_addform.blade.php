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
                    <option value="{{ $subject->id }}">{{ $subject->subj_code.' - '.$subject->subj_name }}</option>
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
        course: $('#course').val(),
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