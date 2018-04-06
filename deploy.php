<?php
namespace Deployer;

require 'recipe/yii2-app-basic.php';

// Configuration

set('repository', 'git@github.com:naffiq/yii2-app-bridge.git');

// Shared files/dirs between deploys
add('shared_files', ['config/local.php']);
add('shared_dirs', ['web/media', 'runtime']);

// Writable dirs by web server
add('writable_dirs', ['web/media', 'runtime']);

set('allow_anonymous_stats', false);

set('git_tty', false); // [Optional] Allocate tty for git on first deployment
set('ssh_multiplexing', false);

/** @var $userProduction    string username for production host    */
$userProduction = getenv('USER_PRODUCTION') ?: 'admin';
/** @var $userStage         string username for stage host         */
$userStage = getenv('USER_STAGE') ?: 'admin';

// Hosts

host('project.com')
    ->stage('production')
    ->user($userProduction)
    ->set('deploy_path', '/var/www/project.com');
    
host('demo.project.com')
    ->stage('stage')
    ->user($userStage)
    ->set('deploy_path', '/var/www/project.com');  


// Tasks

task('deploy:config', function () {
    $stage = get('stage');
    run("echo '{$stage}' > {{release_path}}/config/mode.php");
    run("cat {{release_path}}/config/mode.php");
})->desc('Set application stage config');
after('deploy:update_code', 'deploy:config');

task('deploy:run_migrations', function () {
    run('cd {{release_path}} && ./vendor/bin/bridge-install');
    // Add your migrations here ...
})->desc('Run migrations');

/*
 * Uncomment code below if OPCache is on for php-fpm
 *
desc('Restart PHP-FPM service');
task('php-fpm:restart', function () {
    // The user must have rights for restart service
    // /etc/sudoers: username ALL=NOPASSWD:/bin/systemctl restart php-fpm.service
    run('sudo systemctl restart php-fpm.service');
});
after('deploy:symlink', 'php-fpm:restart');
*/

// [Optional] if deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');
