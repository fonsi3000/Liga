#!/bin/sh

echo "🎬 entrypoint.sh: [$(whoami)] [PHP $(php -r 'echo phpversion();')]"

composer dump-autoload --no-interaction --no-dev --optimize

echo "🎬 artisan commands"

# 💡 Group into a custom command e.g. php artisan app:on-deploy
# Ejecutar migraciones
php artisan migrate:fresh 
# php artisan voyager:install --no-interaction --force


echo "🎬 start supervisord"

supervisord -c $LARAVEL_PATH/.deploy/config/supervisor.conf