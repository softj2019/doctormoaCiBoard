<div class="new-dt clearfix">
    <h2>많이 찾는 병원</h2>
    <ul class="dt-ul">
    <?php
    // parse to php object
    $data_object = json_decode($view["board"]["extravars"],true);

    if (element('latest', $view)) {
        foreach (element('latest', $view) as $key => $value) {
        ?>
        <li>
            <a href="">
                <div class="dt-img" style="background-image: url(<?php echo element('thumb_url', $value); ?>);"></div>
                <div class="dt-txt flexwrap">
                    <p class="dt-tit">
                        <?php if(element('category', $value)){?> [<?php echo html_escape(element('bca_value',element('category', $value))); ?>]<?php } ?>
                        <span><?php echo element('store_name',element('extravars', $value)); ?></span></p>
                    <div class="star-i flexcenter">
                        <i class="ri-star-fill yell"></i><i class="ri-star-fill yell"></i><i class="ri-star-fill yell"></i><i class="ri-star-half-fill yell"></i><i class="ri-star-line yell"></i><p class="rev-s">5.0 <span>(리뷰 10)</span></p>
                    </div>
                </div>
            </a>
        </li>

    <?php
        }
    }
    ?>
    </ul>
</div>
