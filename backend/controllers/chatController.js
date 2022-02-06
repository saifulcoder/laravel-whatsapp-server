import { MessageType } from '@adiwajshing/baileys'
import { getChatList, formatPhone } from './../whatsapp.js'
import response from './../response.js'

const getList = (req, res) => {
    const { session } = res.locals

    return response(res, 200, true, '', getChatList(session))
}

const send = (req, res) => {
    const { session } = res.locals
    const receiver = formatPhone(req.body.receiver)
    const { message } = req.body

    session
        .isOnWhatsApp(receiver)
        .then((data) => {
            if (!data.exists) {
                return response(res, 400, false, 'The receiver number cannot be found.')
            }

            session
                .sendMessage(receiver, message, MessageType.text)
                .then(() => {
                    return response(res, 200, true, 'The message has been successfully sent.')
                })
                .catch(() => {
                    return response(res, 500, false, 'Failed to send the message.')
                })
        })
        .catch(() => {
            return response(res, 500, false, 'Cannot validate receiver number.')
        })
}

export { getList, send }
