# Tog Design Challenge

## Project dependencies

- docker:19.03.12
- docker-compose:1.17.1

## Setup

### On MacOS or Linux based OS
If your OS have support to makefile, you can simply run these two comands:

#### Setup Backend
```
make backend
```
#### Setup frontend
```
make frontend
```

### On windows

#### setup backend
Being in root directory of this project run:
```
cd backend
```
```
docker-compose run build
```
```
docker-compose up backend
```

#### setup frontend
Being in root directory of this project run:
```
cd frontend
```
```
docker-compose up build
```
```
docker-compose up frontend
```

These commands will setup all the project (mysql DB, PHP server, frontend). So it may take a while.

Once everything is setup, you can access frontend in `http://localhost:8080`

Backend is running in `http://localhost:9000` and have the following endpoints:

1. POST /persons
2. GET /persons
3. GET /persons/{id}


PS: If you are facing a 500 error at one of these endpoints, it may be because the database has not been raised yet. It takes some minutes
