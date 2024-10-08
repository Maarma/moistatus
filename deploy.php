<?php

namespace Deployer;

require 'recipe/laravel.php';

// Veebimajutus ühendus
set('application', 'gametime');
set('remote_user', 'vhost122307ssh');
set('http_user', 'vhost122307f0');
set('keep_releases', 2);

host('production')
    ->setHostname('gametime.ee')
    ->set('port', '1022')
    ->set('http_user', 'vhost122307f0')
    ->set('deploy_path', '~/htdocs/moistatus')
    ->set('branch', 'main');

// set('repository', 'git@github.com:avrokj/gametime.git');
set('repository', 'git@github.com:Maarma/moistatus.git');


// Tasks
task('opcache:clear', function () {
    run('killall php83-cgi || true');
})->desc('Clear opcache');

task('build:node', function () {
    cd('{{release_path}}');
    run('npm i');
    // run('npx vite build');
    run('rm -rf node_modules');
});

task('deploy', [
    'deploy:prepare',
    'deploy:vendors',
    'artisan:storage:link',
    'artisan:view:cache',
    'artisan:config:cache',
    'build:node',
    'deploy:publish',
    'opcache:clear',
    'artisan:cache:clear'
]);


task('reload:php-fpm', function () {
    run('sudo /usr/sbin/service php8-fpm reload');
});

// Hooks
after('deploy:failed', 'deploy:unlock', 'reload:php-fpm');