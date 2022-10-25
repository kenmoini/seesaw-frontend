
.PHONY: sail-up
sail-up: ## Bring up the containers
	./vendor/bin/sail up

.PHONY: sail-down
sail-down: ## Bring down the containers
	./vendor/bin/sail down

.PHONY: cleanup
cleanup: ## Cleanup the bundle image.
	php artisan cache:clear
	php artisan config:clear
	php artisan clear-compiled
	php artisan route:clear
	php artisan view:clear
	php artisan optimize:clear

# helpers
#./vendor/bin/sail php --version
#./vendor/bin/sail artisan --version
#./vendor/bin/sail composer --version
#./vendor/bin/sail npm --version

.PHONY: php
php: ## Run php
	./vendor/bin/sail php $(filter-out $@,$(MAKECMDGOALS))

.PHONY: artisan
artisan: ## Run php artisan
	./vendor/bin/sail artisan $(filter-out $@,$(MAKECMDGOALS))

.PHONY: composer
composer: ## Run composer
	./vendor/bin/sail composer $(filter-out $@,$(MAKECMDGOALS))

.PHONY: npm
npm: ## Run npm
	./vendor/bin/sail npm $(filter-out $@,$(MAKECMDGOALS))

.PHONY: npm-run-dev
npm-run-dev: ## Run npm-run-dev
	./vendor/bin/sail npm run dev