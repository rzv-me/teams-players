# Teams Players

Teams Players is a project to manage teams and players.

I only created the minimum number of api routes to satisfy the needs.

I used `Laravel 5.8`, `Vue 2.6`, `Vue Router 3` and `TailwindCSS 0.7.4`

This is SPA style app, that uses **VueRouter** for navigation. The API routes are saved under `/routes/api.php`.

## Installation

Use the [composer](https://getcomposer.org) to install php dependencies.

```bash
composer install
```

Use [npm](https://www.npmjs.com/get-npm) to install npm dependencies.

```bash
npm install
```

To compile Vue assets you need to run
```bash
npm run dev
```

To do a fresh migration and seed the database you need to run
```bash 
php artisan migrate:fresh --seed
``` 

## API
To use the api you need to use Bearer Authorization with an `api_token` asigned to an user from the database.
The seeder contains the token `idiesa3ogh1zuy9shahz5quoo6ruqueit9ieX6eghoo0Guf0OhJez1phah6c`
### Teams
#### Get Teams
To get the teams you need to do a `GET` request to `/api/teams`. The answer will be something similar to this.
```json
[
  {
    "id": 1,
    "name": "Real Madrid",
    "created_at": "2019-03-21 13:03:45",
    "updated_at": "2019-03-21 13:03:45"
  },
  {
    "id": 2,
    "name": "FC Barcelona",
    "created_at": "2019-03-21 13:03:45",
    "updated_at": "2019-03-21 13:03:45"
  }
]
```
#### Get Team
To get a team you need to do a `GET` request to `/api/teams/:team_id`. The answer will be something similar to this.
```json
{
  "id": 2,
  "name": "FC Barcelona",
  "created_at": "2019-03-21 13:03:45",
  "updated_at": "2019-03-21 13:03:45"
}
```
#### Add Team
To add a team you need to do a `POST` request to `/api/teams` with the `name` of the team.
```json
{
	"name": "Liverpool FC"
}
```
Response:
```json
{
  "name": "Liverpool FC",
  "updated_at": "2019-03-20 14:59:49",
  "created_at": "2019-03-20 14:59:49",
  "id": 4
}
```

### Players
#### Get Team Players
To get the teams you need to do a `GET` request to `/api/teams/:team_id/players`. The answer will be something similar to this.
```json
{
  "id": 2,
  "name": "F.C. Barcelona",
  "created_at": "2019-03-20 15:37:50",
  "updated_at": "2019-03-20 15:37:50",
  "players": [
    {
      "id": 5,
      "first_name": "Gheorghe",
      "last_name": "Hagi",
      "team_id": 2,
      "created_at": "2019-03-20 15:45:07",
      "updated_at": "2019-03-20 15:45:07"
    },
    {
      "id": 6,
      "first_name": "Lionel",
      "last_name": "Messi",
      "team_id": 2,
      "created_at": "2019-03-20 15:45:27",
      "updated_at": "2019-03-20 15:45:27"
    },
    {
      "id": 7,
      "first_name": "Samuel",
      "last_name": "Eto'o",
      "team_id": 2,
      "created_at": "2019-03-20 15:45:44",
      "updated_at": "2019-03-20 15:45:44"
    },
    {
      "id": 8,
      "first_name": "Gerard",
      "last_name": "Pique",
      "team_id": 2,
      "created_at": "2019-03-20 19:59:47",
      "updated_at": "2019-03-20 19:59:47"
    }
  ]
}
```
#### Add Team Players
To add a team you need to do a `POST` request to `/api/teams/:team_id/players` with the `first_name` and `last_name` of the player.
```json
{
	"first_name": "Gerard",
	"last_name": "Pique"
}
```
Response:
```json
{
  "first_name": "Gerard",
  "last_name": "Pique",
  "team_id": 2,
  "updated_at": "2019-03-21 11:22:57",
  "created_at": "2019-03-21 11:22:57",
  "id": 10
}
```

#### Update Player
To update a players first name or last name you need to do a `PATCH` request to `/api/players/:player_id` with the `first_name` and `last_name` of the player.
```json
{
	"first_name": "Gerarde",
	"last_name": "Pique"
}
```
Response:
```json
{
  "first_name": "Gerarde",
  "last_name": "Pique",
  "team_id": 2,
  "updated_at": "2019-03-21 11:22:57",
  "created_at": "2019-03-21 11:22:57",
  "id": 10
}
```
