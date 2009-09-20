<?php

class timenoteSvnupTask extends sfBaseTask {
    protected function configure() {
    // // add your own arguments here
    // $this->addArguments(array(
    //   new sfCommandArgument('my_arg', sfCommandArgument::REQUIRED, 'My argument'),
    // ));

        $this->addOptions(array(
            new sfCommandOption('application', null, sfCommandOption::PARAMETER_REQUIRED, 'The application name'),
            new sfCommandOption('env', null, sfCommandOption::PARAMETER_REQUIRED, 'The environment', 'dev'),
            new sfCommandOption('connection', null, sfCommandOption::PARAMETER_REQUIRED, 'The connection name', 'propel'),
            // add your own options here
        ));

        $this->namespace        = 'timenote';
        $this->name             = 'svn-up';
        $this->briefDescription = 'Updates the project from svn';
        $this->detailedDescription = <<<EOF
            The [timenote:svn-up|INFO] task updates the project form the svn repository.
Call it with:

  [php symfony timenote:svn-up|INFO]
EOF;
    }

    protected function execute($arguments = array(), $options = array()) {

    // logging action
        $this->logSection('timenote', 'Updating project from svn');

        $last_line = system(sprintf('svn up %s',realpath(sfConfig::get(sf_root_dir))), $retval);
    }
}
