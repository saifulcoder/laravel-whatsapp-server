# Baileys API

An implementation of [@adiwajshing/Baileys](https://github.com/adiwajshing/Baileys) as a simple RESTful API service with multiple device support. This project implements both **Legacy** (Normal WhatsApp Web) and **Beta Multi-Device** client so that you can choose and use one of them easily.

## Installation

1. Download or clone this repo.
2. Enter to the project directory.
3. Execute `npm i` to install the dependencies.

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

1. You can start the app by executing `npm run start` or `node .`.
2. Now the endpoint should be available according to your environment variable configurations. Default is at `http://localhost:8000`.

## API Docs

The API documentation is available online [here](https://documenter.getpostman.com/view/18988925/2s8Z73zWbg). You can also import the **Postman Collection File** `(postman_collection.json)` into your Postman App alternatively

## Notes
- The app only provide a very simple validation, you may want to implement your own.
- There's no authentication, you may want to implement your own.
- The **Beta Multi-Device** client use provided baileys's `makeInMemoryStore` method which will store your data in memory and a json file, you may want to use a better data management.
- **There's no reading message occured before sending message**. The reading message only occurs when the client received message from someone, it will read them immediately. You should always read messages before starting the app and start sending messages to avoid abnormal detection.

## Notice

This project is intended for learning purpose only, don't use it for spamming or any activities that's prohibited by **WhatsApp**
