import { expect, test } from '@playwright/test';
import { loginAsDefaultUser } from './helpers/auth';

test.describe('Autenticacao', () => {
  test('deve redirecionar usuario anonimo para login', async ({ page }) => {
    await page.goto('/dashboard');
    await expect(page).toHaveURL(/login/);
  });

  test('deve autenticar com usuario de seed', async ({ page }) => {
    await loginAsDefaultUser(page);
    await expect(page.getByRole('heading', { name: 'Dashboard' })).toBeVisible();
  });
});
