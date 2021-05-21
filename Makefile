start:
	docker-compose up -d
app_shell:
	docker-compose exec app bash

db_shell:
	docker-compose exec database mysql -uroot -ppassword

.PHONY: start app_shell db_shell