<h2>Карточка товара</h2>
<div class="product-item">
    <h2><?=$product->name?></h2>
    <div class="small-img">
        <? foreach ($images as $img): ?>
            <a href="<?=$img->big?>" target="_blank"><img src="<?=$img->small?>"></a>
        <? endforeach; ?>
    </div>
    <p><?=$product->description?></p>
    <p>Цена: <?=$product->price?></p>
    <p>Дата создания:<?=$product->created_at?></p>
    <p>Дата изменения:<?=$product->updated_at?></p>
</div>
