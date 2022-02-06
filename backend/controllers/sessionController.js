import { isSessionExists, createSession, triggerDeleteSession } from './../whatsapp.js'
import response from './../response.js'

const find = (req, res) => {
    if (isSessionExists(req.params.id)) {
        return response(res, 200, true, 'Session found.')
    }

    return response(res, 404, false, 'Session not found.')
}

const add = (req, res) => {
    const sessionId = req.body.id

    if (isSessionExists(sessionId)) {
        return response(res, 409, false, 'Session already exists, please use other id.')
    }

    createSession(sessionId, res)
}

const del = (req, res) => {
    triggerDeleteSession(req.params.id)

    return response(res, 200, true, 'The session has been successfully deleted.')
}

export { find, add, del }
