<!-- Modal -->
<div class="modal fade" id="mod-delete-ica-subj" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form id="delete-ica-subj">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Delete ICA Subject</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <span id="delete-msg"></span>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel Delete</button>
          <button type="button" class="btn btn-primary" id="btn-save">Delete Ica Subject</button>
        </div>
      </form>
    </div>
  </div>
</div>

@section('ica-subj-delete-script')
<script type="text/javascript">
  var icaSubjectId = '';

  /* display ica subject details to modal */
  function deleteIcaSubj(id, ica_subj){
    icaSubjectId = id;
    $('#mod-delete-ica-subj').modal('show');

    /* delete message content */
    $('#delete-ica-subj #delete-msg').html('Are you sure you want to delete <strong>'+ica_subj+'</strong>?');
  }

  $('#delete-ica-subj #btn-save').click(function(){
    $.ajax({
      headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
      url: "{{ url('ica-subject/delete') }}",
      method:"POST",
      data:{
        id: icaSubjectId,
      }, 
      success: function(result){
        /* show console logs */
        console.log(result);

        /* close modal */
        $('#mod-delete-ica-subj').modal('hide');

        window.location.reload();
      },
      error: function(XMLHttpRequest, textStatus, errorThrown) {
        var responseText = $.parseJSON(XMLHttpRequest.responseText);
        console.log(responseText);
      }
    });
  });
</script>
@endsection