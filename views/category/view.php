<h1>Категория - </h1>
<? foreach ($products as $product): ?>
    <div class="item">
        <a href="/product/view/<?=$product->id?>"><img src="<?=$img[$product->id]?>" alt="<?=$product->name?>" title="<?=$product->name?>"></a>
        <h3 class="item-name"><a href="/product/view/<?=$product->id?>"><?=$product->name?></a></h3>
        <p class="price"><?=$product->price?>р.</p>
        <p class="add-to-basket"><a href="#" onclick="" title="Добавить в корзину">Купить</a></p>
    </div>
<? endforeach; ?>