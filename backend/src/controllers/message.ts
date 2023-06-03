import type { proto } from '@adiwajshing/baileys';
import { serializePrisma } from '@ookamiiixd/baileys-store';
import type { RequestHandler } from 'express';
import { logger, prisma } from '../shared';
import { delay as delayMs } from '../utils';
import { getSession, jidExists } from '../wa';

export const list: RequestHandler = async (req, res) => {
  try {
    const { sessionId } = req.params;
    const { cursor = undefined, limit = 25 } = req.query;
    const messages = (
      await prisma.message.findMany({
        cursor: cursor ? { pkId: Number(cursor) } : undefined,
        take: Number(limit),
        skip: cursor ? 1 : 0,
        where: { sessionId },
      })
    ).map((m) => serializePrisma(m));

    res.status(200).json({
      data: messages,
      cursor:
        messages.length !== 0 && messages.length === Number(limit)
          ? messages[messages.length - 1].pkId
          : null,
    });
  } catch (e) {
    const message = 'An error occured during message list';
    logger.error(e, message);
    res.status(500).json({ error: message });
  }
};

export const send: RequestHandler = async (req, res) => {
  try {
    const { jid, type = 'number', message, options } = req.body;
    const session = getSession(req.params.sessionId)!;

    const exists = await jidExists(session, jid, type);
    if (!exists) return res.status(400).json({ error: 'JID does not exists' });

    const result = await session.sendMessage(jid, message, options);
    res.status(200).json(result);
  } catch (e) {
    const message = 'An error occured during message send';
    logger.error(e, message);
    res.status(500).json({ error: message });
  }
};

export const sendBulk: RequestHandler = async (req, res) => {
  const session = getSession(req.params.sessionId)!;
  const results: { index: number; result: proto.WebMessageInfo | undefined }[] = [];
  const errors: { index: number; error: string }[] = [];

  for (const [
    index,
    { jid, type = 'number', delay = 1000, message, options },
  ] of req.body.entries()) {
    try {
      const exists = await jidExists(session, jid, type);
      if (!exists) {
        errors.push({ index, error: 'JID does not exists' });
        continue;
      }

      if (index > 0) await delayMs(delay);
      const result = await session.sendMessage(jid, message, options);
      results.push({ index, result });
    } catch (e) {
      const message = 'An error occured during message send';
      logger.error(e, message);
      errors.push({ index, error: message });
    }
  }

  res
    .status(req.body.length !== 0 && errors.length === req.body.length ? 500 : 200)
    .json({ results, errors });
};
