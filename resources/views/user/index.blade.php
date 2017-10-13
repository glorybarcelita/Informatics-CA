@extends('layouts.app')

@section('content')
@if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif
<div class="card p-4">
  <div class="card-body">
    <h4 class="card-title">User List</h4>

    <div class="form-group">
      <a href="{{ url('register') }}" class="btn btn-primary">Register New User</a>
    </div>
    <table class="table table-hover">
      <thead>
        <tr>
          <th>Actions</th>
          <th>Full Name</th>
          <th>Role</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody>
        @foreach($users as $user)
          <tr>
            <td>
              <button class="btn btn-success btn-sm" id="{{ $user->id }}" onclick="editUser(this.id)">
                  Edit
              </button>
              <button class="btn btn-danger btn-sm" id="{{ $user->id }}" onclick="resetUserPass(this.id)">
                Reset Password
              </button>
            </td>
            <td>{{ $user->first_name.' '.$user->middle_name.' '.$user->last_name }}</td>
            <td>{{ $user->role_name}}</td>
            <td>
              @if($user->activated=='false')
                <label class="text-danger">Inactive</label>
              @else
                <label class="text-primary">Active</label>
              @endif
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>

{{-- edit user details modal --}}
<div class="modal fade" id="mod-edit-user" tabindex="-1" role="dialog" aria-labelledby="editUserModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <form method="POST" action="{{ url('user/update') }}">
        {{ csrf_field() }}

        <input type="text" name="user_id" style="display:none" value="{{ old('user_id') }}">
        <div class="modal-header">
          <h5 class="modal-title" id="editUserModalLabel">Update User Details</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group row">
              <label for="user-status" class="col-sm-2 col-form-label">Status</label>
              <div class="col-sm-10">
                  <select class="form-control" name="status" id="user-status">
                      <option value="true">Active</option>
                      <option value="false">Inactive</option>
                  </select>
              </div>
          </div>

          @include('auth.userform')
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>

{{-- user password reset --}}
<div class="modal fade" id="mod-reset-password" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form method="POST" action="{{ url('/user/reset-password/post') }}">
        {{ csrf_field() }}
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">User reset password?</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <input class="form-control" style="display: none" name="user_id_reset_pass">
          <div id="reset-pass-container-message"></div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Reset Password</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection

@section('script')
  <script type="text/javascript">
    @if ($errors->any())
      $('#mod-edit-user').modal('show');
    @endif

    function editUser(id){
      $.ajax({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        url: "{{ url('user/edit') }}",
        method:"POST",
        data:{
          id: id, 
        }, 
        success: function(result){
          /* reset form fields classes */
          resetForm();

          /* show modal*/
          $('#mod-edit-user').modal('show');

          /* pass result values to inputs */
          $('[name=user_id]').val(result.id).change();
          $('[name=role]').val(result.role_id).change();
          $('[name=first_name]').val(result.first_name);
          $('[name=middle_name]').val(result.middle_name);
          $('[name=last_name]').val(result.last_name);
          $('[name=school_index]').val(result.school_index);
          $('[name=birthday]').val(result.birthday);
          $('[name=contact_no]').val(result.contact_no);
          $('[name=address]').val(result.address);
          $('[name=email]').val(result.email);
          $('[name=status]').val(result.activated);

          /* show console logs */
          console.log(result);
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) { 
          alert("Status: " + textStatus); alert("Error: " + errorThrown); 
        } 
      });      
    }

    function resetForm(){
      $('.form-control').removeClass('is-invalid');
      $('.error-msg').empty();
      $('.col-form-label').removeClass('text-danger');
    }

    function resetUserPass(id){
      $.ajax({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        url: "{{ url('user/reset-password') }}",
        method:"POST",
        data:{
          id: id, 
        }, 
        success: function(result){
          $('#mod-reset-password').modal('show');
          $('[name=user_id_reset_pass]').val(id);


          $('#reset-pass-container-message').html('Are you sure you want to reset the password of <strong>'+result.first_name+' '+result.last_name+'?</strong>');

          /* show console logs */
          console.log(result);
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) { 
          alert("Status: " + textStatus); alert("Error: " + errorThrown); 
        } 
      });       
    }
  </script>
@endsection