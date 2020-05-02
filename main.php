<?php
/* @var $this \yii\web\View */
/* @var $content string */
use yii\helpers\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use yii\helpers\Url;
use yii\web\UrlManager;
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
            new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-MX76H75');
    </script>
    <!-- End Google Tag Manager -->
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="سازمان همیاری شهرداریها,همیارِي,همیاری,همیاری غربی"/>
    <meta name="description" content="فعال در کلیه پروژه های عمرانی و فعالیت های بازرگانی  صادرات و واردات و تامین نیاز های شهرداریهای استان"/>
    <meta name="author" content="Hadi Hasanpur"/>
    <link rel="canonical" href="https://hmyr.ir" />
    <meta http-equiv="refresh" content="30" />
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MX76H75"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe>
</noscript>
<!-- End Google Tag Manager (noscript) -->
<?php $this->beginBody() ?>
<div class="container-fluid" style="direction: rtl;">
    <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active" data-interval="10000">
                <img src="<?= Yii::$app->request->baseUrl .'/../..//images/jahesh.gif' ?>"
                     class="d-block w-100 image-fluid" alt="سازمان همیاری شهرداریهای استان آذربایجان غربی" >
            </div>
            <div class="carousel-item" data-interval="3000">
                <img src="<?= Yii::$app->request->baseUrl  .'/../..//images/khoy1.gif' ?>"
                     class="d-block w-100 image-fluid" alt="پروژه های عمرانی">
            </div>
            <div class="carousel-item" data-interval="3000">
                <img src="<?= Yii::$app->request->baseUrl .'/../..//images/hotel.gif' ?>"
                     class="d-block w-100 image-fluid" alt="هتل مروارید">
            </div>
            <div class="carousel-item" data-interval="3000">
                <img src="<?= Yii::$app->request->baseUrl .'/../..//images/beton1.gif' ?>"
                     class="d-block w-100 image-fluid"" alt="بتن صنعت">
            </div>
            <div class="carousel-item" data-interval="3000">
                <img src="<?= Yii::$app->request->baseUrl .'/../..//images/beton3.gif' ?>"
                     class="d-block w-100 image-fluid" alt="موسسه بتن صنعت">
            </div>
            <div class="carousel-item" data-interval="3000">
                <img src="<?= Yii::$app->request->baseUrl .'/../..//images/khoy.gif' ?>"
                     class="d-block w-100 image-fluid" alt="پروژه های عمرانی">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <?php
    NavBar::begin([
      //  'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-expand-sm navbar-expand-lg navbar-expand-md navbar-expand-xl navbar-collapse
            sticky-top navbar-light navbar-rtl',
            'style'=>'background-color: #125a80; color: #ffffff;',
        ],
    ]);
    $menuItems = [
        ['label' => 'صفحه اصلی',       'url' => ['/site/index']],
        ['label' => 'test',            'url' => ['/site/lol']],

        ['label' => 'هیات مدیره',            'url' => ['/site/modire']],
        ['label' => 'موسسه بتن صنعت',        'url' => ['/site/betonsanat']] ,
        ['label' => 'هتل مروارید',        'url' => 'http://www.hotelmorvarid.com/'] ,
        /*        ['label' => 'مناقصه و مزایده    ', 'url' => ['/auction/auction']],*/
        ['label' => ' همیاری استانها', 'url' => ['/site/hamyari']],
        /* ['label' => 'اخبار استان',  'items' => [
             ['label' => 'استان آذربایجان غربی در خبرگزاری تسنیم', 'url' => 'https://www.tasnimnews.com/fa/service/48/%D8%A2%D8%B0%D8%B1%D8%A8%D8%A7%DB%8C%D8%AC%D8%A7%D9%86-%D8%BA%D8%B1%D8%A8%DB%8C'],
             ['label' => 'استان آذربایجان غربی درباشگاه خبرنگاران جوان', 'url' => 'https://www.yjc.ir/fa/azarbaijan-gharbi'],
             ['label' => 'استان آذربایجان غربی در خبرگزاری فارس', 'url' => 'https://www.farsnews.com/azarbaijan-gharbi'],
             ['label' => 'استان آذربایجان غربی در خبرگزاری مهر', 'url' => 'https://www.mehrnews.com/service/Provinces/AzarbayjanGharbi'],
             ['label' => 'استان آذربایجان غربی در خبرگزاری ایسنا', 'url' => 'http://orumiyeh.isna.ir/'],
             ['label' => 'استان آذربایجان غربی در خبرگزاری ایرنا', 'url' => 'http://www.irna.ir/wazarbaijan'],
             ['label' => 'استان آذربایجان غربی در خبرگزاری تابناک', 'url' => 'http://www.tabnakazargharbi.ir/'],
         ],
         ],*/
        ['label' => 'تماس با ما',         'url' => ['/site/contact']] ,
        ['label' => 'درباره ما',            'url' => ['/site/about']],
        '<li>'
        . Html::beginForm(['/site/search'], 'get', ['class' => 'form-inline'])
        .Html::textInput('text')
        .Html::submitButton('Search',['class'=>'btn btn-outline-primary my-2 my-sm-0 btn-sm',
            'style'=>'font-size: 8px;margin-right:2px;',
        ])
        . Html::endForm()
        . '</li>',
    ];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'ثبت نام', 'url' => ['/site/signup']];
        $menuItems[] = ['label' => 'ورود', 'url' => ['/site/login']];
    } else {
        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>';
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right navbar-expand-sm'],
        'items' => $menuItems,
    ]);

    NavBar::end();
    ?>

    <nav class="navbar navbar-expand-xl navbar-dark  bg-dark">

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <a class="navbar-brand" style="color: #ffffff;"
           href="https://hmyr.ir/index.php/site/about">سازمان همیاری شهرداریهای استان آذربایجان غربی</a>
        <div class="collapse navbar-collapse navbar-rtl" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="<?= Url::to(['site/index'])?>">صفحه اصلی<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= Url::to(['site/modire'])?>">هیات مدیره</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= Url::to(['site/message'])?>">پیام مدیر عامل</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">واحد ها و معاونت ها</a>
                    <div class="dropdown-menu bg-dark mr-auto text-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="<?= Url::to(['site/fanni'])?>">معاونت فنی و مهندسی</a>
                        <a class="dropdown-item" href="<?= Url::to(['site/trade'])?>">معاونت بازرگانی</a>
                        <a class="dropdown-item" href="<?= Url::to(['site/barname'])?>">برنامه ریزی و توسعه</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="<?= Url::to(['site/it'])?>">واحد کامپیوتر</a>
                        <a class="dropdown-item" href="<?= Url::to(['site/modire'])?>">واحد روابط عمومی</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= Url::to(['site/betonsanat'])?>">موسسه بتن صنعت</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= Url::to(['site/contact'])?>">تماس با ما</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= Url::to(['site/about'])?>">درباره ما</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= Url::to(['site/hotel'])?>">هتل مروارید</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= Url::to(['site/hamyari'])?>">پیوند ها</a>
                </li>

            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>


    <div class="container" style="font-family: 'B Nazanin',Tahoma;font-size: small;">
        <?= Breadcrumbs::widget([
            'homeLink'=> ['url'=>['/site/index'],'label'=>'صفحه اصلی'],

            'itemTemplate' => "\n\t<li class=\"breadcrumb-item\"><i>{link}</i></li>\n", // template for all links
            'activeItemTemplate' => "\t<li class=\"breadcrumb-item active\">{link}</li>\n", // template for the active link
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>

        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>
<footer class="footer">
    <!--<div align="center"><img src="<?/*= Yii::$app->request->baseUrl .'/../..//backend/web/images/miniarm.jpg' */?>"
                             style="border-radius: 15px; margin-top: 2px;"></div>-->
    <p  style="margin-top: 25px;" >
        دفتر مرکزی:ارومیه، خیابان جهاد(32 متری نصرت سابق)-کدپستی 5714733516
    </p>
    <p >شماره تلفن ها:  32228819(044)     32228818(044) فکس :  32236736(044)</p>
    <p style="padding-bottom: 15px;"> دفتر مدیر عامل:   32228010   (044)</p>
    <p>
        آدرس هتل مروارید:ارومیه خیابان بهشتی(دانشکده)،کوچه روبروی موزه ارومیه خیابان پاسداران -پشت فروشگاه ترک مال - جنب خانه جوان، هتل مروارید کد پستی:57159-68954
    </p>
    <p style="padding-bottom: 15px;">
        شماره تلفن های هتل:   33469860(044)            33469861(044)
    </p>
    <p>
        آدرس کارخانه بتن صنعت:ارومیه، کیلومتر 20 جاده سرو، محال نازلو، روستای پر، جنب کارخانه آسفالت شهرداری
    </p>

    <p style="padding-bottom: 15px;">
        شماره تلفن های موسسه بتن صنعت:  32527338(044) 32527386(044)  32527334(044)  32527335(044)  فکس:32527274(044)

    </p>
    <p style="padding-bottom: 15px;">
        <a href="https://hmyr.ir:2096/logout/?locale=en" style="color:white;">صندوق پستی سازمان:info@hmyr.ir</a>
    </p>

    <p style="padding-bottom: 10px;">
        کليه حقوق اين سايت متعلق به سازمان همیاری شهرداریهای استان آذربایجان غربی بوده و استفاده از مطالب آن با ذکر منبع بلا مانع است.
    </p>
    <div>

    </div>
</footer>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
