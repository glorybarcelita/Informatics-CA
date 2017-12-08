@extends('layouts.app')

@section('css')
  <link rel="stylesheet" href="{{asset('vendor/kendo/src/styles/web/kendo.common-bootstrap.css')}}" />
  <link rel="stylesheet" href="{{asset('vendor/kendo/src/styles/web/kendo.bootstrap.css')}}" />
  <link rel="stylesheet" href="{{asset('vendor/kendo/src/styles/web/kendo.bootstrap.mobile.css')}}" />
  @endsection

  @section('content')
    <h1>Achiever's Wall</h1>


<div class="card">
  <div class="card-body">
    <h4 class="card-title">Congratulations!</h4>
    <div id="grid"></div>    
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
                template: '<button id="#= id #" class="btn btn-outline-success btn-sm" onclick="edit_subj(this.id)">Edit</button>&nbsp'+
                          '<button id="#= id #" class="btn btn-outline-danger btn-sm" value="#= subj_name #" onclick="delete_subj(this.id, this.value)">Delete</button>',
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
</script>
@endsection