<script>
    function homeData() {
        return {

            platforms: [],
            platformsUrl: "https://api.rawg.io/api/platforms?key=670bf506b22b48a5b87817f833b8fee6&page_size=10",
            fetchingPlatforms: false,
            genres: [],
            genresUrl: "https://api.rawg.io/api/genres?key=670bf506b22b48a5b87817f833b8fee6&page_size=10",
            fetchingGenres: false,

        }
    }
</script>


<div class="content" x-data="homeData()">
    <div class="hero" x-data="{
      heroNumber: 0,
     nextHero() {
                this.heroNumber++;
                if (this.heroNumber > 3) {
                    this.heroNumber = 0;
                }
            },
              init(){
                setInterval(() => {
                     this.nextHero();
                }, 2000);
                   
                
            }
     
}">
        <div @click="nextHero();">
            <span x-show="heroNumber==0" class="iconify" data-icon="akar-icons:game-controller"></span>
            <span x-show="heroNumber==1" class="iconify" data-icon="emojione:video-game"></span>
            <span x-show="heroNumber==2" class="iconify" data-icon="entypo:game-controller"></span>
            <span x-show="heroNumber==3" class="iconify" data-icon="emojione-v1:video-game"></span>
        </div>

        <h3 @click="heroNumber++;">
            <?= $this->websiteName ?>
        </h3>
    </div>

    <h3 class="title">
        <span class="iconify" data-icon="carbon:iot-platform"></span>
        Platforms
    </h3>
    <div class="shimmerContainer">
        <template x-for="index in 10">
            <div class="shimmer" x-show="fetchingPlatforms"></div>
        </template>
    </div>
    <section class="platformSplide splide" x-intersect.once="fetchPlatforms(platformsUrl)">
        <div class="splide__track">
            <ul class="splide__list">
                <template x-for="platform in platforms">
                    <li class="splide__slide platform">
                        <a :href="`platform.php?id=${platform.id}&mode=<?= $this->mode ?>`">
                            <div class="overlay shimmer"></div>
                            <img :src="platform.image_background" :alt="platform.name" />
                            <h3 x-text="platform.name"></h3>
                        </a>
                    </li>
                </template>
            </ul>
        </div>
    </section>

    <h3 class="title">
        <span class="iconify" data-icon="ion:shapes"></span>
        Geners
    </h3>
    <div class="shimmerContainer">
        <template x-for="index in 10">
            <div class="shimmer" x-show="fetchingPlatforms"></div>
        </template>
    </div>
    <section class="genresSplide splide" x-intersect.once="fetchGenres(genresUrl)">
        <div class="splide__track">
            <ul class="splide__list">

                <template x-for="gen in genres">
                    <li class="splide__slide genres">
                        <a :href="`genres.php?id=${gen.id}&mode=<?= $this->mode ?>`">
                            <div class="overlay shimmer"></div>
                            <img :src="gen.image_background" :alt="gen.name" />
                            <h3 x-text="gen.name"></h3>
                        </a>
                    </li>
                </template>
            </ul>
        </div>
    </section>
    <h3 class="title">
        <span class="iconify" data-icon="fluent:games-32-filled"></span>
        Games
    </h3>
    <?= $this->component("games_grid", ["cond" => ""]) ?>
</div>