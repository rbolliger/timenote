<?php include_stylesheets_for_form($form) ?>
<?php include_javascripts_for_form($form) ?>

<?php // use_javascript('jquery');
?>
    <?php use_javascript('jquery.maskedinput-1.2.2.min.js') ?>


<?php /*
<form action="<?php echo url_for('capture/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields() ?>
          &nbsp;<a href="<?php echo url_for('capture/index') ?>">Cancel</a>
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php echo link_to('Delete', 'capture/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
          <?php endif; ?>
          <input type="submit" value="Save" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th><?php echo $form['project_id']->renderLabel() ?></th>
        <td>
          <?php echo $form['project_id']->renderError() ?>
          <?php echo $form['project_id'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['type_id']->renderLabel() ?></th>
        <td>
          <?php echo $form['type_id']->renderError() ?>
          <?php echo $form['type_id'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['user_id']->renderLabel() ?></th>
        <td>
          <?php echo $form['user_id']->renderError() ?>
          <?php echo $form['user_id'] ?>
        </td>
      </tr>
      <?php use_helper('DateForm') ?>
      <tr>
        <th><?php echo $form['start_dt']->renderLabel() ?></th>
        <td>
        <?php echo input_date_tag('start_dt', date('Y-m-d'), 'rich=true') ?>
        <?php echo select_time_tag('start_dt', 'now', 'rich=true class=normaldate'); ?>
          <?php //echo $form['start_dt']->renderError() ?>
          <?php //echo $form['start_dt'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['end_dt']->renderLabel() ?></th>
        <td>
        <!-- goto -->
        <?php echo input_date_tag('end_dt', date('Y-m-d'), 'rich=true') ?>
        
        <?php //echo input_date_tag('end_at', date("Y-m-d",time()), 'rich=true class=normaldate withtime=true culture=fr_FR format=Y-MM-dd HH:mm'); ?>
        <!-- http://www.symfony-project.org/api/1_2/DateFormHelper#method_select_time_tag -->
        <?php echo select_time_tag('end_dt', 'now'); ?>
<!-- <input type="text" id="end_dt_time" name="end_dt[time]" size="10px" /> -->
          <?php //echo $form['end_dt']->renderError() ?>
          <?php //echo $form['end_dt'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['comment']->renderLabel() ?></th>
        <td>
          <?php echo $form['comment']->renderError() ?>
          <?php echo $form['comment'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['percent']->renderLabel() ?></th>
        <td>
          <?php echo $form['percent']->renderError() ?>
          <?php echo $form['percent'] ?>
        </td>
      </tr>
    </tbody>
  </table>
</form>
 *
 */?>


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
<script>
jQuery(function($){
   $("#timenote_entry_end_dt_time").mask("99:99");
});

</script>