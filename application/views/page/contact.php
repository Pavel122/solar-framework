<?php $this->title = 'Контакты'; ?>
<script type="text/javascript">
    $(document).ready(function () {
        $('#send').click(function () {
            let
                content = $('#text').val(),
                mail = $('#email').val();

            console.log(mail + '   ' + content);

            if (!mail || !content) {
                $('#error-body').text('Чтобы отправить письмо в тех. поддержку необходимо заполнить все поля! Пожалуйста, сделайте это!');
                $('#error-title').text('Заполните все поля!');
            } else {
                $('#error-body').text('Письмо успешно отправлено! Вы получите ответ на него в ближайшие 2 дня.');
                $('#error-title').text('Письмо отправлено!');
            }
        });
    });
</script>

<form method="POST" role="form">
    <div class="form-group" id="mail">
        <label for="email">Email:</label>
        <input id="email" type="email" class="form-control" style="width: 50%;" placeholder="examle@mail.ru" />
    </div>
    <div class="form-group" id="content">
        <label for="text">Письмо:</label>
        <textarea id="text" class="form-control" style="width: 78%; height: 17vh; resize: none"></textarea>
    </div>
    <button class="btn btn-success" id="send" type="button" data-target="#error" data-toggle="modal">Отправить письмо</button>
</form>