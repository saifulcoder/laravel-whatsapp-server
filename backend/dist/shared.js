"use strict";
var __importDefault = (this && this.__importDefault) || function (mod) {
    return (mod && mod.__esModule) ? mod : { "default": mod };
};
Object.defineProperty(exports, "__esModule", { value: true });
exports.logger = exports.prisma = void 0;
const client_1 = require("@prisma/client");
const pino_1 = __importDefault(require("pino"));
exports.prisma = new client_1.PrismaClient();
exports.logger = (0, pino_1.default)({ level: process.env.LOG_LEVEL || 'debug' });
