.PHONY: backend frontend

backend:
	cd backend && docker-compose run build
	cd backend && docker-compose up backend

frontend:
	cd frontend && docker-compose up build
	cd frontend && docker-compose up frontend
