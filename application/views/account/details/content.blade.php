<div class="container container-1">
  <div class="container">
    <h1 class="heading pull-left">Change Account Details</h1>
  </div>
</div>
@if(isset($error))
  <div class="alert alert-error">
    <strong>Error!</strong> {{ $error }}
  </div>
@endif
@if(isset($confirmation))
  <div class="alert alert-success">
    <strong>Success!</strong> {{ $confirmation }}
  </div>
@endif
<div class="container-fluid">
  <div class="row-fluid">
    {{ render( 'account.partials.sidebar' ) }}
    <span class="span3">
      <form method="post">
        <fieldset>
          <legend>Change Email</legend>
          <input class="textinput" type="email" placeholder="Enter new email address" name="email">
          <input class="textinput" type="email" placeholder="Re-enter new email address" name="emailConfirm">
          <input class="textinput" type="password" placeholder="Enter current password" name="oldpassword">
          <button class="btn btn-success pull-right" type="submit">Submit Changes</button>
        </fieldset>
      </form>
    </span>
    <span class="span3">
      <form method="post">
        <fieldset>
          <legend>Change Password</legend>
          <input class="textinput" type="password" placeholder="Enter new password" name="password">
          <input class="textinput" type="password" placeholder="Re-enter new password" name="passwordConfirm">
          <input class="textinput" type="password" placeholder="Enter current password" name="oldpassword">
          <button class="btn btn-success pull-right" type="submit">Submit Changes</button>
        </fieldset>
      </form>
    </span>
    <span class="span3">
      <form method="post">
        <fieldset>
          <legend>Change Email Settings</legend>
            <div class="well">
              <label class="checkbox">
                <?php $checked = '';
                if ($account->expirationemail) {
                  $checked="checked";
                }
                echo "<input type='checkbox' value='1' name='expirationEmail' $checked >"
                ?>
                <span>Notify me if my listing is about to expire.</span>
              </label>
            </div>
            <div class="well">
              <label class="checkbox">
                <?php $checked = '';
                if ($account->flagemail) {
                  $checked="checked";
                }
                echo "<input type='checkbox' value='1' name='flagEmail' $checked >"
                ?>
                <span class="cke_focus">Notify me if my listings become flagged.</span>
              </label>
            </div>
            <div class="well">
              <label class="checkbox">
                <?php $checked = '';
                if ($account->wishlistemail) {
                  $checked="checked";
                }
                echo "<input type='checkbox' value='1' name='wishlistEmail' $checked >"
                ?>
                <span class="cke_focus">Notify me weekly if there are new listings that match my wishlist.</span>
              </label>
            </div>
          <button class="btn btn-success pull-right" type="submit">Submit Changes</button>
        </fieldset>
      </form>
    </span>
  </div>
  <div class="row-fluid">
      <a id="warning" class="btn btn-large btn-danger">Delete Account</a>
  </div>
</div>
<script>
  $(document).on('click', '#warning', function() {
    id = $(this).attr('id');
    confirm = confirm( 'Are you sure you want to delete your account?' );
    if(confirm == true) { window.location = "/location/delete/" + id; }
    else {
      delete window.confirm;
    }
  });
  $('#details').attr('class', 'active');
</script>