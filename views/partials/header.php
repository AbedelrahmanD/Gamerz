<?php
$changeModeUrl = "";
$anotherMode = $this->mode == "dark" ? "light" : "dark";
if ($_SERVER["QUERY_STRING"] == "") {
    $changeModeUrl = $_SERVER["REQUEST_URI"] . "?mode=$anotherMode";
} else {
    $changeModeUrl = $_SERVER["REQUEST_URI"] . "&mode=$anotherMode";
}
// var_dump($_SERVER);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $this->websiteName ?></title>
    <link rel="stylesheet" href="views/assets/css/colors_<?= $this->mode ?>.css">
    <link rel="stylesheet" href="views/assets/css/splide.min.css">
    <link rel="stylesheet" href="views/assets/css/shared.css?v=<?= $this->version ?>">
    <link rel="stylesheet" href="views/assets/css/nav.css?v=<?= $this->version ?>">
    <link rel="stylesheet" href="views/assets/css/footer.css?v=<?= $this->version ?>">
    <link rel="stylesheet" href="views/assets/css/platform.css?v=<?= $this->version ?>">
    <link rel="stylesheet" href="views/assets/css/genres.css?v=<?= $this->version ?>">
    <link rel="stylesheet" href="views/assets/css/game.css?v=<?= $this->version ?>">
    <link rel="stylesheet" href="views/assets/css/hero.css?v=<?= $this->version ?>">
    <script src="views/assets/js/alpine_intersect.min.js" defer></script>
    <script src="views/assets/js/alpine.js" defer></script>
    <script src="views/assets/js/iconify.min.js"></script>
    <script src="views/assets/js/splide.min.js"></script>
</head>

<script>
    function renderSlider(target) {
        new Splide(target, {
            type: 'slide', //loop,fade,slide
            rewind: true,
            perPage: 5,
            gap: '0.5rem',
            autoplay: true,
            pagination: false,
            breakpoints: {
                1024: {
                    perPage: 3,

                },
                767: {
                    perPage: 2,

                },

            },
        }).mount();
    }

    function sharedData() {
        return {
            search: '',
            games: [],
            gamesUrl: "https://api.rawg.io/api/games?key=670bf506b22b48a5b87817f833b8fee6",
            fetchingGames: false,
            async fetchPlatforms(url) {
                this.fetchingPlatforms = true;
                var response = await (await (fetch(url))).json();
                this.platforms = response.results;
                setTimeout(() => {
                    renderSlider(".platformSplide");
                    this.fetchingPlatforms = false;
                }, 100);
            },
            async fetchGenres(url) {
                this.fetchingGenres = true;
                var response = await (await (fetch(url))).json();
                this.genres = response.results;
                setTimeout(() => {
                    renderSlider(".genresSplide");
                    this.fetchingGenres = false;
                }, 100);
            },
            async fetchGames(url) {
                this.fetchingGames = true;
                var response = await (await (fetch(url))).json();
                this.games = response.results;
                this.fetchingGames = false;
            },


        }
    }
</script>

<body x-data="sharedData()">

    <nav>
        <div class="navContainer">
            <a href="home.php?mode=<?= $this->mode ?>" class="logo">
                <span class="iconify" data-icon="akar-icons:game-controller"></span>
            </a>
            <form action="search.php" class="navSearch" @submit="search=='' && event.preventDefault()">
                <input x-ref="search" x-model="search" autocomplete="off" type="text" name="search" placeholder="Search...">
                <button>
                    <span class="iconify" data-icon="bytesize:search"></span>
                </button>
            </form>
            <div class="navMenu">
                <a href="<?= $changeModeUrl ?>">
                    <?php if ($this->mode == "dark") : ?>
                        <span class=" iconify" data-icon="carbon:light-filled"></span>
                    <?php else : ?>
                        <span class="iconify" data-icon="clarity:moon-solid"></span>
                    <?php endif; ?>
                </a>
                <!-- <a href="#" class="menuTitle">Platforms</a>
                <a href="#" class="menuTitle">Games</a> -->
            </div>
        </div>

    </nav>