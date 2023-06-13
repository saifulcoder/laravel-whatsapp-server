> 🚨 **NOTICE**: `@adiwajshing/baileys` which is this project relied on, has been discontinued. Thus, this project will be archived and stopped receiving updates anymore. Thanks everyone who's been part of this❤️

---

# Baileys API

An implementation of [@adiwajshing/Baileys](https://github.com/adiwajshing/Baileys) as a simple REST API with multiple device support

## Requirements

- **NodeJS** version **14.5.0** or higher
- **Prisma** [supported databases](https://www.prisma.io/docs/reference/database-reference/supported-databases). Tested on MySQL and PostgreSQL

## Installation

1. Download or clone this repo. If you want to skip the build step, you can download the prebuilt one (file with the `baileys-api-VERSION.tgz` name pattern) from the release page
2. Enter to the project directory
3. Install the dependencies

```sh
npm install
```

4. Build the project using the `build` script

```sh
npm run build
```

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
