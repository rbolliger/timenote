<h1>Capture List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Project</th>
      <th>Type</th>
      <th>User</th>
      <th>Start dt</th>
      <th>End dt</th>
      <th>Comment</th>
      <th>Percent</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($timenote_entry_list as $timenote_entry): ?>
    <tr>
      <td><a href="<?php echo url_for('capture/edit?id='.$timenote_entry->getId()) ?>"><?php echo $timenote_entry->getId() ?></a></td>
      <td><?php echo $timenote_entry->getProjectId() ?></td>
      <td><?php echo $timenote_entry->getTypeId() ?></td>
      <td><?php echo $timenote_entry->getUserId() ?></td>
      <td><?php echo $timenote_entry->getStartDt() ?></td>
      <td><?php echo $timenote_entry->getEndDt() ?></td>
      <td><?php echo $timenote_entry->getComment() ?></td>
      <td><?php echo $timenote_entry->getPercent() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('capture/new') ?>">New</a>