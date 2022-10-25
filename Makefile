
.PHONY: sail-setup
sail-setup: ## install composer requirements to make sail work
	docker run --rm -u "$(id -u):$(id -g)" -v $(pwd):/opt -w /opt laravelsail/php81-composer:latest composer install --ignore-platform-reqs
	./vendor/bin/sail npm install

.PHONY: sail-up
sail-up: ## Bring up the containers
	./vendor/bin/sail up -d

.PHONY: sail-down
sail-down: ## Bring down the containers
	./vendor/bin/sail down

.PHONY: cleanup
cleanup: ## Cleanup the bundle image.
	./vendor/bin/sail artisan cache:clear
	./vendor/bin/sail artisan config:clear
	./vendor/bin/sail artisan clear-compiled
	./vendor/bin/sail artisan route:clear
	./vendor/bin/sail artisan view:clear
	./vendor/bin/sail artisan optimize:clear

# helpers
#./vendor/bin/sail php --version
#./vendor/bin/sail artisan --version
#./vendor/bin/sail composer --version
#./vendor/bin/sail npm --version

#.PHONY: php
#php: ## Run php
#	./vendor/bin/sail php $(filter-out $@,$(MAKECMDGOALS))
#
#.PHONY: artisan
#artisan: ## Run php artisan
#	./vendor/bin/sail artisan $(filter-out $@,$(MAKECMDGOALS))
#
#.PHONY: composer
#composer: ## Run composer
#	./vendor/bin/sail composer $(filter-out $@,$(MAKECMDGOALS))
#
#.PHONY: npm
#npm: ## Run npm
#	./vendor/bin/sail npm $(filter-out $@,$(MAKECMDGOALS))

.PHONY: npm-run-dev
npm-run-dev: ## Run npm-run-dev, runs Vite in the background
	./vendor/bin/sail npm install
	./vendor/bin/sail npm run dev

.PHONY: npm-run-build
npm-run-build: ## Run npm-run-build, used for prod CSS/JS bundle
	./vendor/bin/sail npm run build