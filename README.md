# Settings

## project name
- in .env
- COMPOSE_PROJECT_NAME=wp_docker

## setting theme nama
- in .env
- WP_THEME_NAME=theme-dev

- in .devcontainer\devcontainer.json
- "workspaceFolder": "/var/www/html/wp-content/themes/theme-dev",

## setting wp-config-sample.php
- define( 'DB_NAME', 'database_name_here' );
- define( 'DB_USER', 'username_here' );
- define( 'DB_PASSWORD', 'password_here' );
- define( 'DB_HOST', 'localhost' ); => 「mysql」
