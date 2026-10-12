//
document.querySelectorAll('[data-copy]').forEach((button) => {
    const label = button.querySelector('[data-copy-label]');
    const originalLabel = label.textContent;

    button.addEventListener('click', async () => {
        try {
            await navigator.clipboard.writeText(button.dataset.copy);
            label.textContent = 'Copiado!';
        } catch (error) {
            console.error('Não foi possível copiar o comando.', error);
            label.textContent = 'Falha ao copiar';
        }

        window.setTimeout(() => {
            label.textContent = originalLabel;
        }, 2000);
    });
});
