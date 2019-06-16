<?php
    if (isset($posts)) {
        $i = 0;
        foreach ($posts as $post) {
            $i++;

            if ($i > 4) break;
?>
    <div class="panel panel-default">
        <div class="panel-heading"><?=$post['title']?></div>
        <div class="panel-body">
            <?=$post['content']?>
        </div>
        <blockquote class="right-href">
        <a href="/posts/<?=$post['id']?>" class="btn btn-default">Подробнее &raquo;</a>
        </blockquote>
    </div>
<?php
        }
    }
?>