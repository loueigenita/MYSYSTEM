<div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editUserModalLabel">Edit User</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="POST" action="{{ route('users.update', ['user' => $user->id]) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
              <label for="name">Name:</label>
              <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $user->name) }}" >
              @error('name')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
            </div>
            <div class="form-group">
              <label for="email">Email:</label>
              <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $user->email) }}" >
              @error('email')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
            <div class="form-group">
                <label for="password">New Password:</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" >
                @error('password')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
            </div>
              
            <div class="form-check">
            <input class="form-check-input" type="checkbox" value="1" id="change-password" name="change_password">
            <label class="form-check-label" for="change-password">
                Leave password blank to keep current password
            </label>
            </div>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  

  <script>
    $(function() {
  // Listen for the edit button click event
  $('#editUserModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var id = button.data('id') // Extract info from data-* attributes
    var name = button.data('name')
    var email = button.data('email')
    var modal = $(this)

    // Set the form action URL to include the user's ID
    modal.find('form').attr('action', '/users/' + id)

    // Set the input values to the user's old values
    modal.find('#name').val(name)
    modal.find('#email').val(email)
    modal.find('#password').val('')
    modal.find('#change-password').prop('checked', false)

    // Listen for checkbox changes and toggle the password input
    modal.find('#change-password').change(function() {
      modal.find('#password').prop('disabled', !$(this).is(':checked'))
    })
  })

  // Listen for form submission
  $('#editUserModal form').submit(function(event) {
    // Prevent the default form submission behavior
    event.preventDefault();

    // Submit the form using AJAX
    $.ajax({
      type: 'PUT',
      url: $(this).attr('action'),
      data: $(this).serialize() + '&change_password=' + ($('#change-password').is(':checked') ? 1 : 0),
      success: function(data) {
        // If the form is submitted successfully, close the modal
        $('#editUserModal').modal('hide');
      },
      error: function(jqXHR, textStatus, errorThrown) {
        // If there are validation errors, display them in the modal
        if (jqXHR.status === 422) {
          var errors = jqXHR.responseJSON.errors;
          for (var field in errors) {
            if (errors.hasOwnProperty(field)) {
              var errorMessage = errors[field][0];
              var fieldElement = $('#editUserModal').find('[name="' + field + '"]');
              fieldElement.addClass('is-invalid');
              fieldElement.after('<span class="invalid-feedback">' + errorMessage + '</span>');
            }
          }
          // Remove the data-dismiss attribute from the modal's close button
          $('#editUserModal .modal-footer button[type="button"]').removeAttr('data-dismiss');
        }
      }
    });
  });

  // Reset the form and remove validation error messages when the modal is shown
  $('#editUserModal').on('show.bs.modal', function() {
    $('#editUserModal form')[0].reset();
    $('#editUserModal .invalid-feedback').remove();
    $('#editUserModal .is-invalid').removeClass('is-invalid');
    $('#editUserModal .modal-footer button[type="button"]').attr('data-dismiss', 'modal');
  });
});

    </script>
    