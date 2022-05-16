@extends('layouts.mainsite.mainSite')
{{-- title --}}

@section('title', 'Главная')

{{-- page scripts --}}

@section('content')

<div class="notification"> 
  <div class="container">
    <p> <span class="bold">Карьера в Grou |</span>Мы ищем талантливых людей, готовых присоединиться к нашей глобальной команде специалистов  <a class="link" href="#">Все открытые вакансии</a></p>
  </div>
</div>
<header class="header"> 
  <div class="container"> 
    <div class="header__inner">
      <div class="header__logo logo"> <picture><source srcset="{{ asset('images/mainSite/logo.webp') }}"type="image/webp"><img class="logo__img" src="{{ asset('images/mainSite/logo.png') }}" alt="logo"></picture></div>
      <div class="header__burger">
        <div class="header__line"></div>
      </div>
      <nav class="header__nav"> 
        <ul class="header__menu"> 
          <li class="header__item header__item--submenu active"><a class="header__link" href="#">Создателям</a>
            <ul class="header__submenu"> 
              <li><a href="#">Развитие</a></li>
              <li><a href="#">Монетизация</a></li>
              <li><a href="#">Упаковка бренда и контента</a></li>
              <li><a href="#">Стоимость</a></li>
              <li><a href="#">Поддержка</a></li>
            </ul>
          </li>
          <li class="header__item header__item--submenu"><a class="header__link" href="#">Компаниям</a>
            <ul class="header__submenu"> 
              <li><a href="#">Создатели</a></li>
              <li><a href="#">Управление компаниями инфлюенсеров</a></li>
              <li><a href="#">Стоимость</a></li>
              <li><a href="#">Кейсы</a></li>
            </ul>
          </li>
          <li class="header__item"><a class="header__link" href="#">Блог</a></li>
          <li class="header__item"><a class="header__link" href="#">Про GROU</a></li>
        </ul>
        @if (Auth::check())
        <a href="{{ route('dashboard') }}" class="header__btn btn btn--sm btn--green">Кабинет</a>
        @else
        <a href="{{ route('register') }}" class="header__btn btn btn--sm btn--green">Начать бесплатно</a>
        @endif
      </nav>
    </div>
  </div>
  <div class="layer"></div>
