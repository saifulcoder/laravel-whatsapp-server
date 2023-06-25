# Update Baileys API
Tutorial installation [here](https://youtu.be/rTn-TBj5ifs)
Add bulk messages [here](https://youtu.be/lYf8AJ7-BN4)
contact us saiful.coder@gmail.com

# Baileys Restful API with Laravel
An implementation of [@adiwajshing/Baileys](https://github.com/adiwajshing/Baileys) as a simple RESTful API service with multiple device support.

## Credits
1. Framework : Laravel 8
2. Admin Panel : Crudbooster
3. Backend Server : [@ookamiiixd/baileys-api](https://github.com/ookamiiixd/baileys-api)

## Requirement
1. php 7.4
2. MySQL / MariaDB
3. NodeJs 14 or higher

## Frontend Installation

1. First clone or download this repository:
```bash
git clone https://github.com/saifulcoder/laravel-whatsapp-server.git
```
2. Enter directory project `cd laravel-whatsapp-server`
3. Execute `composer install` to install the dependencies.
4. Setting the database configuration, rename `.env.example` to `.env` and open file at project root directory
```bash
DB_DATABASE=**your_db_name**
DB_USERNAME=**your_db_user**
DB_PASSWORD=**password**
```
5. Setting the URL backend server configuration, open `.env` file at project root directory
```bash
URL_WA_SERVER=http://localhost:3000
```
6. Import database db.sql

7. Run laravel
```bash
php artisan serve --port=80
```
8. Dashboard Admin 
```bash
/admin/login
```
default email : admin@crudbooster.com <br>
default password : 123456


## Backend Installation 

Simple RESTful WhatsApp API by [@ookamiiixd/baileys-api](https://github.com/ookamiiixd/baileys-api) .

1. Enter to the backend project directory `cd backend`.
2. Execute `npm i` to install the dependencies.
3. Build the project using the build script `npm run build`

You can skip this part if you're using the prebuilt one from the release page

## Setup

1. Copy the `.env.example` file and rename it into `.env`, then update your [connection url](https://www.prisma.io/docs/reference/database-reference/connection-urls) in the `DATABASE_URL` field
1. Update your [provider](https://www.prisma.io/docs/reference/api-reference/prisma-schema-reference#fields) in the `prisma/schema.prisma` file if you're using database other than MySQL
1. Run your [migration](https://www.prisma.io/docs/reference/api-reference/command-reference#prisma-migrate)

```sh
npx prisma migrate (dev|deploy)
```

or push the schema

```sh
npx prisma db push
```

Don't forget to always re-run those whenever there's a change on the `prisma/schema.prisma` file

## `.env` Configurations

```env
# Listening Host
HOST="localhost"

# Listening Port
PORT="3000"

# Database Connection URL
DATABASE_URL="mysql://root:12345@localhost:3306/baileys_api"

# Reconnect Interval (in Milliseconds)
RECONNECT_INTERVAL="5000"

# Maximum Reconnect Attempts
MAX_RECONNECT_RETRIES="5"

# Maximum SSE QR Generation Attempts
SSE_MAX_QR_GENERATION="10"

# Pino Logger Level
LOG_LEVEL="warn"
```

## Usage

1. Make sure you have completed the **Installation** and **Setup** step
1. You can then start the app using the `start` script

```sh
npm run start
```

1. Now the endpoint should be available according to your environment variables configuration. Default is at `http://localhost:3000`

## API Docs

The API documentation is available online [here](https://documenter.getpostman.com/view/18988925/2s8Z73zWbg). You can also import the **Postman Collection File** `(postman_collection.json)` into your Postman App alternatively

## Notes

- There's no authentication, you may want to implement your own. I don't want to force anyone into using a specific authentication method, choose whatever you love



## Notice

This project is intended for learning purpose only, don't use it for spamming or any activities that's prohibited by **WhatsApp**


# Functions laravel-wa-server

|                                                               |   |
|---------------------------------------------------------------|---|
| Multiple Device                                               | ✔ |
| 📁 Send **text**                                             | ✔ |
| Admin Panel                                                  | ✔ |
| Multiple Users                                                | ✔ |
| User Privilege                                              | ✔ |
| API RESTFul                                              | ✔ |
| 📁 Send **image, video, audio and docs**                      | ✔ |
| Send stickers                                                 | ✔ |
| Send stickers GIF                                             | ✔ |
| Send Buttons                                                  | coming soon |
| Send Bulk Message                                             | coming soon |
| Send Message with schedule                                    | coming soon |
| Receive message                                               | coming soon |
| Get Chat List                                                | coming soon |
| Get Chat Conversation                                         | coming soon |
| Webhook                                                    | coming soon |

## Contributing

This project helps you and you want to help keep it going? Buy me a coffee:
<br> <a href="https://www.buymeacoffee.com/saifulcoder" target="_blank"><img src="https://www.buymeacoffee.com/assets/img/custom_images/orange_img.png" alt="Buy Me A Coffee" style="height: 61px !important;width: 174px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a><br>
or via <br>
<a href="https://saweria.co/saifulcoder">https://saweria.co/saifulcoder</a>