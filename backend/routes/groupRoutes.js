import { Router } from 'express'
import { body, query } from 'express-validator'
import requestValidator from './../middleware/requestValidator.js'
import sessionValidator from './../middleware/sessionValidator.js'
import * as controller from './../controllers/groupController.js'
import getMessages from './../controllers/getMessages.js'

const router = Router()

router.get('/get', query('id').notEmpty(), requestValidator, sessionValidator, controller.getList)

router.get('/get/:jid', query('id').notEmpty(), requestValidator, sessionValidator, getMessages)

router.post(
    '/send',
    query('id').notEmpty(),
    body('receiver').notEmpty(),
    body('message').notEmpty(),
    requestValidator,
    sessionValidator,
    controller.send
)

export default router
