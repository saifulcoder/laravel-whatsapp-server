<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

# Baileys Restful API Laravel
An implementation of [@adiwajshing/Baileys](https://github.com/adiwajshing/Baileys) as a simple RESTful API service with multiple device support.

## Frontend Installation

1. You can install the package via composer:
```bash
composer require saifulcoder/laravel-wa-server
```
2. Execute `npm i` to install the dependencies.
3. Setting the database configuration, open `.env` file at project root directory
```bash
DB_DATABASE=**your_db_name**
DB_USERNAME=**your_db_user**
DB_PASSWORD=**password**
```
4. Setting the URL backend server configuration, in `.env`
```bash
URL_WA_SERVER=http://localhost:8000
```

## Backend Installation 

Simple RESTful WhatsApp API @ookamiiixd/baileys-api.

1. Enter to the project directory `cd backend`.
2. Execute `npm i` to install the dependencies.
3. You can start the app by executing `npm run start` or `node .`.
4. Now the endpoint should be available according to your environment variable settings. Default is at `http://localhost:8000`.

## Functions laravel-wa-server

|                                                               |   |
|---------------------------------------------------------------|---|
| 🚻 Automatic QR Refresh                                       | ✔ |
| 📁 Send **text**                                              | ✔ |
| Multiple Device                                               | ✔ |
| 📁 Send **image, video, audio and docs**                      | coming soon |
| Send Buttons                                                  | coming soon |
| Send stickers                                                 | coming soon |
| Send stickers GIF                                             | coming soon |
| Send Bulk Message                                             | coming soon |