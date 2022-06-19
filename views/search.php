<div>

    <div class="banner" style="background-image: url('views/assets/images/search.png');">
        <h3><?= $this->search ?></h3>
    </div>
    <?php $this->component("games_grid", ["cond" => "&search=$this->search"]); ?>
</div>