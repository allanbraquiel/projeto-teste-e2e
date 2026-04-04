import { expect, test } from '@playwright/test';
import { loginAsDefaultUser } from './helpers/auth';

async function criarPessoa(page, unique) {
  const nome = `Pessoa E2E ${unique}`;

  await page.goto('/pessoas');
  await page.getByRole('link', { name: /nova pessoa/i }).click();
  await page.locator('input[name="nome"]').fill(nome);
  await page.locator('input[name="cpf"]').fill(`${unique}`.slice(-11));
  await page.locator('input[name="email"]').fill(`pessoa${unique}@e2e.test`);
  await page.locator('input[name="telefone"]').fill('11999990000');
  await page.getByRole('button', { name: /salvar/i }).click();

  await expect(page).toHaveURL(/pessoas$/);
  return nome;
}

test.describe('CRUD basico de Pessoas', () => {
  test('deve cadastrar uma pessoa nova', async ({ page }) => {
    const unique = Date.now();

    await loginAsDefaultUser(page);
    const nome = await criarPessoa(page, unique);
    await expect(page.getByRole('cell', { name: nome })).toBeVisible();
  });

  test('deve editar uma pessoa existente', async ({ page }) => {
    const unique = Date.now();

    await loginAsDefaultUser(page);
    const nomeOriginal = await criarPessoa(page, unique);
    const nomeAtualizado = `${nomeOriginal} Atualizada`;

    const row = page.locator('tr', { hasText: nomeOriginal });
    await row.getByRole('link', { name: /editar/i }).click();

    await page.locator('input[name="nome"]').fill(nomeAtualizado);
    await page.getByRole('button', { name: /atualizar/i }).click();

    await expect(page).toHaveURL(/pessoas$/);
    await expect(page.getByRole('cell', { name: nomeAtualizado })).toBeVisible();
  });

  test('deve excluir uma pessoa existente', async ({ page }) => {
    const unique = Date.now();

    await loginAsDefaultUser(page);
    const nome = await criarPessoa(page, unique);

    const row = page.locator('tr', { hasText: nome });

    // Submete o form de exclusao diretamente para evitar dependencia de animacao/modal.
    await row.locator('form').first().evaluate((form) => form.submit());

    await expect(page).toHaveURL(/pessoas$/);
    await expect(page.getByRole('cell', { name: nome })).toHaveCount(0);
  });
});
