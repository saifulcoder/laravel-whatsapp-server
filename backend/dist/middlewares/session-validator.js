"use strict";
Object.defineProperty(exports, "__esModule", { value: true });
const wa_1 = require("../wa");
const validate = (req, res, next) => {
    if (!(0, wa_1.sessionExists)(req.params.sessionId))
        return res.status(404).json({ error: 'Session not found' });
    next();
};
exports.default = validate;
