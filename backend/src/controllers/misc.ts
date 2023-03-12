import type { RequestHandler } from 'express';
import { logger } from '../shared';
import { getSession, jidExists } from '../wa';

export const makePhotoURLHandler =
  (type: 'number' | 'group' = 'number'): RequestHandler =>
  async (req, res) => {
    try {
      const { sessionId, jid } = req.params;
      const session = getSession(sessionId)!;

      const exists = await jidExists(session, jid, type);
      if (!exists) return res.status(400).json({ error: 'Jid does not exists' });

      const url = await session.profilePictureUrl(jid, 'image');
      res.status(200).json({ url });
    } catch (e) {
      const message = 'An error occured during photo fetch';
      logger.error(e, message);
      res.status(500).json({ error: message });
    }
  };
