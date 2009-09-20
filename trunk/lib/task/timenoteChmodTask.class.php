<?php

class timenoteChmodTask extends sfBaseTask {
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
        $this->name             = 'chmod';
        $this->briefDescription = 'Executes chmod operations (777) on the whole project folder';
        $this->detailedDescription = <<<EOF
            The [timenote:chmod|INFO] task executes chmnod -R 777 on the whole project folder.
Call it with:

  [php symfony timenote:chmod|INFO]
EOF;
    }

    protected function execute($arguments = array(), $options = array()) {

        // logging action
        $this->logSection('timenote', 'Applying chmod 777 an the whle project tree (ingnoring svn files)');

        // getting files list
        $files = sfFinder::type('any')->ignore_version_control()->in(sfConfig::get('sf_root_dir'));

        // chmodding files
        $this->getFilesystem()->chmod($files, 0777);


    }
}
