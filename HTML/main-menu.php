<!-- main-menu.php -->
<link rel="stylesheet" href="CSS/main-menu.css">
<div class="main-menu">
  <div></div>
  <?php
    // key => label
    $sections = [
      'chest'       => 'Chest',
      'back'        => 'Back',
      'biceps'      => 'Biceps',
      'shoulders'   => 'Shoulders',
      'legs'        => 'Legs',
      'triceps'     => 'Triceps',
    ];
    foreach($sections as $key => $label): ?>
      <div class="<?= $key ?> main-list">
        <a href="layout.php?page=<?= urlencode($key) ?>"><?= htmlspecialchars($label) ?></a>
      </div>
  <?php endforeach; ?>
  <div></div>
</div>
<script src="JS/main-menu.js"></script>
