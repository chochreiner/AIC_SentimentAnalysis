deploy:
	@@rsync -avz ./ han:/var/www/aic.braincrafted.com --exclude-from=./app/Config/rsync_exclude.txt

build:
	@@mkdir -p ./app/tmp/cache/persistent
	@@mkdir -p ./app/tmp/cache/models
	@@mkdir -p ./app/tmp/logs
	@@./app/Console/cake schema create
	@@mysql -ustudy_aic -p study_aic < ./app/Config/Schema/test_data_full.sql
	@@chmod -R 777 ./app/tmp

.PHONY: deploy
