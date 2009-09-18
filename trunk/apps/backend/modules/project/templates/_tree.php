<ul <?php echo (!empty($i)?'id="main_list" ':'')?>class="page-list">
  <?php foreach($tree->getChildren() as $node): ?>
    <li class="item_list clear-element" id="ele-<?php echo $node->getPrimaryKey() ?>">
      <div class="sort-handle">
         <?php echo $node->getTitle() ?>
      </div>
      <?php include_partial('project/list_td_actions', array('timenote_project' => $node, 'helper' => $helper)) ?>

      <?php if ($node->hasChildren()): ?>
            <?php include_partial('project/tree',array('tree' => $node, 'helper' => $helper)) ?>
      <?php endif; ?>
    </li>
  <?php endforeach; ?>
</ul>
