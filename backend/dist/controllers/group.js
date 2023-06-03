"use strict";
Object.defineProperty(exports, "__esModule", { value: true });
exports.photo = exports.find = exports.list = void 0;
const shared_1 = require("../shared");
const wa_1 = require("../wa");
const misc_1 = require("./misc");
const list = async (req, res) => {
    try {
        const { sessionId } = req.params;
        const { cursor = undefined, limit = 25 } = req.query;
        const groups = await shared_1.prisma.contact.findMany({
            cursor: cursor ? { pkId: Number(cursor) } : undefined,
            take: Number(limit),
            skip: cursor ? 1 : 0,
            where: { id: { endsWith: 'g.us' }, sessionId },
        });
        res.status(200).json({
            data: groups,
            cursor: groups.length !== 0 && groups.length === Number(limit)
                ? groups[groups.length - 1].pkId
                : null,
        });
    }
    catch (e) {
        const message = 'An error occured during group list';
        shared_1.logger.error(e, message);
        res.status(500).json({ error: message });
    }
};
exports.list = list;
const find = async (req, res) => {
    try {
        const { sessionId, jid } = req.params;
        const session = (0, wa_1.getSession)(sessionId);
        const data = await session.groupMetadata(jid);
        res.status(200).json(data);
    }
    catch (e) {
        const message = 'An error occured during group metadata fetch';
        shared_1.logger.error(e, message);
        res.status(500).json({ error: message });
    }
};
exports.find = find;
exports.photo = (0, misc_1.makePhotoURLHandler)('group');
