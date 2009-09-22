<?php include_stylesheets_for_form($form) ?>
<?php include_javascripts_for_form($form) ?>

    <?php use_javascript('jquery.maskedinput-1.2.2.min.js') ?>


<?php #echo $form ?>
<form action="<?php echo url_for('capture/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <?php echo $form ?>
    <tr>
      <td colspan="2">
        <input type="submit" />
      </td>
    </tr>
  </table>
</form>
<script language="text/javascript">
<!--
jQuery(function($){
   $("#timenote_entry_end_dt_time").mask("99:99");
});
//-->
</script>