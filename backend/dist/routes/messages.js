"use strict";
var __createBinding = (this && this.__createBinding) || (Object.create ? (function(o, m, k, k2) {
    if (k2 === undefined) k2 = k;
    var desc = Object.getOwnPropertyDescriptor(m, k);
    if (!desc || ("get" in desc ? !m.__esModule : desc.writable || desc.configurable)) {
      desc = { enumerable: true, get: function() { return m[k]; } };
    }
    Object.defineProperty(o, k2, desc);
}) : (function(o, m, k, k2) {
    if (k2 === undefined) k2 = k;
    o[k2] = m[k];
}));
var __setModuleDefault = (this && this.__setModuleDefault) || (Object.create ? (function(o, v) {
    Object.defineProperty(o, "default", { enumerable: true, value: v });
}) : function(o, v) {
    o["default"] = v;
});
var __importStar = (this && this.__importStar) || function (mod) {
    if (mod && mod.__esModule) return mod;
    var result = {};
    if (mod != null) for (var k in mod) if (k !== "default" && Object.prototype.hasOwnProperty.call(mod, k)) __createBinding(result, mod, k);
    __setModuleDefault(result, mod);
    return result;
};
var __importDefault = (this && this.__importDefault) || function (mod) {
    return (mod && mod.__esModule) ? mod : { "default": mod };
};
Object.defineProperty(exports, "__esModule", { value: true });
const express_1 = require("express");
const express_validator_1 = require("express-validator");
const controller = __importStar(require("../controllers/message"));
const request_validator_1 = __importDefault(require("../middlewares/request-validator"));
const session_validator_1 = __importDefault(require("../middlewares/session-validator"));
const router = (0, express_1.Router)({ mergeParams: true });
router.get('/', (0, express_validator_1.query)('cursor').isNumeric().optional(), (0, express_validator_1.query)('limit').isNumeric().optional(), request_validator_1.default, controller.list);
router.post('/send', (0, express_validator_1.body)('jid').isString().notEmpty(), (0, express_validator_1.body)('type').isString().isIn(['group', 'number']).optional(), (0, express_validator_1.body)('message').isObject().notEmpty(), (0, express_validator_1.body)('options').isObject().optional(), request_validator_1.default, session_validator_1.default, controller.send);
router.post('/send/bulk', (0, express_validator_1.body)().isArray().notEmpty(), request_validator_1.default, session_validator_1.default, controller.sendBulk);
router.post('/download', (0, express_validator_1.body)().isObject().notEmpty(), request_validator_1.default, session_validator_1.default, controller.download);
exports.default = router;
