<h1>Please sign in</h1>
<br />
<p>Welcome to timenote. Please sign in to access your account.</p>
<br />
<form action="<?php echo url_for('@sf_guard_signin') ?>" method="post">
  <table align="center">
    <?php echo $form ?>
  </table>
  <div style="text-align:center">
    <input type="submit" value="sign in" style="align:center;"/>
  </div>
</form>
