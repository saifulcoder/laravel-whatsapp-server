"use strict";
var __importDefault = (this && this.__importDefault) || function (mod) {
    return (mod && mod.__esModule) ? mod : { "default": mod };
};
Object.defineProperty(exports, "__esModule", { value: true });
const express_1 = require("express");
const chats_1 = __importDefault(require("./chats"));
const contacts_1 = __importDefault(require("./contacts"));
const groups_1 = __importDefault(require("./groups"));
const messages_1 = __importDefault(require("./messages"));
const sessions_1 = __importDefault(require("./sessions"));
const router = (0, express_1.Router)();
router.use('/sessions', sessions_1.default);
router.use('/:sessionId/chats', chats_1.default);
router.use('/:sessionId/contacts', contacts_1.default);
router.use('/:sessionId/groups', groups_1.default);
router.use('/:sessionId/messages', messages_1.default);
exports.default = router;
