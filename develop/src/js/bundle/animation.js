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
    // ヘッダー　スクロール変形
    // ========================================
    window.addEventListener("scroll", () => {
      // ヘッダーを変数の中に格納する
      const header = document.querySelector(".js-header");
      header.classList.toggle("is-scroll", window.scrollY > 150 + header.clientHeight);
    });
    // リロード監視
    window.addEventListener("load", () => {
      const header = document.querySelector(".js-header");
      // スクロール位置に応じてクラスを適用
      if (window.scrollY > 150 + header.clientHeight) {
        header.classList.add("is-scroll");
      } else {
        header.classList.remove("is-scroll");
      }
    });


    // ========================================
    // ヘッダー　グローバルメニュー
    // ========================================
    const menuBtn = document.querySelector(".js-menu-btn");
    menuBtn.addEventListener("click", () => {
      menuBtn.classList.toggle("is-bar-move");

      const menu = document.querySelector(".js-menu-show");
      menu.classList.toggle("is-menu-show");

      const bg = document.querySelector(".js-load");
      bg.classList.toggle("is-stay");

      const elements = document.querySelectorAll(".p-header-nav-item.fadein-set04, .p-header-nav-item.fadein-set05, .p-header-nav-item.fadein-set06, .p-header-nav-item.fadein-set07");

      elements.forEach(element => {

        element.classList.toggle("fadein-anime");
      });
    });

    const links = document.querySelectorAll(".p-header-nav-link");
    links.forEach(link => {
      link.addEventListener("click", () => {
        menuBtn.classList.remove("is-bar-move");

        const menu = document.querySelector(".js-menu-show");
        menu.classList.remove("is-menu-show");

        const bg = document.querySelector(".js-load");
        bg.classList.remove("is-stay");

        const elements = document.querySelectorAll(".p-header-nav-item.fadein-set04, .p-header-nav-item.fadein-set05, .p-header-nav-item.fadein-set06, .p-header-nav-item.fadein-set07");

        elements.forEach(element => {

          element.classList.toggle("fadein-anime");
        });
      });
    });

  }
}