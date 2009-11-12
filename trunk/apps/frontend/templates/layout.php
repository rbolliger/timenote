<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <title>timenote - time's capture</title>
    <link rel="shortcut icon" href="/favicon.ico" />
    <?php include_javascripts() ?>
    <?php include_stylesheets() ?>
  </head>
  <body>
  <div id="container">
    <div id="header">
      <h1>
        <a href="<?php echo url_for('capture/main') ?>">
          <img src="/images/logo.jpg" alt="timenote capture board" />
          <span class="subtitle">
            worker's time capture
          </span>
        </a>

      </h1>

    </div>
    <div id="menu">
      <ul>
        <?php if ($sf_user->isAuthenticated()) : ?>
          <li>
            <?php echo link_to('Capture hours', 'capture/main') ?>
          </li>
          <li>
            <?php echo link_to('Search & Export', 'capture/index') ?>
          </li>
          <li>
           <!-- Spacer --> &nbsp;
          </li>
          <li>
            <?php echo link_to('User Options', '@homepage') ?>
          </li>
          <li>
          <!-- Spacer --> &nbsp;
          </li>
          <li>
            <?php echo link_to('Sign out', '@sf_guard_signout') ?>
          </li>
            <?php else: ?>
          <li>
            <?php echo link_to('Login', '@sf_guard_signin') ?>
          </li>
          <li>
            <?php echo link_to('Sign in', '@sf_guard_signin') ?>
          </li>
        <?php endif; ?>
      </ul>
    </div>

    <div id="main">
      <div id="sidebar">
<!--        <div id="sidebar">
          <?php if (!include_slot('sidebar')): ?>
            <h1>sidebar zone</h1>
            <p>This zone contains links and information
            relative to the main content of the page.</p>
          <?php endif; ?>
        </div> -->
        <div class="sideblock">sb1</div>
        <div class="sideblock">sb2</div>
        <div class="sideblock">sb3</div>
      </div>
      <div id="content">
          <?php if ($sf_user->hasFlash('notice')): ?>
            <div class="flash_notice">
              <?php echo $sf_user->getFlash('notice') ?>
            </div>
          <?php endif; ?>

          <?php if ($sf_user->hasFlash('error')): ?>
            <div class="flash_error">
              <?php echo $sf_user->getFlash('error') ?>
            </div>
          <?php endif; ?>

          <?php echo $sf_content ?>
      </div>
    </div>
  <div id="footer"><?php if (has_component_slot('footer')) { include_component_slot('footer'); } ?></div>
</div>


  </body>
</html>