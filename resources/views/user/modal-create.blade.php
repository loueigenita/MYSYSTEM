<div class="modal fade" id="createUserModal" tabindex="-1" aria-labelledby="createUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="createUserModalLabel">Create User</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <!-- Form to create a new user -->
          <form method="POST" action="{{ route('users.store') }}">
            @csrf
  
            <div class="form-group">
              <label for="name">Name:</label>
              <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" >
              @error('name')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
  
            <div class="form-group">
              <label for="email">Email:</label>
              <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" >
              @error('email')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
  
            <div class="form-group">
              <label for="password">Password:</label>
              <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" >
              @error('password')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
  
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary"> Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script>
  $(function() {
    // Listen for form submission
    $('#createUserModal form').submit(function(event) {
      // Prevent the default form submission behavior
      event.preventDefault();
  
      // Submit the form using AJAX
      $.ajax({
        type: 'POST',
        url: $(this).attr('action'),
        data: $(this).serialize(),
        success: function(data) {
          // If the form is submitted successfully, close the modal
          $('#createUserModal').modal('hide');
        },
        error: function(jqXHR, textStatus, errorThrown) {
          // If there are validation errors, display them in the modal
          if (jqXHR.status === 422) {
            var errors = jqXHR.responseJSON.errors;
            for (var field in errors) {
              if (errors.hasOwnProperty(field)) {
                var errorMessage = errors[field][0];
                var fieldElement = $('#createUserModal').find('[name="' + field + '"]');
                fieldElement.addClass('is-invalid');
                fieldElement.after('<span class="invalid-feedback">' + errorMessage + '</span>');
              }
            }
            // Remove the data-dismiss attribute from the modal's close button
            $('#createUserModal .modal-footer button[type="button"]').removeAttr('data-dismiss');
          }
        }
      });
    });

    // Reset the form and remove validation error messages when the modal is shown
    $('#createUserModal').on('show.bs.modal', function() {
      $('#createUserModal form')[0].reset();
      $('#createUserModal .invalid-feedback').remove();
      $('#createUserModal .is-invalid').removeClass('is-invalid');
      $('#createUserModal .modal-footer button[type="button"]').attr('data-dismiss', 'modal');
    });
  });
</script>

  
  
  