<?php
get_header();
$estates = Estates::getAllEstates();
?>
<main>
    <div class="container">
        <div class="jumbotron p-4 p-md-5 text-white rounded bg-dark">
            <div class="col-md-6 px-0">
                <h1 class="display-4 font-italic">Front Page title</h1>
                <p class="lead my-3">This is static text, just.. static.. text</p>
            </div>
        </div>
        <div class="estates-container">
            <h2 class="display-3">Our Estates</h2>
            <?php if(!empty($estates)):?>
            <div class="estates-container__filters">
                <form class="filters__form">
                    <div class="item-formbox">
                        <select class="form-select form-select-sm" aria-label="Small select example" name="stage">
                            <option selected value="0">Кількість поверхів</option>
                            <option value="1">Один</option>
                            <option value="2">Два</option>
                            <option value="3">Три</option>
                            <option value="4">Чотири</option>
                            <option value="5">Пять</option>
                            <option value="6">Шість</option>
                            <option value="7">Сім</option>
                            <option value="8">Вісім</option>
                            <option value="9">Девять</option>
                            <option value="10">Десять</option>
                            <option value="11">Одинадцять</option>
                            <option value="12">Дванадцять</option>
                            <option value="13">Тринадцять</option>
                            <option value="14">Чотирнадцять</option>
                            <option value="15">Пятнадцять</option>
                            <option value="16">Шістнадцять</option>
                            <option value="17">Сімнадцять</option>
                            <option value="18">Вісімнадцять</option>
                            <option value="19">Девятнадцять</option>
                            <option value="20">Двадцять</option>
                        </select>
                    </div>
                    <div class="item-formbox">
                        <select class="form-select form-select-sm" aria-label="Small select example" name="type">
                            <option selected value="0">Тип будівлі</option>
                            <option value="1">Панель</option>
                            <option value="2">Цегла</option>
                            <option value="3">Піноблок</option>
                        </select>
                    </div>
                    <div class="item-formbox">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>

                </form>
            </div>
            <div class="estates-container__estates">
                <?php foreach ($estates as $estate):?>
                    <a href="<?php echo $estate['href'];?>" class="estates__estate-item" id="<?php echo $estate['id'];?>">
                            <div class="estate-item__image-container">
                                <img src="<?php echo $estate['src'];?>" alt="<?php echo $estate['name']; ?>">
                            </div>
                        <?php if($estate['name']):?>
                        <div class="estate-item__text-container">
                            <h3 class="estate-item__title mb-0"><?php echo $estate['name'];?></h3>
	                        <?php endif; if($estate['desc']):?>
                                <p class="estate-item__desc card-text mb-auto"><?php echo strip_tags($estate['desc'], 'span');?></p>
	                        <?php endif;?>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
            <?php else: ?>
            <div>No estates</div>
            <?php endif;?>
        </div>
    </div>
</main>
<div class="popups">
    <div class="layout">
        <div id="readmy" class="popup">
            <div class="content-popup">
                <button type="button" class="close btn-close-white" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <p>Це тестове завдання піднято на VPS, який я адмініструю власноруч, а саме:</p>
                <ol>
                    <li>Налаштовую DirectAdmin</li>
                    <li>Маю повні root - права, і самостійно налаштовую користувачів</li>
                    <li>Працюю з SSL</li>
                    <li>Самостійно перенаправляю сюди домени</li>
                    <li>Самостійно налаштовую роботу поштового серверу, аби листи від нього не потрапляли в спам</li>
                    <li>Та ін...</li>
                </ol>
                <p>Сподіваюсь, це буде враховано під час оцінки скілів.</p>
                <p align="right"><i>З повагою, middle-full-stack developer, Л. Антон</i></p>
            </div>
        </div>
    </div>
</div>
<?php
get_footer();
?>