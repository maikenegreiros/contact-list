# Tog Design Challenge

## Project dependencies

- docker:19.03.12
- docker-compose:1.17.1

## Setup
In order to get this project running, simply run the followind command.

```
make app
```
This command will setup all the project (mysql DB, PHP server, frontend). So it may take a while.

Once everything is setup, you can access frontend in `http://localhost:8080`

Backend is running in `http://localhost:9000` and have the following endpoints:

1. POST /persons
2. GET /persons
3. GET /persons/{id}
