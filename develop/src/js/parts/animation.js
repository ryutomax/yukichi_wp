function fadeInAnimation(fadeinSet, addElement) {
  document.addEventListener('DOMContentLoaded', () => {
    let fadeinElements = document.querySelectorAll(fadeinSet);

    function checkIfInView() {
      fadeinElements.forEach(element => {
          let rectTarget = element.getBoundingClientRect(); //要素の位置
          let windowHeight = (window.innerHeight || document.documentElement.clientHeight);
          let windowTop = (window.scrollY || document.documentElement.scrollTop);
    
          // 要素が画面に入ったかどうかを確認
          if ((rectTarget.top <= windowHeight && rectTarget.bottom >= 0) || (rectTarget.bottom < windowTop)) {
            element.classList.add(addElement);
          }
      });
    }
    // スクロールイベントとページロード時にチェックを実行
    window.addEventListener('scroll', checkIfInView);
    checkIfInView(); // 初回チェック
  });
}

for(let i = 0; i <= 12; i++) {
  if (i < 10) {
    fadeInAnimation(`.fadein-set0${i}`, 'fadein-anime');
  } else {
    fadeInAnimation(`.fadein-set${i}`, 'fadein-anime');
  }
}

fadeInAnimation('.fadein-zoomout-set', 'fadein-zoomout-anime');