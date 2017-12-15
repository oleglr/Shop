<h1>Каталог товаров</h1>
<? foreach ($products as $product): ?>
    <div class="product-item">
        <h2><a href="/product/view/<?=$product->id?>"><?=$product->name?></a></h2>
        <p><img src="<?=$img[$product->id]?>"></p>
        <p><?=$product->description?></p>
        <p>Цена: <?=$product->price?></p>
        <p>Дата создания:<?=$product->created_at?></p>
        <p>Дата изменения:<?=$product->updated_at?></p>
    </div>
<? endforeach; ?>
