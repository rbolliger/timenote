<p class="sf_admin_td_actions list_action">
  <span class="sf_admin_action_new">
    <?php echo link_to(__('Add child'), 'project/addChild?id='.$timenote_project->getId(), array(), 'messages') ?>
  </span>
  <?php echo $helper->linkToEdit($timenote_project, array(  'params' =>   array(  ),  'class_suffix' => 'edit',  'label' => 'Edit',)) ?>
  <?php echo $helper->linkToDelete($timenote_project, array(  'params' =>   array(  ),  'confirm' => 'Are you sure?',  'class_suffix' => 'delete',  'label' => 'Delete',)) ?>
</p>