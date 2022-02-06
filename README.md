
# Baileys Restful API with Laravel
An implementation of [@adiwajshing/Baileys] (https://github.com/adiwajshing/Baileys) as a simple RESTful API service with multiple device support.

## Credits
1. Framework : Laravel 8
2. Admin Panel : Crudbooster
3. Backend Server : [@ookamiiixd/baileys-api](https://github.com/ookamiiixd/baileys-api)


## Frontend Installation

1. First clone or download this repository:
```bash
git clone https://github.com/saifulcoder/laravel-wa-server.git
```
2. Execute `npm i` to install the dependencies.
3. Setting the database configuration, rename `.env.example` to `.env` and open file at project root directory
```bash
DB_DATABASE=**your_db_name**
DB_USERNAME=**your_db_user**
DB_PASSWORD=**password**
```
4. Setting the URL backend server configuration, open `.env` file at project root directory
```bash
URL_WA_SERVER=http://localhost:8000
```
5. Create the media-table by running the migrations:
```bash
php artisan migrate
```
6. run laravel
```bash
php artisan serve --port=80
```
7. Dashboard Admin 
```bash
/admin/login
```
default email : admin@crudbooster.com
default password : 123456


## Backend Installation 

Simple RESTful WhatsApp API by [@ookamiiixd/baileys-api](https://github.com/ookamiiixd/baileys-api) .

1. Enter to the backend project directory `cd backend`.
2. Execute `npm i` to install the dependencies.
3. You can start the app by executing `npm run start` or `node .`.
4. Now the endpoint should be available according to your environment variable settings. Default is at `http://localhost:8000`.

### Backend API DOCs

The API documentation is available online at [here](https://documenter.getpostman.com/view/18988925/UVRHiNne). You can also import the **Postman Collection File** `(postman_collection.json)` into your Postman App alternatively.

The server will respond in JSON format:

```javascript
{
    success: true|false, // bool
    message: "", // string
    data: {} // object
}
```

# Functions laravel-wa-server

|                                                               |   |
|---------------------------------------------------------------|---|
| Multiple Device                                               | ✔ |
| 📁 Send **text**                                             | ✔ |
| Admin Panel                                                  | ✔ |
| Multiple Users                                                | ✔ |
| User Privilege                                              | ✔ |
| API RESTFul                                              | ✔ |
| 📁 Send **image, video, audio and docs**                      | coming soon |
| Send Buttons                                                  | coming soon |
| Send stickers                                                 | coming soon |
| Send stickers GIF                                             | coming soon |
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