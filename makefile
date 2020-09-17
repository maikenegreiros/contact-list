.PHONY: database backend frontend app

database:
	cd backend && docker-compose run -d db

backend:
	cd backend && docker-compose run build
	cd backend && docker-compose up -d backend

frontend:
	cd frontend && docker-compose up build
	cd frontend && docker-compose up frontend

app:
	make database
	make backend
	make frontend
