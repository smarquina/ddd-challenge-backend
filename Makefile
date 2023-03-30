start:
	docker-compose -f docker-compose.yml up -d --build
	docker-compose -f docker-compose.yml run web composer install

bash:
	docker-compose -f docker-compose.yml run web /bin/bash

stop:
	docker-compose -f docker-compose.yml stop