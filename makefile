.PHONY: database backend frontend

database:
	cd backend && docker-compose run db

backend:
	cd backend && docker-compose run build
	cd backend && docker-compose run migrations
	cd backend && docker-compose up backend

frontend:
	cd frontend && docker-compose up build
	cd frontend && docker-compose up frontend
