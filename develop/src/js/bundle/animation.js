export default class Animation {
  constructor() {
    // ========================================
    // コンテンツ　スクロールアニメーション 
    // ========================================
    for(let i = 0; i <= 10; i++) {
      if (i < 10) {
        fadeInAnimation(`.fadein-set0${i}`, 'fadein-anime');
      } else {
        fadeInAnimation(`.fadein-set${i}`, 'fadein-anime');
      }
    }
    
    fadeInAnimation('.fadein-zoomout-set', 'fadein-zoomout-anime');
    
    function fadeInAnimation(fadeinSet, addElement) {
      document.addEventListener('DOMContentLoaded', () => {
        // DOM取得
        const targets = document.querySelectorAll(fadeinSet);
    
        // コールバック関数
        const callback = (entries, observer) => {
          entries.forEach(entry => {
            if (entry.isIntersecting) {
              // 要素が画面に入ったときにクラスを追加
              entry.target.classList.add(addElement);
              // 一度クラスを追加したら監視を停止
              observer.unobserve(entry.target);
            }
          });
        };
    
        // オプション
        const options = {
          root: null,
          rootMargin: "0px 0px -100px 0px",//発火位置調整
          threshold: [0] //発火位置調整(交差)
        };
    
        // 初期化
        const observer = new IntersectionObserver(callback, options);
    
        // 監視を開始
        targets.forEach(target => {
          observer.observe(target);
    
          // ページロード時、すでに画面内または画面外にある要素に対してもクラスを追加
          const rectTarget = target.getBoundingClientRect();
    
          if ( rectTarget.top < 0) { //view-portより上
            target.classList.add(addElement);
            observer.unobserve(target);
          }
        });
      });
    }

    // ========================================
    // ヘッダー　グローバルメニュー
    // ========================================
    const menuBtn = document.querySelector(".js-menu-btn");
    const menuBtnC = document.querySelector(".js-menu-btn-c");

    menuBtnAnimation(menuBtn);
    menuBtnAnimation(menuBtnC);

    function menuBtnAnimation(menuBtn) {
      menuBtn.addEventListener("click", () => {
        menuBtn.classList.toggle("is-bar-move");

        const menu = document.querySelector(".js-menu-show");
        menu.classList.toggle("is-menu-show");

        const bg = document.querySelector(".js-load");
        bg.classList.toggle("is-stay");

        const elements = document.querySelectorAll(".p-header-nav-item.fadein-set04, .p-header-nav-item.fadein-set05, .p-header-nav-item.fadein-set06, .p-header-nav-item.fadein-set07");

        const fixBox = document.getElementById('fixBox');
        elements.forEach(element => {
          
          element.classList.toggle("fadein-anime");
        });
      });

      
    }
    
    const links = document.querySelectorAll(".p-header-nav-link");
    links.forEach(link => {
      link.addEventListener("click", () => {
        menuBtn.classList.remove("is-bar-move");
        menuBtnC.classList.remove("is-bar-move");
  
        const menu = document.querySelector(".js-menu-show");
        menu.classList.remove("is-menu-show");
  
        const bg = document.querySelector(".js-load");
        bg.classList.remove("is-stay");

        const elements = document.querySelectorAll(".p-header-nav-item.fadein-set04, .p-header-nav-item.fadein-set05, .p-header-nav-item.fadein-set06, .p-header-nav-item.fadein-set07");
        elements.forEach(element => {
          fixBox.classList.add('is-scrolled');
          element.classList.toggle("fadein-anime");
        });
      });
    });

    
    

    // ========================================
    // TOP　スクロール
    // ========================================
    function handleScroll() {
      const pCover = document.querySelector('.p-cover');
      const fixBox = document.getElementById('fixBox');
      const news = document.getElementById('news');
      const header = document.querySelector(".js-header");
      const steam01 = document.querySelector(".steam01");
      const steam02 = document.querySelector(".steam02");
      const steam03 = document.querySelector(".steam03");
      const steam04 = document.querySelector(".steam04");
      const steam05 = document.querySelector(".steam05");

      if (pCover.getBoundingClientRect().bottom + 50 <= 0) {
        header.classList.add('is-scroll');
        fixBox.classList.add('is-scrolled');
        news.classList.remove('is-marginTop_100vh');
      } else {
        header.classList.remove('is-scroll');
        fixBox.classList.remove('is-scrolled');
        news.classList.add('is-marginTop_100vh');
      }
      if (pCover.getBoundingClientRect().bottom - 100 <= window.innerHeight / 2) {
        steam01.classList.add('is-steam01');
        steam02.classList.add('is-steam02');
        steam03.classList.add('is-steam02');
        steam04.classList.add('is-steam02');
        steam05.classList.add('is-steam02');
      } else {
        steam01.classList.remove('is-steam01');
        steam02.classList.remove('is-steam02');
        steam03.classList.remove('is-steam02');
        steam04.classList.remove('is-steam02');
        steam05.classList.remove('is-steam02');
      }


    }
    
    document.addEventListener("scroll", handleScroll);
    window.addEventListener("DOMContentLoaded", handleScroll);
  }
}