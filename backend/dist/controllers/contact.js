"use strict";
Object.defineProperty(exports, "__esModule", { value: true });
exports.photo = exports.check = exports.updateBlock = exports.listBlocked = exports.list = void 0;
const shared_1 = require("../shared");
const wa_1 = require("../wa");
const misc_1 = require("./misc");
const list = async (req, res) => {
    try {
        const { sessionId } = req.params;
        const { cursor = undefined, limit = 25 } = req.query;
        const contacts = await shared_1.prisma.contact.findMany({
            cursor: cursor ? { pkId: Number(cursor) } : undefined,
            take: Number(limit),
            skip: cursor ? 1 : 0,
            where: { id: { endsWith: 's.whatsapp.net' }, sessionId },
        });
        res.status(200).json({
            data: contacts,
            cursor: contacts.length !== 0 && contacts.length === Number(limit)
                ? contacts[contacts.length - 1].pkId
                : null,
        });
    }
    catch (e) {
        const message = 'An error occured during contact list';
        shared_1.logger.error(e, message);
        res.status(500).json({ error: message });
    }
};
exports.list = list;
const listBlocked = async (req, res) => {
    try {
        const session = (0, wa_1.getSession)(req.params.sessionId);
        const data = await session.fetchBlocklist();
        res.status(200).json(data);
    }
    catch (e) {
        const message = 'An error occured during blocklist fetch';
        shared_1.logger.error(e, message);
        res.status(500).json({ error: message });
    }
};
exports.listBlocked = listBlocked;
const updateBlock = async (req, res) => {
    try {
        const session = (0, wa_1.getSession)(req.params.sessionId);
        const { jid, action = 'block' } = req.body;
        const exists = await (0, wa_1.jidExists)(session, jid);
        if (!exists)
            return res.status(400).json({ error: 'Jid does not exists' });
        await session.updateBlockStatus(jid, action);
        res.status(200).json({ message: `Contact ${action}ed` });
    }
    catch (e) {
        const message = 'An error occured during blocklist update';
        shared_1.logger.error(e, message);
        res.status(500).json({ error: message });
    }
};
exports.updateBlock = updateBlock;
const check = async (req, res) => {
    try {
        const { sessionId, jid } = req.params;
        const session = (0, wa_1.getSession)(sessionId);
        const exists = await (0, wa_1.jidExists)(session, jid);
        res.status(200).json({ exists });
    }
    catch (e) {
        const message = 'An error occured during jid check';
        shared_1.logger.error(e, message);
        res.status(500).json({ error: message });
    }
};
exports.check = check;
exports.photo = (0, misc_1.makePhotoURLHandler)();
