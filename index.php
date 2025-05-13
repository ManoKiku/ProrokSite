<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Калькулятор Пророка</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" type="image/x-icon" href="resources/app.ico">
</head>
<body>
    <audio id="myAudio" hidden>
      <source src="resources/ahhh.mp3" type="audio/mpeg">
      Your browser does not support the audio element.
    </audio>

    <header>
        <nav>
            <a href="#about">О проекте</a>
            <a href="#screenshots">Скриншоты</a>
            <a href="#developers">Разработчики</a>
        </nav>
        <p alt="Логотип" class="logo">Калькулятор Пророка</p>
    </header>

    <main>
        <section id="hero">
            <img src="resources/Jesus.png" class="jesus">
            <h1 style="z-index: 1;" id="appName">Калькулятор Пророка</h1>
        </section>

        <section id="about">
            <h2>О проекте</h2>
            <p class="about-text">
              Проект "Калькулятор Пророка" — это десктоп-приложение для решения систем линейных уравнений методом Гаусса, разработанное на C++ с использованием фреймворка WinForms для интерфейса. Основная функция позволяет вводить коэффициенты системы в матричном виде, выполнять вычисления с пошаговой детализацией и сохранять результаты в текстовый файл. При первом запуске приложения предлагается пройти тест из 20 вопросов на знание Библии и христианских традиций. В зависимости от правильных ответов присваивается титул: от "Истинный христианин" (90–100 баллов) до "Безбожник" (0–29 баллов). Результаты теста отображаются в таблице лидеров, доступной через веб-сайт.  
              <br><br>
              Сайт проекта, реализованный на PHP с HTML и CSS, выполняет роль информационного портала и интерфейса для работы с данными пользователей. Он отображает онлайн свечи, предоставляет инструкции по использованию калькулятора и позволяет скачивать актуальную версию приложения. Дизайн сайта выдержан в христианской стилистике с использованием светлых градиентов, золотистых акцентов и тематических изображений.
              <br><br>
              Фоновое оформление приложения поддерживает смену тем: пользователь может выбрать из предустановленных вариантов (витражи, библейские пейзажи, цитаты из Писания). Дополнительная функция — встроенный аудиоплеер с христианскими гимнами для фонового прослушивания во время работы. Все пользовательские данные (история вычислений, результаты теста, настройки интерфейса) хранятся локально и синхронизируются с сервером через сайт при наличии аккаунта. 
              <br><br>
              Техническая инфраструктура включает:  
              - Десктоп-приложение на C++/WinForms для расчетов и работы с локальными файлами.  
              - Веб-сайт на PHP, отображающий статический контент и динамические элементы (таблица лидеров).  
              - Серверную часть с MySQL для хранения учетных записей (имена, свечи).
              - Минималистичный API на PHP для обработки запросов от приложения и сайта.  
              <br><br>
              Проект ориентирован на студентов и преподавателей, которые хотят совмещать математические расчеты с элементами христианской культуры, избегая сложных регистраций и избыточных функций. Развитие проекта планируется в направлении оптимизации алгоритмов, добавления новых тестовых вопросов и улучшения механизма синхронизации данных между десктоп-приложением и сайтом.
            </p>
        </section>

        <section id="screenshots">
            <h2>Скриншоты</h2>
            <div class="screenshots">
                <img src="resources/screenshots/1.png" alt="Скриншот 1" class="screenshot">
                <img src="resources/screenshots/1.png" alt="Скриншот 2" class="screenshot">
                <img src="resources/screenshots/1.png" alt="Скриншот 3" class="screenshot">
                <img src="resources/screenshots/1.png" alt="Скриншот 4" class="screenshot">
                <img src="resources/screenshots/1.png" alt="Скриншот 5" class="screenshot">
                <img src="resources/screenshots/1.png" alt="Скриншот 6" class="screenshot">
                <img src="resources/screenshots/1.png" alt="Скриншот 7" class="screenshot">
                <img src="resources/screenshots/1.png" alt="Скриншот 8" class="screenshot">
                <img src="resources/screenshots/1.png" alt="Скриншот 9" class="screenshot">
            </div>
        </section>

        <section id="developers">
            <h2>Команда разработчиков</h2>
            <div class="developers">
                <div class="developer">
                    <img src="resources/developers/ilia.jpg" alt="Разработчик 1">
                    <h3>Илья Пророк</h3>
                    <q>Пусть твой код, как молитва, будет чист, а логика — непоколебима, как вера. В каждом алгоритме ищи отражение Божественной гармонии чисел. Пусть каждая строка твоего кода будет светом истины в хаосе данных. Аминь. </q>
                </div>
                <div class="developer">
                  <img src="resources/developers/fre.webp" alt="Разработчик 2">
                  <h3>ФРЭ</h3>
                  <q>Да станут ваши схемы скрижалями Завета, антенны — жезлом Моисея, пробивающим эфирную пустыню. Паяльник — мечом, кующим истину в транзисторах и резисторах, а закон Ома — псалмом, воспевающим гармонию Творения. Аминь.</q>
              </div>
              <div class="developer">
                <img src="resources/developers/artemjpg.jpg" alt="Разработчик 3">
                <h3>Апостол Артемий</h3>
                <q>Да пребудут твои интерфейсы, как врата Небесные, а код — хвалебным псалмом, восходящим к престолу Творца. Волхв алгоритмов, чьи формулы — шепот серафимов. Паяльник твой да напишет на скрижалях PCB сакральную топологию, где каждый трек — путь к Истине. Аминь</q>
            </div>
            </div>
        </section>

        <section id="download">
            <a class="download-btn" href="https://github.com/ManoKiku">Скачать</a>
        </section>

        <section id="candle" style="padding: 0px; height: 400px; z-index: -1;">
            <img src="resources/candles-bg.png">
            <button class="design-btn" id="show-candle" style="z-index: 2;">Поставить свечку</button>
        </section>

        <section id="candles">
            <div class="candles-grid" id="candles-grid">
                <?php
                $api_url = 'http://' . $_SERVER['HTTP_HOST'] . '/api/get-candles.php';
                
                try {
                    $response = file_get_contents($api_url);
                    
                    if($response === false) {
                        throw new Exception('Failed to connect to the API');
                    }
                    
                    $data = json_decode($response, true);
                    
                    if(json_last_error() !== JSON_ERROR_NONE) {
                        throw new Exception('Invalid API response format');
                    }
                    
                    if($data['status'] !== 'success') {
                        echo '<div class="error-message">'.htmlspecialchars($data['message']).'</div>';
                    } else {
                        if(empty($data['records'])) {
                            echo '<div class="status-message">В храме ещё нет свечек</div>';
                        } else {
                          foreach($data['records'] as $record) {
                              echo '
                            <div class="candle-item">
                                <div class="candle-image">'.htmlspecialchars($record['caption']).'</div>
                                <p>'.htmlspecialchars($record['name']).'</p>
                            </div>';
                          }
                        }
                    }
                    
                } catch(Exception $e) {
                    echo '<div class="error-message">Error: '.htmlspecialchars($e->getMessage()).'</div>';
                }
                ?>
            </div>
        </section>

        <div class="modal hidden" id="modal-candle">
            <div class="modal-content">
                <span id="close-candle" class="close">×</span>
                <h1 style="color: white;margin: 0 auto 100px auto;text-align: center;">Установка онлайн свечи</h1>
                <input type="text" id="caption-input" class="design-input" placeholder="За что поставить свечку" maxlength="100">
                <input type="text" id="name-input" class="design-input" placeholder="Кому - Имя / Имена" maxlength="50">
                <button class="design-btn" id="send-candle" style="width: 40%;margin-left: auto;margin-right: auto;min-width: 250px;" >Установить</button>
                <p class="error-text" id="error-text">‎ </p>
            </div>
        </div>
    </main>

    <footer>
        <p>Copyright © 2025 Калькулятор Пророка</p>
        <div class="social-links">
            <a href="https://github.com/ManoKiku/ProrokSite">GitHub</a>
            <a href="https://t.me/ManoKiku">Telegram</a>
        </div>
    </footer>

    <script src="logic.js"></script>
</body>
</html>
