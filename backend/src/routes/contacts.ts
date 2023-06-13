import { Router } from 'express';
import { body, query } from 'express-validator';
import * as controller from '../controllers/contact';
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
router.get('/blocklist', sessionValidator, controller.listBlocked);
router.post(
  '/blocklist/update',
  body('jid').isString().notEmpty(),
  body('action').isString().isIn(['block', 'unblock']).optional(),
  requestValidator,
  sessionValidator,
  controller.updateBlock
);
router.get('/:jid', sessionValidator, controller.check);
router.get('/:jid/photo', sessionValidator, controller.photo);

export default router;
