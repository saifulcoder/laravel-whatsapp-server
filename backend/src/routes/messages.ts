import { Router } from 'express';
import { body, query } from 'express-validator';
import * as controller from '../controllers/message';
import requestValidator from '../middlewares/request-validator';
import sessionValidator from '../middlewares/session-validator';

const router = Router({ mergeParams: true });
router.get(
  '/',
  query('cursor').isNumeric().optional(),
  query('limit').isNumeric().optional(),
  requestValidator,
  controller.list
);
router.post(
  '/send',
  body('jid').isString().notEmpty(),
  body('type').isString().isIn(['group', 'number']).optional(),
  body('message').isObject().notEmpty(),
  body('options').isObject().optional(),
  requestValidator,
  sessionValidator,
  controller.send
);
router.post(
  '/send/bulk',
  body().isArray().notEmpty(),
  requestValidator,
  sessionValidator,
  controller.sendBulk
);
router.post(
  '/download',
  body().isObject().notEmpty(),
  requestValidator,
  sessionValidator,
  controller.download
);

export default router;
