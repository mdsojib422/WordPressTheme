<div class="hero__search__form">
    <form action="<?php echo home_url('/prdsr')?>" method="get">
        <div class="hero__search__categories">
            <?php esc_html_e("All departments", "ysorganic") ?>
            <span class="arrow_carrot-down"></span>
        </div>
        <input type="text" name="pd_search" placeholder="What do yo u need?">
        <button type="submit" class="site-btn">SEARCH</button>
    </form>
</div>