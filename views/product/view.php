<div class="item-content">
    <? if(!$product){die("Ошибка 404");} ?>
    <h2><?=$product->name?></h2>
    <div class="images-item">
        <div class="img-big">
            <img src="<?=$images[0]->big?>">
        </div>
        <div class="small-img">
            <? foreach ($images as $img): ?>
                <a href="<?=$img->big?>" target="_blank"><img src="<?=$img->small?>"></a>
            <? endforeach; ?>
        </div>
    </div>
    <div class="item_desc">
        <h3>Описание товара:</h3>
        <div class="short">
            <p><?=$product->description?></p>
        </div>
        <div class="o-pay">
            <p class="price"><?=$product->price?>р.</p>
            <p class="add-to-basket"><a href="#" title="Добавить в корзину">Купить</a></p>
        </div>
    </div>
</div>

