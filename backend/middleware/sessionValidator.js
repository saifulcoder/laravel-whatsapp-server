import { getSession } from '../whatsapp.js'
import response from './../response.js'

const validate = (req, res, next) => {
    const session = getSession(req.query.id)

    if (!session) {
        return response(res, 404, false, 'Session not found.')
    }

    res.locals.session = session
    next()
}

export default validate
