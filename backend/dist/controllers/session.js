"use strict";
var __rest = (this && this.__rest) || function (s, e) {
    var t = {};
    for (var p in s) if (Object.prototype.hasOwnProperty.call(s, p) && e.indexOf(p) < 0)
        t[p] = s[p];
    if (s != null && typeof Object.getOwnPropertySymbols === "function")
        for (var i = 0, p = Object.getOwnPropertySymbols(s); i < p.length; i++) {
            if (e.indexOf(p[i]) < 0 && Object.prototype.propertyIsEnumerable.call(s, p[i]))
                t[p[i]] = s[p[i]];
        }
    return t;
};
Object.defineProperty(exports, "__esModule", { value: true });
exports.del = exports.addSSE = exports.add = exports.status = exports.find = exports.list = void 0;
const wa_1 = require("../wa");
const list = (req, res) => {
    res.status(200).json((0, wa_1.listSessions)());
};
exports.list = list;
const find = (req, res) => res.status(200).json({ message: 'Session found' });
exports.find = find;
const status = (req, res) => {
    const session = (0, wa_1.getSession)(req.params.sessionId);
    res.status(200).json({ status: (0, wa_1.getSessionStatus)(session) });
};
exports.status = status;
const add = async (req, res) => {
    const _a = req.body, { sessionId, readIncomingMessages } = _a, socketConfig = __rest(_a, ["sessionId", "readIncomingMessages"]);
    if ((0, wa_1.sessionExists)(sessionId))
        return res.status(400).json({ error: 'Session already exists' });
    (0, wa_1.createSession)({ sessionId, res, readIncomingMessages, socketConfig });
};
exports.add = add;
const addSSE = async (req, res) => {
    const { sessionId } = req.params;
    res.writeHead(200, {
        'Content-Type': 'text/event-stream',
        'Cache-Control': 'no-cache',
        Connection: 'keep-alive',
    });
    if ((0, wa_1.sessionExists)(sessionId)) {
        res.write(`data: ${JSON.stringify({ error: 'Session already exists' })}\n\n`);
        res.end();
        return;
    }
    (0, wa_1.createSession)({ sessionId, res, SSE: true });
};
exports.addSSE = addSSE;
const del = async (req, res) => {
    await (0, wa_1.deleteSession)(req.params.sessionId);
    res.status(200).json({ message: 'Session deleted' });
};
exports.del = del;
