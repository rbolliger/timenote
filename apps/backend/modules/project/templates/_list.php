<?php use_stylesheet('admin_project.css') ?>
<div class="sf_admin_list">
  <?php if (!$pager->getNbResults()): ?>
    <p><?php echo __('No result', array(), 'sf_admin') ?></p>
  <?php else: ?>
    <table cellspacing="0">
      <thead>
        <tr>
          <th id="sf_admin_list_batch_actions"><?php /*<input id="sf_admin_list_batch_checkbox" type="checkbox" onclick="checkAll();" />*/?></th>
          <?php include_partial('project/list_th_tabular', array('sort' => $sort)) ?>
          <th id="sf_admin_list_th_actions"><?php echo __('Actions', array(), 'sf_admin') ?></th>
        </tr>
      </thead>
      <tfoot>
        <tr>
          <th colspan="3">
            <?php if ($pager->haveToPaginate()): ?>
              <?php include_partial('project/pagination', array('pager' => $pager)) ?>
            <?php endif; ?>

            <?php echo format_number_choice('[0] no result|[1] 1 result|(1,+Inf] %1% results', array('%1%' => $pager->getNbResults()), $pager->getNbResults(), 'sf_admin') ?>
            <?php if ($pager->haveToPaginate()): ?>
              <?php echo __('(page %%page%%/%%nb_pages%%)', array('%%page%%' => $pager->getPage(), '%%nb_pages%%' => $pager->getLastPage()), 'sf_admin') ?>
            <?php endif; ?>
          </th>
        </tr>
      </tfoot>
     <tbody>
        <tr>
            <td class="container_main_list" colspan="3">
              <?php foreach ($pager->getResults() as $i => $item): ?>
                <?php include_partial('project/tree',array('tree' => $item, 'i' => $i, 'helper' => $helper)) ?>
              <?php endforeach; ?>
            </td>
        </tr>
      </tbody>
      <!-- <tbody>
        <?php foreach ($pager->getResults() as $i => $project): $odd = fmod(++$i, 2) ? 'odd' : 'even' ?>
          <tr class="sf_admin_row <?php echo $odd ?>">
            <?php include_partial('project/list_td_batch_actions', array('timenote_project' => $project, 'helper' => $helper)) ?>
            <?php include_partial('project/list_td_tabular', array('timenote_project' => $project)) ?>
            <?php include_partial('project/list_td_actions', array('timenote_project' => $project, 'helper' => $helper)) ?>
          </tr>
        <?php endforeach; ?>
      </tbody> -->


    </table>
  <?php endif; ?>
</div>
<div>
	<input type="hidden" id="hashValue" name="hashValue" value="" />
	<input type="hidden" name="ids" value="<?php echo (!empty($item)?$item->getPrimaryKey():'1') ?>" />
</div>
<script type="text/javascript">
/* <![CDATA[ */
//function checkAll()
//{
//  var boxes = document.getElementsByTagName('input'); for(var index = 0; index < boxes.length; index++) { box = boxes[index]; if (box.type == 'checkbox' && box.className == 'sf_admin_batch_checkbox') box.checked = document.getElementById('sf_admin_list_batch_checkbox').checked } return true;
//}
/* ]]> */
</script>
<script type="text/javascript">
/* <![CDATA[ */
$(document).ready(function()  {
  $('#main_list').NestedSortable(
    {
      accept: 'item_list',
      opacity: 0.6,
      autoScroll: true,
      revert: true,
      nestingPxSpace: '15',
      handle: '.sort-handle',
      currentNestingClass: 'current-nesting',
      noNestingClass: 'sf_admin_td_actions',
      onChange: function(serialized) {
	$('#hashValue').val(serialized[0].hash);
      }
    }
  );
});
/* ]]> */
</script>
