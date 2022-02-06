import express from 'express'
import routes from './routes.js'
import { init } from './whatsapp.js'

const app = express()
const host = process.env.HOST ?? '127.0.0.1'
const port = process.env.PORT ?? 8000

app.use(express.urlencoded({ extended: true }))
app.use(express.json())
app.use('/', routes)

app.listen(port, host, () => {
    init()
    console.log(`Server is listening on http://${host}:${port}`)
})

export default app
