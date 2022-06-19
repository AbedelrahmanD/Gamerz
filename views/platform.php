<div x-data="{
    platformIdUrl:'https://api.rawg.io/api/platforms/<?= $this->platformId ?>?key=670bf506b22b48a5b87817f833b8fee6',
    platformInfo:{},
    isLoading:false,
    async init(){
       this.isLoading=true;
       this.platformInfo= await (await fetch(this.platformIdUrl)).json();
       this.isLoading=false;
    }
    
}">
    <div class="banner shimmer" x-show="isLoading"></div>
    <div class="banner" x-show="!isLoading" :style="`background-image:url(${platformInfo.image_background})`">
        <h3 x-text="platformInfo.name"></h3>
    </div>
    <?php $this->component("games_grid", ["cond" => "&platforms=$this->platformId"]); ?>
</div>