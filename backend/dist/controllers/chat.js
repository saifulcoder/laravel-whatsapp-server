"use strict";
Object.defineProperty(exports, "__esModule", { value: true });
exports.find = exports.list = void 0;
const baileys_store_1 = require("@ookamiiixd/baileys-store");
const shared_1 = require("../shared");
const list = async (req, res) => {
    try {
        const { sessionId } = req.params;
        const { cursor = undefined, limit = 25 } = req.query;
        const chats = (await shared_1.prisma.chat.findMany({
            cursor: cursor ? { pkId: Number(cursor) } : undefined,
            take: Number(limit),
            skip: cursor ? 1 : 0,
            where: { sessionId },
        })).map((c) => (0, baileys_store_1.serializePrisma)(c));
        res.status(200).json({
            data: chats,
            cursor: chats.length !== 0 && chats.length === Number(limit) ? chats[chats.length - 1].pkId : null,
        });
    }
    catch (e) {
        const message = 'An error occured during chat list';
        shared_1.logger.error(e, message);
        res.status(500).json({ error: message });
    }
};
exports.list = list;
const find = async (req, res) => {
    try {
        const { sessionId, jid } = req.params;
        const { cursor = undefined, limit = 25 } = req.query;
        const messages = (await shared_1.prisma.message.findMany({
            cursor: cursor ? { pkId: Number(cursor) } : undefined,
            take: Number(limit),
            skip: cursor ? 1 : 0,
            where: { sessionId, remoteJid: jid },
            orderBy: { messageTimestamp: 'desc' },
        })).map((m) => (0, baileys_store_1.serializePrisma)(m));
        res.status(200).json({
            data: messages,
            cursor: messages.length !== 0 && messages.length === Number(limit)
                ? messages[messages.length - 1].pkId
                : null,
        });
    }
    catch (e) {
        const message = 'An error occured during chat find';
        shared_1.logger.error(e, message);
        res.status(500).json({ error: message });
    }
};
exports.find = find;
