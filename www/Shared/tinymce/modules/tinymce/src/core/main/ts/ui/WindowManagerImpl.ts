import { WindowManagerImpl } from '../api/WindowManager';

export default (): WindowManagerImpl => {
  const unimplemented = (): never => {
    throw new Error('Themes did not provide a WindowManager implementation.');
  };

  return {
    open: unimplemented,
    openUrl: unimplemented,
    alert: unimplemented,
    confirm: unimplemented,
    close: unimplemented
  };
};
