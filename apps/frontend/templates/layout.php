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

        <div class="content">

          <h1>
            <a href="<?php echo url_for('capture/main') ?>">
              <img src="/images/logo.jpg" alt="timenote capture board" />
            </a>
          </h1>

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

        </div>

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

        <div class="content">
          <?php echo $sf_content ?>
        </div>
      </div>

      <div id="footer">
        <div class="content">
          <span class="symfony">
            <!-- <img src="/images/jobeet-mini.png" /> -->
            powered by <a href="http://www.symfony-project.org/">
            <img src="/images/symfony.gif" alt="symfony framework" />
            </a>
          </span>
          <ul>
            <li><a href="">About timenote</a></li>
            <li class="feed"><a href="">Full feed</a></li>
            <li><a href="">timenote API</a></li>
            <li class="last"><a href="">..</a></li>
          </ul>
        </div>
      </div>
    </div>
  </body>
</html>