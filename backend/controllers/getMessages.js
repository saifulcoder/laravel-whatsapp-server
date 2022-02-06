import response from './../response.js'

const getMessages = (req, res) => {
    /* eslint-disable camelcase */
    const { session } = res.locals
    const { jid } = req.params
    const { limit = 25, cursor_id = null, cursor_fromMe = null } = req.query
    const cursor = {
        id: cursor_id,
        fromMe: cursor_fromMe === null ? cursor_fromMe : cursor_fromMe === 'true',
    }
    /* eslint-enable camelcase */

    session
        .loadMessages(jid, limit, cursor)
        .then((messages) => {
            return response(res, 200, true, '', messages)
        })
        .catch(() => {
            return response(res, 500, false, 'Failed to load messages.')
        })
}

export default getMessages
