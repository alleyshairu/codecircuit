.PHONY: check test lint-php lint format-php format-views format

check: format lint test

test:
	php ./vendor/bin/phpunit

lint-php:
	php ./vendor/bin/phpstan --memory-limit=-1 analyse

lint: lint-php

format-views:
	npm run format:blade

format-php:
	php ./vendor/bin/php-cs-fixer fix

format: format-php format-views
