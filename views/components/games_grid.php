    <div class="gamesContainer" x-intersect.once="fetchGames(gamesUrl+'<?= $cond ?>')" x-data="{
        selectedGame:'',
    }">
        <template x-for="index in 10">
            <div class="shimmer" x-show="fetchingGames"></div>
        </template>
        <template x-for="game in games">
            <div class="game " x-show="!fetchingGames" @click='selectedGame=game'>
                <div class="gameImageContainer">
                    <img :src="game.background_image" :alt="game.name">
                </div>
                <h3 x-text="game.name"></h3>
                <span x-text="game.rating"></span>
            </div>
        </template>




        <div class="modal" x-show="selectedGame!=''" x-transition>
            <div class="clodeModal">
                <span class="iconify" data-icon="ep:circle-close"></span>
            </div>
            <img @click.outside="selectedGame=''" x-show="selectedGame!=''" x-transition.400 :src="selectedGame.background_image" :alt="selectedGame.name">
        </div>

    </div>