start:
	docker-compose up -d
stop:
	docker-compose down
app_shell:
	docker-compose exec app bash

db_shell:
	docker-compose exec database mysql -uroot -ppassword

.PHONY: start stop app_shell db_shell
