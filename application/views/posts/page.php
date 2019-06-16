<div class="categories">
    <ol class="breadcrumb">
        <li><a href="/">Главная</a></li>
        <?php
        foreach ($categories as $cat)
            echo "<li><a href='/category/{$cat['alias']}'>{$cat['title']}</a></li>";
        ?>
        <li class="active"><a href=""><?=$post['title']?></a></li>
    </ol>
</div>

<h2 style="margin-top: 5px;"><?=$post['title']?></h2>

<p id="post-menu">
    <ul>
        <li style="display: inline; margin-right: 20px;">Автор: <?=$post['author']?></li>
        <li style="display: inline">Дата публикации: <?=date('d-m-Y H:i', $post['datetime'])?></li>
        <li class="dropdown" style="float: right; display: inline">
            <a href="" class="dropdown-toggle btn btn-info" data-toggle="dropdown">Действия <b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li><a href="/delete/posts/<?=$id?>">Удалить</a></li>
                <li><a href="/posts/appreciate/<?=$id?>">Оценить</a></li>
                <li><a href="/posts/edit/<?=$id?>">Редактировать</a></li>
            </ul>
        </li>
    </ul>
</p>

<?=$post['content']?>