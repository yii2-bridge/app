<?php
namespace Deployer;

require 'recipe/yii2-app-basic.php';

// Configuration

set('repository', 'git@github.com:naffiq/yii2-app-bridge.git');
set('git_tty', true); // [Optional] Allocate tty for git on first deployment
add('shared_files', []);
add('shared_dirs', []);
add('writable_dirs', []);
set('allow_anonymous_stats', false);

// Hosts

host('project.com')
    ->stage('production')
    ->set('deploy_path', '/var/www/project.com');
    
host('beta.project.com')
    ->stage('beta')
    ->set('deploy_path', '/var/www/project.com');  


// Tasks

desc('Restart PHP-FPM service');
task('php-fpm:restart', function () {
    // The user must have rights for restart service
    // /etc/sudoers: username ALL=NOPASSWD:/bin/systemctl restart php-fpm.service
    run('sudo systemctl restart php-fpm.service');
});
after('deploy:symlink', 'php-fpm:restart');

// [Optional] if deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');
