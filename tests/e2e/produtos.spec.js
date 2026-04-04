import { expect, test } from '@playwright/test';
import { loginAsDefaultUser } from './helpers/auth';

async function criarProduto(page, unique) {
  const nome = `Produto E2E ${unique}`;

  await page.goto('/produtos');
  await page.getByRole('link', { name: /novo produto/i }).click();
  await page.locator('input[name="nome"]').fill(nome);
  await page.locator('input[name="preco"]').fill('99.90');
  await page.locator('input[name="estoque"]').fill('20');
  await page.locator('textarea[name="descricao"]').fill('Produto criado em teste E2E com Playwright');
  await page.getByRole('button', { name: /salvar/i }).click();

  await expect(page).toHaveURL(/produtos$/);
  return nome;
}

test.describe('CRUD basico de Produtos', () => {
  test('deve cadastrar um produto novo', async ({ page }) => {
    const unique = Date.now();

    await loginAsDefaultUser(page);
    const nome = await criarProduto(page, unique);
    await expect(page.getByRole('cell', { name: nome })).toBeVisible();
  });

  test('deve editar um produto existente', async ({ page }) => {
    const unique = Date.now();

    await loginAsDefaultUser(page);
    const nomeOriginal = await criarProduto(page, unique);
    const nomeAtualizado = `${nomeOriginal} Atualizado`;

    const row = page.locator('tr', { hasText: nomeOriginal });
    await row.getByRole('link', { name: /editar/i }).click();

    await page.locator('input[name="nome"]').fill(nomeAtualizado);
    await page.getByRole('button', { name: /atualizar/i }).click();

    await expect(page).toHaveURL(/produtos$/);
    await expect(page.getByRole('cell', { name: nomeAtualizado })).toBeVisible();
  });

  test('deve excluir um produto existente', async ({ page }) => {
    const unique = Date.now();

    await loginAsDefaultUser(page);
    const nome = await criarProduto(page, unique);

    const row = page.locator('tr', { hasText: nome });

    // Submete o form de exclusao diretamente para evitar dependencia de animacao/modal.
    await row.locator('form').first().evaluate((form) => form.submit());

    await expect(page).toHaveURL(/produtos$/);
    await expect(page.getByRole('cell', { name: nome })).toHaveCount(0);
  });
});
