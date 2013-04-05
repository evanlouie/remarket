<div class="container-fluid1">
  <div class="container">
    <div class="row-fluid">
      <span class="span12">
        <h1 class="heading">Change Account Details</h1>
      </span>
    </div>
  </div>
</div>

<div class="container-fluid">
  <div class="row-fluid">
    {{ render( 'account.partials.sidebar' ) }}
    <span class="span9 well">
      <form method="post">
        <fieldset>
          <legend>Change Email</legend>
         <label class = "account-form-label"> New Email</label>
          <input class="textinput" type="email" placeholder="Enter new email address" name="email"> <br />
          <label class = "account-form-label"> Re-enter New Email</label>
          <input class="textinput" type="email" placeholder="Re-enter new email address" name="emailConfirm"><br />
         <label class = "account-form-label"> Current Password</label>
          <input class="textinput" type="password" placeholder="Enter current password" name="oldpassword">
          <button class="btn btn-success pull-right" type="submit">Submit Changes</button>
        </fieldset>
      </form>

      <form method="post">
        <fieldset>
          <legend>Change Password</legend>
          <label class = "account-form-label"> New Password</label>
          <input class="textinput" type="password" placeholder="Enter new password" name="password"><br />
          <label class = "account-form-label"> Re-enter New Password</label>
          <input class="textinput" type="password" placeholder="Re-enter new password" name="passwordConfirm"><br />
          <label class = "account-form-label"> Current Password</label>
          <input class="textinput" type="password" placeholder="Enter current password" name="oldpassword">
          <button class="btn btn-success pull-right" type="submit">Submit Changes</button>
        </fieldset>
      </form>
    </span>
    <span class="well span9 pull-right">
      <form method="post">
        <fieldset>
          <legend>Change Email Settings</legend>
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

  <span class="span9 well pull-right">
     <legend>Delete Account</legend>
     <label class = "account-form-label">All associated listings and account information will be deleted.</label>
      <a id="warning" class="btn btn-danger pull-right">Delete Account</a>
  </span>


  </div>
</div>

<br>
<script>
  $(document).on('click', '#warning', function() {
    id = $(this).attr('id');
    confirm = confirm( 'Are you sure you want to delete your account?' );
    if(confirm == true) { window.location = "/account/delete/" + id; }
    else {
      delete window.confirm;
    }
  });
  $('#details').attr('class', 'active');
</script>