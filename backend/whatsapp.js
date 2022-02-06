import fs from 'fs'
import path from 'path'
import { fileURLToPath } from 'url'
import { WAConnection } from '@adiwajshing/baileys'
import { toDataURL } from 'qrcode'
import response from './response.js'

const __dirname = path.dirname(fileURLToPath(import.meta.url))
const sessions = new Map()

const isCreatedSession = (sessionId) => {
    return fs.existsSync(path.join(__dirname, 'sessions', `${sessionId}.json`))
}

const isSessionExists = (sessionId) => {
    return sessions.has(sessionId)
}

const getSession = (sessionId) => {
    return sessions.get(sessionId) ?? null
}

const createSession = async (sessionId, res = null) => {
    const isCreated = isCreatedSession(sessionId)
    const wa = new WAConnection()
    const timeout = setTimeout(() => {
        wa.close()
    }, 20000)

    wa.version = [3, 3234, 9]
    wa.browserDescription = ['Windows', 'Chrome', '10']

    if (isCreated) {
        wa.loadAuthInfo(path.join(__dirname, 'sessions', `${sessionId}.json`))
    }

    wa.on('open', () => {
        const authInfo = wa.base64EncodedAuthInfo()
        fs.writeFileSync(path.join(__dirname, 'sessions', `${sessionId}.json`), JSON.stringify(authInfo, null, '\t'))
        sessions.set(sessionId, wa)
        clearTimeout(timeout)
    })

    wa.on('qr', (qr) => {
        if (!res || res.headersSent || isCreated) {
            return deleteSession(sessionId)
        }

        toDataURL(qr)
            .then((url) => {
                return response(res, 200, true, 'QR code received, please scan the QR code.', { qr: url })
            })
            .catch(() => {
                return response(res, 500, false, 'Unable to create QR code.')
            })
    })

    wa.on('close', () => {
        deleteSession(sessionId)
    })

    await wa.connect().catch((err) => {
        console.log('An error occured during connecting: ' + err)

        if (res && !res.headersSent) {
            return response(res, 500, false, 'Unable to create session.')
        }
    })
}

const triggerDeleteSession = (sessionId) => {
    if (sessions.has(sessionId)) {
        getSession(sessionId).close()
    }
}

const deleteSession = (sessionId) => {
    if (isCreatedSession(sessionId)) {
        fs.unlinkSync(path.join(__dirname, 'sessions', `${sessionId}.json`))
    }

    sessions.delete(sessionId)
}

const getChatList = (session, isGroup = false) => {
    const filter = isGroup ? '@g.us' : '@s.whatsapp.net'
    const { chats } = session.loadChats()

    return chats.reduce((carry, item) => {
        if (item.jid.endsWith(filter)) {
            if ('messages' in item) {
                delete item.messages
            }

            carry.push(item)
        }

        return carry
    }, [])
}

const formatPhone = (phone) => {
    if (phone.endsWith('@s.whatsapp.net')) {
        return phone
    }

    let formatted = phone.replace(/\D/g, '')

    return (formatted += '@s.whatsapp.net')
}

const formatGroup = (group) => {
    if (group.endsWith('@g.us')) {
        return group
    }

    let formatted = group.replace(/[^\d-]/g, '')

    return (formatted += '@g.us')
}

const init = () => {
    fs.readdir(path.join(__dirname, 'sessions'), (err, files) => {
        if (err) {
            throw err
        }

        files.forEach((file) => {
            if (file.endsWith('.json')) {
                createSession(file.replace('.json', ''))
            }
        })
    })
}

export {
    isCreatedSession,
    isSessionExists,
    getSession,
    createSession,
    triggerDeleteSession,
    getChatList,
    formatPhone,
    formatGroup,
    init,
}
