<?php
$this->pageTitle('Главная | miniMVC');
?>
        <main>
            <div class="container">
                <div class="starter-template">
                    <h1>Добро пожаловать в miniMVC!</h1>
                    <br>
                    <p>
                        Это главная страница сайта. Для изменения данной страницы, 
                        отредактируйте файл <code>/minimvc/views/home.php</code>
                    </p>
                    <p>
                        Чтобы добавить новую страницу, создайте новый метод (action) в 
                        контроллере страниц (PageCtrl), который находится в 
                        <code>/minimvc/controllers/PageCtrl.php</code>. 
                    </p>
                    <p>Например, следующий метод</p>
                    <pre>
public function actionAbout() {
    $this->view->renderPage('about', 'default');
}                    </pre>
                    <p>
                        при запросе <code>/page/about</code> выдаст страницу, собранную 
                        из вида <code>views/about.php</code> и шаблона по умолчанию 
                        <code>views/layouts/default.php</code>.
                    </p>
                </div>
            </div>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        </main>

