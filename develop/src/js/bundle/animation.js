export default class Animation {
  constructor() {
    // ========================================
    // コンテンツ　スクロールアニメーション 
    // ========================================
    for(let i = 0; i <= 12; i++) {
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
    window.addEventListener("scroll", function() {
      // ヘッダーを変数の中に格納する
      const header = document.querySelector("#header");

      header.classList.toggle("is-scroll", window.scrollY > 100 + header.clientHeight);
    });
  }
}