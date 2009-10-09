<?php include_stylesheets_for_form($form) ?>
<?php include_javascripts_for_form($form) ?>

<?php //use_javascript('jquery.js') ?>
<?php //use_javascript('jquery.maskedinput-1.2.2.min.js') ?>


<?php #echo $form ?>
<form action="<?php echo url_for('capture/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
  <input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
<?php //echo $form['user_id'] ?>
<?php echo $form->renderHiddenFields() ?>
  <table>
    <!-- Table Global Errors -->
    <?php if ($form->hasGlobalErrors()): ?>
      <tr>
        <td colspan="2">
          <ul class="error_list">
            <?php foreach ($form->getGlobalErrors() as $name => $error): ?>
              <li><?php echo $name.': '.$error ?></li>
            <?php endforeach; ?>
          </ul>
        </td>
      </tr>
    <?php endif; ?>

    <?php //echo $form ?>

    <tr>
      <th><?php echo $form['project_id']->renderLabel() ?>:</th>
      <td>
        <?php echo $form['project_id']->renderError() ?>
        <?php echo $form['project_id'] ?>
      </td>
    </tr>
    <tr>
      <th><?php echo $form['cat_id']->renderLabel() ?>:</th>
      <td>
        <?php echo $form['cat_id']->renderError() ?>
        <?php echo $form['cat_id'] ?>
      </td>
    </tr>
    <tr>
      <th><?php echo $form['start_dt']->renderLabel() ?>:</th>
      <td>
        <?php echo $form['start_dt']->renderError() ?>
        <?php echo $form['start_time']->renderError() ?>
        <?php echo $form['start_dt'] ?>
        <?php echo $form['start_time'] ?>
      </td>
    </tr>
    <tr>
      <th><?php echo $form['end_dt']->renderLabel() ?>:</th>
      <td>
        <?php echo $form['end_dt']->renderError() ?>
        <?php echo $form['end_time']->renderError() ?>
        <?php echo $form['end_dt'] ?>
        <?php echo $form['end_time'] ?>
      </td>
    </tr>

    <?php echo $form['comment']->renderRow() ?>
    <!--
    <tr>
      <th><?php echo $form['comment']->renderLabel() ?>:</th>
      <td>
        <?php echo $form['comment']->renderError() ?>
        <?php echo $form['comment'] ?>
      </td>
    </tr> -->
    <tr>
      <td colspan="2">
        <input type="submit" />
      </td>
    </tr>
  </table>
</form>
<script language="text/javascript">
<!--

//jQuery(function($){
//   $("#timenote_entry_end_dt_time").mask("99:99");
//   $("#timenote_entry_end_time").mask("99:99");
//   $("#timenote_entry_start_time").mask("99:99");
//});
jQuery(function($){
   $("#end_time").mask("99:99");
   $("#start_time").mask("99:99");
});

//$(window).load(function(){
//  // Le code placé ici sera déclenché
//  // au chargement complet de la page.
//   //$("#timenote_entry_end_dt_time").mask("99:99");
//   $("#end_time").mask("99:99");
//   $("#start_time").mask("99:99");
//});

//-->
</script>