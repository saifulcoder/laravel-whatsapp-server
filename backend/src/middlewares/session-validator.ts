import type { RequestHandler } from 'express';
import { sessionExists } from '../wa';

const validate: RequestHandler = (req, res, next) => {
  if (!sessionExists(req.params.sessionId))
    return res.status(404).json({ error: 'Session not found' });
  next();
};

export default validate;
