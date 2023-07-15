export default function RedirectForm() {
    document.addEventListener('wpcf7mailsent', () => {
        const selectedState = document.querySelector('.uf');
        location = `http://vitaminaweb.local/recebemos-sua-mensagem?UF=${selectedState.dataset.uf}`;
    }, false);
}