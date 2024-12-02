document.addEventListener('DOMContentLoaded', () => {
    const pokemons = {
        0: 'Salamèche',
        1: 'Carapuce',
        2: 'Bulbizarre',
        3: 'Pikachu'
    };

    const pokemon1Select = document.getElementById('pokemon1');
    const pokemon2Select = document.getElementById('pokemon2');

    const createPokemonPreview = (selectElement, previewId) => {
        const preview = document.createElement('img');
        preview.id = previewId;
        preview.style.width = '100px';
        preview.style.height = 'auto';
        preview.style.marginLeft = '10px';

        const selectedPokemon = pokemons[selectElement.value];
        preview.src = `style/img/pokemons/${selectedPokemon}.png`;

        selectElement.parentElement.appendChild(preview);

        selectElement.addEventListener('change', () => {
            const selectedPokemon = pokemons[selectElement.value];
            preview.src = `style/img/pokemons/${selectedPokemon}.png`;
        });
    };

    createPokemonPreview(pokemon1Select, 'pokemon1-preview');
    createPokemonPreview(pokemon2Select, 'pokemon2-preview');
});
