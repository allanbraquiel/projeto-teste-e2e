import { expect } from '@playwright/test';

export async function loginAsDefaultUser(page) {
  const email = process.env.E2E_EMAIL || 'test@example.com';
  const password = process.env.E2E_PASSWORD || 'password';

  await page.goto('/login');
  await page.getByLabel('Email').fill(email);
  await page.getByLabel('Password').fill(password);
  await page.getByRole('button', { name: /log in/i }).click();

  await expect(page).toHaveURL(/dashboard/);
}
