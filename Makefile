#
# プロジェクト開始用のMakefile
#

# 準備
prepare: composer.phar
	-mkdir -p var/cache
	-mkdir -p var/log
	find var/* -type d -exec chmod 777 {} \;
	find var/* -type f -exec chmod 666 {} \;
	echo "run make env prod|dev|docker"

dev:
	make env dev
	make install
	make devel


composer.phar:
		curl -sS https://getcomposer.org/installer | php

# Composer操作
install: composer.phar
		php composer.phar install --no-dev
update: composer.phar
		php composer.phar update --no-dev
share:
	cd vendor/nora/php/src/share/web && make

# 環境毎のファイル作成
#
# ex) make env prod
# ex) make env devel
ifeq (env,$(firstword $(MAKECMDGOALS)))
  # use the rest as arguments for "run"
  RUN_ARGS := $(wordlist 2,$(words $(MAKECMDGOALS)),$(MAKECMDGOALS))
  # ...and turn them into do-nothing targets
  $(eval $(RUN_ARGS):;@:)
endif

# prod | dev .. etc
env: 
	(cd etc/; ln -sf nginx.$(RUN_ARGS).conf nginx.conf)
run:
	supervisorctl restart nginx
devel:
	sudo make phpunit
	sudo make phpdoc

# PHPUNIT
phpunit: /usr/local/bin/phpunit

etc/phpunit:
	wget -O $@ https://phar.phpunit.de/phpunit.phar
	chmod +x $@

/usr/local/bin/phpunit: etc/phpunit
	ln -s etc/phpunit $@
	

# PHPDOC
phpdoc: /usr/local/bin/phpdoc

etc/phpdoc:
	wget -O $@ http://phpdoc.org/phpDocumentor.phar
	chmod +x $@

/usr/local/bin/phpdoc:
	ln -s etc/phpdoc $@
