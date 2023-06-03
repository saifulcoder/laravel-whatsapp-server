"use strict";
Object.defineProperty(exports, "__esModule", { value: true });
exports.makePhotoURLHandler = void 0;
const shared_1 = require("../shared");
const wa_1 = require("../wa");
const makePhotoURLHandler = (type = 'number') => async (req, res) => {
    try {
        const { sessionId, jid } = req.params;
        const session = (0, wa_1.getSession)(sessionId);
        const exists = await (0, wa_1.jidExists)(session, jid, type);
        if (!exists)
            return res.status(400).json({ error: 'Jid does not exists' });
        const url = await session.profilePictureUrl(jid, 'image');
        res.status(200).json({ url });
    }
    catch (e) {
        const message = 'An error occured during photo fetch';
        shared_1.logger.error(e, message);
        res.status(500).json({ error: message });
    }
};
exports.makePhotoURLHandler = makePhotoURLHandler;