</header>
<main class="main">
  <div class="preview"> 
    <div class="container"> 
      <div class="preview__inner">
        <div class="preview__title title">Платформа <br> для инфлюенс маркетинга развития создателей</div><img class="preview__img" src="{{ asset('images/mainSite/preview-img.svg') }}" alt="preview image">
        <ul class="preview__adv">
          <li class="preview__item">Начни использовать платформу, где удобно управлять развитием создателей</li>
          <li class="preview__item">Находи самых эффективных инфлюенсеров для продвижения продуктов</li>
        </ul>
        <div class="preview__links"> <a class="preview__link btn btn--orange" href="#">Создателям</a><a class="preview__link btn" href="#">Компаниям</a></div>
      </div>
    </div>
  </div>
  <div class="adv"> 
    <div class="container"> 
      <ul class="adv__inner"> 
        <li class="adv__item adv__item--lg"> 
          <p class="adv__text">Для инфлюенсеров, создателей контента и событий, спортсменов, лидеров мнений, геймеров</p><a class="adv__link btn btn--sm" href="#">Начать бесплатно</a>
        </li>
        <li class="adv__item"> <picture><source srcset="{{ asset('images/mainSite/emoji/stars.webp') }}"type="image/webp"><img class="adv__icon" src="{{ asset('images/mainSite/emoji/stars.png') }}" alt="stars icon"></picture>
          <p class="adv__text">Создаем <br> бренд</p>
        </li>
        <li class="adv__item"> <picture><source srcset="{{ asset('images/mainSite/emoji/sprout.webp') }}"type="image/webp"><img class="adv__icon" src="{{ asset('images/mainSite/emoji/sprout.png') }}" alt="sprout icon"></picture>
          <p class="adv__text">Помогаем в создании контента</p>
        </li>
        <li class="adv__item"> <picture><source srcset="{{ asset('images/mainSite/emoji/graph.webp') }}"type="image/webp"><img class="adv__icon" src="{{ asset('images/mainSite/emoji/graph.png') }}" alt="graph icon"></picture>
          <p class="adv__text">Упаковываем и продвигаем</p>
        </li>
        <li class="adv__item"> <picture><source srcset="{{ asset('images/mainSite/emoji/crown.webp') }}"type="image/webp"><img class="adv__icon" src="{{ asset('images/mainSite/emoji/crown.png') }}" alt="crown icon"></picture>
          <p class="adv__text">Монетизируем бренд и контент</p>
        </li>
      </ul>
    </div>
  </div>
  <div class="promo">
    <div class="container">
      <div class="promo__inner">
        <div class="promo__info">
          <div class="promo__title title">Компаниям: <span class="green">эффективный инфлюенс маркетинг, простое взаимодействие с создателями</span></div>
          <div class="promo__text"> 
            <p>Получайте пользователей, клиентов для ваших продуктов, игр, услуг, любого бизнеса.</p>
            <p>Привлекайте к продвижению создателей с вашей аудиторией, культурой и взаимодействуйте с ними с помощью платформы Grou </p>
          </div><a class="promo__link btn btn--orange" href="#">Узнать больше о платформе</a>
        </div><img class="promo__img" src="{{ asset('images/mainSite/promo-img.svg') }}" alt="promo image">
      </div>
    </div>
  </div>
  <div class="work"> 
    <div class="container"> 
      <div class="work__inner">
        <div class="work__banner"> 
          <ul class="work__list"> 
            <li class="work__item"> <picture><source srcset="{{ asset('images/mainSite/work-people-1.webp') }}"type="image/webp"><img src="{{ asset('images/mainSite/work-people-1.png') }}" alt="work people"></picture></li>
            <li class="work__item"> <picture><source srcset="{{ asset('images/mainSite/work-people-2.webp') }}"type="image/webp"><img src="{{ asset('images/mainSite/work-people-2.png') }}" alt="work people"></picture></li>
            <li class="work__item"> <picture><source srcset="{{ asset('images/mainSite/work-people-3.webp') }}"type="image/webp"><img src="{{ asset('images/mainSite/work-people-3.png') }}" alt="work people"></picture></li>
          </ul>
          <div class="work__title">Работайте <br> с инфлюенсерами <br> во всех каналах просто, эффективно, предсказуемо</div><a class="work__link btn" href="#">Узнать больше о каналах</a>
        </div>
        <div class="work__banner work__banner--white"> 
          <div class="work__slider"> 
            <div class="swiper-wrapper"> 
              <div class="work__slide"> <picture><source srcset="{{ asset('images/mainSite/work-slide-img.webp') }}"type="image/webp"><img src="{{ asset('images/mainSite/work-slide-img.png') }}" alt="slide image"></picture></div>
              <div class="work__slide"> <picture><source srcset="{{ asset('images/mainSite/work-slide-img.webp') }}"type="image/webp"><img src="{{ asset('images/mainSite/work-slide-img.png') }}" alt="slide image"></picture></div>
              <div class="work__slide"> <picture><source srcset="{{ asset('images/mainSite/work-slide-img.webp') }}"type="image/webp"><img src="{{ asset('images/mainSite/work-slide-img.png') }}" alt="slide image"></picture></div>
            </div>
            <div class="work__pagination"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="reviews"> 
    <div class="container"> 
      <div class="reviews__inner"> 
        <div class="reviews__title title">Отзывы</div>
        <div class="reviews__slider"> 
          <div class="swiper-wrapper">
            <div class="reviews__slide"> 
              <div class="reviews__item"> <picture><source srcset="{{ asset('images/mainSite/reviews-1.webp') }}"type="image/webp"><img class="reviews__img" src="{{ asset('images/mainSite/reviews-1.png') }}" alt="reviewer"></picture>
                <div class="reviews__name">Матвей</div>
                <div class="reviews__text">«Программа очень структурирована. Каждая новая тема раскрывается достаточно глубоко»</div>
              </div>
              <div class="reviews__item"> <picture><source srcset="{{ asset('images/mainSite/reviews-4.webp') }}"type="image/webp"><img class="reviews__img" src="{{ asset('images/mainSite/reviews-4.png') }}" alt="reviewer"></picture>
                <div class="reviews__name">Саня</div>
                <div class="reviews__text">«На программу срочно надо идти тем людям, которые чувствуют, что они уже выросли из своего первого класса бизнеса и не успевают справиться со всеми процессами».</div>
              </div>
            </div>
            <div class="reviews__slide"> 
              <div class="reviews__item"> <picture><source srcset="{{ asset('images/mainSite/reviews-2.webp') }}"type="image/webp"><img class="reviews__img" src="{{ asset('images/mainSite/reviews-2.png') }}" alt="reviewer"></picture>
                <div class="reviews__name">Аня</div>
                <div class="reviews__text">«На программу срочно надо идти тем людям, которые чувствуют, что они уже выросли из своего первого класса бизнеса и не успевают справиться со всеми процессами».</div>
              </div>
              <div class="reviews__item"> <picture><source srcset="{{ asset('images/mainSite/reviews-5.webp') }}"type="image/webp"><img class="reviews__img" src="{{ asset('images/mainSite/reviews-5.png') }}" alt="reviewer"></picture>
                <div class="reviews__name">Катя</div>
                <div class="reviews__text">«Программа очень структурирована. Каждая новая тема раскрывается достаточно глубоко»</div>
              </div>
            </div>
            <div class="reviews__slide"> 
              <div class="reviews__item"> <picture><source srcset="{{ asset('images/mainSite/reviews-3.webp') }}"type="image/webp"><img class="reviews__img" src="{{ asset('images/mainSite/reviews-3.png') }}" alt="reviewer"></picture>
                <div class="reviews__name">Мая</div>
                <div class="reviews__text">«Программа очень структурирована. Каждая новая тема раскрывается достаточно глубоко»</div>
              </div>
              <div class="reviews__item"> <picture><source srcset="{{ asset('images/mainSite/reviews-6.webp') }}"type="image/webp"><img class="reviews__img" src="{{ asset('images/mainSite/reviews-6.png') }}" alt="reviewer"></picture>
                <div class="reviews__name">Марк</div>
                <div class="reviews__text">«На программу срочно надо идти тем людям, которые чувствуют, что они уже выросли из своего первого класса бизнеса и не успевают справиться со всеми процессами».</div>
              </div>
            </div>
            <div class="reviews__slide"> 
              <div class="reviews__item"> <picture><source srcset="{{ asset('images/mainSite/reviews-1.webp') }}"type="image/webp"><img class="reviews__img" src="{{ asset('images/mainSite/reviews-1.png') }}" alt="reviewer"></picture>
                <div class="reviews__name">Матвей</div>
                <div class="reviews__text">«Программа очень структурирована. Каждая новая тема раскрывается достаточно глубоко»</div>
              </div>
              <div class="reviews__item"> <picture><source srcset="{{ asset('images/mainSite/reviews-4.webp') }}"type="image/webp"><img class="reviews__img" src="{{ asset('images/mainSite/reviews-4.png') }}" alt="reviewer"></picture>
                <div class="reviews__name">Саня</div>
                <div class="reviews__text">«На программу срочно надо идти тем людям, которые чувствуют, что они уже выросли из своего первого класса бизнеса и не успевают справиться со всеми процессами».</div>
              </div>
            </div>
            <div class="reviews__slide"> 
              <div class="reviews__item"> <picture><source srcset="{{ asset('images/mainSite/reviews-2.webp') }}"type="image/webp"><img class="reviews__img" src="{{ asset('images/mainSite/reviews-2.png') }}" alt="reviewer"></picture>
                <div class="reviews__name">Аня</div>
                <div class="reviews__text">«На программу срочно надо идти тем людям, которые чувствуют, что они уже выросли из своего первого класса бизнеса и не успевают справиться со всеми процессами».</div>
              </div>
              <div class="reviews__item"> <picture><source srcset="{{ asset('images/mainSite/reviews-5.webp') }}"type="image/webp"><img class="reviews__img" src="{{ asset('images/mainSite/reviews-5.png') }}" alt="reviewer"></picture>
                <div class="reviews__name">Катя</div>
                <div class="reviews__text">«Программа очень структурирована. Каждая новая тема раскрывается достаточно глубоко»</div>
              </div>
            </div>
            <div class="reviews__slide"> 
              <div class="reviews__item"> <picture><source srcset="{{ asset('images/mainSite/reviews-3.webp') }}"type="image/webp"><img class="reviews__img" src="{{ asset('images/mainSite/reviews-3.png') }}" alt="reviewer"></picture>
                <div class="reviews__name">Мая</div>
                <div class="reviews__text">«Программа очень структурирована. Каждая новая тема раскрывается достаточно глубоко»</div>
              </div>
              <div class="reviews__item"> <picture><source srcset="{{ asset('images/mainSite/reviews-6.webp') }}"type="image/webp"><img class="reviews__img" src="{{ asset('images/mainSite/reviews-6.png') }}" alt="reviewer"></picture>
                <div class="reviews__name">Марк</div>
                <div class="reviews__text">«На программу срочно надо идти тем людям, которые чувствуют, что они уже выросли из своего первого класса бизнеса и не успевают справиться со всеми процессами».</div>
              </div>
            </div>
          </div>
          <div class="reviews__pagination">       </div>
        </div>
      </div>
    </div>
  </div>
  <div class="media"> 
    <div class="container">
      <div class="media__title title">Grou в медиа </div>
      <div class="media__slider">
        <div class="swiper-wrapper">
          <div class="media__slide"> <picture><source srcset="{{ asset('images/mainSite/media-1.webp') }}"type="image/webp"><img class="media__img" src="{{ asset('images/mainSite/media-1.png') }}" alt="media image"></picture>
            <div class="media__name">Управление персоналом: обязанности, результаты работы, должностные инструкции</div><a class="media__link" href="#"> </a>
          </div>
          <div class="media__slide"> <picture><source srcset="{{ asset('images/mainSite/media-2.webp') }}"type="image/webp"><img class="media__img" src="{{ asset('images/mainSite/media-2.png') }}" alt="media image"></picture>
            <div class="media__name">Как построить эффективный отдел продаж</div><a class="media__link" href="#"> </a>
          </div>
          <div class="media__slide"> <picture><source srcset="{{ asset('images/mainSite/media-3.webp') }}"type="image/webp"><img class="media__img" src="{{ asset('images/mainSite/media-3.png') }}" alt="media image"></picture>
            <div class="media__name">HR аналитика ― 7 отчетов, которые нужны вашей компании</div><a class="media__link" href="#"> </a>
          </div>
          <div class="media__slide"> <picture><source srcset="{{ asset('images/mainSite/media-1.webp') }}"type="image/webp"><img class="media__img" src="{{ asset('images/mainSite/media-1.png') }}" alt="media image"></picture>
            <div class="media__name">Управление персоналом: обязанности, результаты работы, должностные инструкции</div><a class="media__link" href="#"> </a>
          </div>
          <div class="media__slide"> <picture><source srcset="{{ asset('images/mainSite/media-2.webp') }}"type="image/webp"><img class="media__img" src="{{ asset('images/mainSite/media-2.png') }}" alt="media image"></picture>
            <div class="media__name">Как построить эффективный отдел продаж</div><a class="media__link" href="#"> </a>
          </div>
          <div class="media__slide"> <picture><source srcset="{{ asset('images/mainSite/media-3.webp') }}"type="image/webp"><img class="media__img" src="{{ asset('images/mainSite/media-3.png') }}" alt="media image"></picture>
            <div class="media__name">HR аналитика ― 7 отчетов, которые нужны вашей компании</div><a class="media__link" href="#"> </a>
          </div>
        </div>
        <div class="media__pagination">   </div>
      </div>
    </div>
  </div>
  <div class="banner">
    <div class="container"> 
      <div class="banner__inner">
        <div class="banner__title">Создавай эффективные компании вместе с платформой <span class="black">Grou</span></div><a class="banner__link btn" href="#">Начать бесплатно</a><img class="banner__img" src="{{ asset('images/mainSite/banner-img.svg') }}" alt="banner image">
      </div>
    </div>
  </div>
