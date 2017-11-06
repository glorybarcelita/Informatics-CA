@extends('layouts.app')

@section('css')
  <link rel="stylesheet" href="{{asset('vendor/kendo/src/styles/web/kendo.common-bootstrap.css')}}" />
  <link rel="stylesheet" href="{{asset('vendor/kendo/src/styles/web/kendo.bootstrap.css')}}" />
  <link rel="stylesheet" href="{{asset('vendor/kendo/src/styles/web/kendo.bootstrap.mobile.css')}}" />
@endsection

@section('content')
<div class="card mb-4">
  <div class="card-body">
      <button class="btn btn-primary" data-toggle="modal" data-target="#mod-add-ica-subj">Add New ICA Subject</button>
      <button class="btn btn-primary" data-toggle="modal" data-target="#">Pending Requests</button>
  </div>
</div>

<legend>ICA Subjects</legend>
<hr>

<div class="row" id="ica-subjs-container">
</div>

@include('icaSubject.icaSubject_addform')
@include('icaSubject.icaSubject_updateform')

@endsection

@section('script')
<script src="{{asset('vendor/kendo/src/js/kendo.all.js')}}"></script>

<script type="text/javascript">
  
  $(document).ready(function(){
    load_ica_subjects();
  });

  function load_ica_subjects(){
    $.ajax({
      headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
      url: "{{ url('ica-subject/select') }}",
      method:"GET",
      success: function(result){
        /* show console logs */
        console.log(result);
        for (var i = 0; i < result.length; i++) {
            $('#ica-subjs-container').append(generate_card(result[i].id, result[i].status, result[i].icasubj_name, result[i].overview, result[i].lecturer));            
        }
      },
      error: function(XMLHttpRequest, textStatus, errorThrown) {
        var responseText = $.parseJSON(XMLHttpRequest.responseText);

        console.log(responseText);
      } 
    });
  }

  /* show ica subjects */
  function generate_card(id, status, ica_subj, overview, lecturer){
    var card_color = '';
    if(status == 'pending'){
      card_color = 'text-white bg-warning';
    }
    else if(status == 'inactive'){
      card_color = 'text-white bg-danger';
    }
    else{
      card_color = '';
    }

    return '<div class="col-md-4 mb-3">'+
      '<div class="card">'+
        '<h5 class="card-header"><a href="#" style="color: black">'+ica_subj+'</a> <small>('+status+')</small></h5>'+
        '<div class="card-body">'+
          '<div class="mb-2">'+
            '<div class="item">'+
              '<a data-toggle="collapse" href="#" id="'+id+'" onclick="getSubjects(this.id)" aria-expanded="true" aria-controls="ica-subjs-collapse">'+
                'Tagged Subjects'+
              '</a>'+
              '<div id="ica-subjs-collapse'+id+'" class="collapse" role="tabpanel">'+
                '<div class="mb-3" id="ica-subj-container'+id+'">'+
                '</div>'+
              '</div>'+
            '</div>'+
          '</div>'+
          '<h5>Overview</h5>'+
         '<p>'+
            overview +
          '</p>'+
          '<h5>Lecturer:</h5>'+
          lecturer+
        '</div>'+
        '<div class="card-footer text-muted">'+
          '<a href="#" class="btn btn-sm btn-outline-primary" id="'+id+'" onclick="editIcaSubj(this.id)">Update</a> &nbsp'+
          '<a href="#" class="btn btn-sm btn-outline-danger">Delete</a>'+
        '</div>'+
      '</div>'+
    '</div>';
  }

  /* display ica subject subjects */
  function getSubjects(id){
    $('#ica-subjs-collapse'+id).collapse('toggle');
    show_ica_subjects(id);
  }

  function show_ica_subjects(id){
    $.ajax({
      headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
      url: "{{ url('ica-subject/subjects/select') }}",
      method:"GET",
      data:{
        ica_subj_id: id 
      }, 
      success: function(result){
        /* show console logs */
        console.log(result);
        var subjects = '';
        for (var i = 0; i < result.length; i++) {          
          subjects = subjects + '<a href="#" class="font-weight-bold">#'+result[i].subj_name+'</a> &nbsp';

          $('#ica-subj-container'+result[i].ica_subject_id).html(subjects);
        }
      },
      error: function(XMLHttpRequest, textStatus, errorThrown) {
        var responseText = $.parseJSON(XMLHttpRequest.responseText);

        console.log(responseText);
      } 
    });
  }

</script>

@yield('ica-subj-add-script')
@yield('ica-subj-update-script')

@endsection