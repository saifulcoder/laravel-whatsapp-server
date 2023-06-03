import { PrismaClient } from '@prisma/client';
import pino from 'pino';

export const prisma = new PrismaClient();
export const logger = pino({ level: process.env.LOG_LEVEL || 'debug' });
