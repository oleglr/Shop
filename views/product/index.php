<h1>Каталог товаров</h1>
<? foreach ($products as $product): ?>
    <div class="product-item">
        <h2><a href="/product/view/<?=$product->id?>"><?=$product->name?></a></h2>
        <p><?=$product->description?></p>
        <p>Цена: <?=$product->price?></p>
    </div>
<? endforeach; ?>
