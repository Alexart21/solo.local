<div id="result">&nbsp;</div>
<h1 style="display: inline">Режим contenteditable</h1> &nbsp;&nbsp;&nbsp;<b style="font-size: 120%;color:blue"><a
        href="/admin/content/update?id=<?= $model['id'] ?>">Назад в редактор</a></b>
<h2>Страница <?= $model['page'] ?></h2>
<div class="contenteditable" contenteditable="true">
    <?= $model['content'] ?>
</div>
<button id="edit_but" class="but_gr">Отправить</button>
<script>
    $('#edit_but').on('click', function () {
        var content = {
            content: $('.contenteditable').html()
        };
        form_call(content, <?= $model['id'] ?>);
    });
</script>