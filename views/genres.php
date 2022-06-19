<div x-data="{
    genresIdUrl:'https://api.rawg.io/api/genres/<?= $this->genresId ?>?key=670bf506b22b48a5b87817f833b8fee6',
    genresInfo:{},
    isLoading:false,
    async init(){
       this.isLoading=true;
       this.genresInfo= await (await fetch(this.genresIdUrl)).json();
       this.isLoading=false;
    }
    
}">
    <div class="banner" x-show="!isLoading" :style="`background-image:url(${genresInfo.image_background})`">
        <h3 x-text="genresInfo.name"></h3>
    </div>
    <?php $this->component("games_grid", ["cond" => "&genres=$this->genresId"]); ?>
</div>