</main>
<footer class="footer"> 
  <div class="container"> 
    <div class="footer__inner"> 
      <ul class="footer__col">
        <li class="footer__link">Создателям </li>
        <li class="footer__link">Развитие </li>
        <li class="footer__link">Монетизация </li>
        <li class="footer__link">Упаковка бренда и контента </li>
        <li class="footer__link">Стоимость </li>
        <li class="footer__link">Поддержка  </li>
      </ul>
      <ul class="footer__col">
        <li class="footer__link">Компаниям</li>
        <li class="footer__link">Создатели</li>
        <li class="footer__link">Управление компаниями инфлюенсеров</li>
        <li class="footer__link">Стоимость</li>
        <li class="footer__link">Кейсы</li>
      </ul>
      <ul class="footer__social"> 
        <li class="footer__item"><a class="footer__icon" href="#"><img src="{{ asset('images/mainSite/social/facebook.svg') }}" alt="facebook link"></a></li>
        <li class="footer__item"><a class="footer__icon" href="#"><img src="{{ asset('images/mainSite/social/twitter.svg') }}" alt="twitter link"></a></li>
        <li class="footer__item"><a class="footer__icon" href="#"><img src="{{ asset('images/mainSite/social/telegram.svg') }}" alt="telegram link" style="transform: translateX(-2px)"></a></li>
        <li class="footer__item"><a class="footer__icon" href="#"><img src="{{ asset('images/mainSite/social/linkedin.svg') }}" alt="linkedin link"></a></li>
      </ul>
    </div>
    <div class="footer__row"> 
      <div class="footer__copy">©2022 GROU</div><a class="footer__docs" href="#">Правовое уведомление</a><a class="footer__docs" href="#">Политика конфиденциальности</a>
    </div>
  </div>
</footer>

@endsection

@section('page-scripts')
<script src="{{asset('assets/js/app.js')}}"></script>
@endsection