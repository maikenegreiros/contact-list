# tog-design-challenge

## project dependencies

- docker:19.03.12
- docker-compose:1.17.1

## Setup
In order to get this project running, follow these steps.

First, setup database
```
make database
```
Once database is up, run setup backend
```
make backend
```
Finally, setup frontend
```
make frontend
```
Once everything is setup, you can access frontend in `http://localhost:8081`

Backend is running in `http://localhost:9000` and have the following endpoints:

1. POST /persons
2. GET /persons
3. GET /persons/{id}
