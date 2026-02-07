
//----------  背景色遷移  ----------//


const header = document.querySelector('header');
const logo = document.querySelector('.Header_Logo img');
const navLinks = document.querySelectorAll('.Header_Menu a');

// テーマごとの定義（色・画像など）
const themes = {
  black: {
    bg: '#191919',
    text: '#F9F9F9',
    logo: 'img/logo-wh.svg'
  },
  gray: {
    bg: '#D7D7D7',
    text: '#000000',
    logo: 'img/logo.svg'
  },
  white: {
    bg: '#F9F9F9',
    text: '#000000',
    logo: 'img/logo.svg'
  },
};

// セクションが表示されたらテーマを適用
const themeObserver = new IntersectionObserver(entries => {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      const themeKey = entry.target.dataset.theme;
      const theme = themes[themeKey];
      if (theme) {
        // data-theme属性をbodyに設定（CSSによる背景切り替え）
        document.body.setAttribute('data-theme', themeKey);

        // ヘッダーの文字色
        navLinks.forEach(link => {
          link.style.color = theme.text;
        });

        // ロゴ画像の切り替え
        logo.src = theme.logo;

        // JSによる背景色切り替え（CSSと併用可能）
        document.body.style.backgroundColor = theme.bg;
      }
    }
  });
}, {
  threshold: 0.4,//VISIONのアニメーションに合わせて色変化8.23
  rootMargin: '10% 0px -50% 0px'

});

// 対象セクションに observer を設定
document.querySelectorAll('div[data-theme]').forEach(section => {
  themeObserver.observe(section);
});

// 初期表示時に最初に見えているセクションのテーマを適用 //8.6追加
window.addEventListener('DOMContentLoaded', () => {
  //ドロワーの初期状態をリセット（追加）
  document.body.classList.remove('menu_open');
  document.body.classList.remove('no-scroll');
  //初期セクションのテーマを適用（既存処理）
  const firstVisibleSection = Array.from(document.querySelectorAll('div[data-theme]')).find(section => {
    const rect = section.getBoundingClientRect();
    return rect.top < window.innerHeight && rect.bottom > 0;
  });

  if (firstVisibleSection) {
    const themeKey = firstVisibleSection.dataset.theme;
    const theme = themes[themeKey];
    if (theme) {
      document.body.setAttribute('data-theme', themeKey);
      navLinks.forEach(link => {
        link.style.color = theme.text;
      });
      logo.src = theme.logo;
      document.body.style.backgroundColor = theme.bg;
    }
  }
});

/////////////// applyTheme() を追加（共通処理化）///////////////
function applyTheme(themeKey) {
  const theme = themes[themeKey];
  if (!theme) return;

  document.body.setAttribute('data-theme', themeKey);
  navLinks.forEach(link => {
    link.style.color = theme.text;
  });
  logo.src = theme.logo;
  document.body.style.backgroundColor = theme.bg;
  
 // ★ 現在のテーマをコンソールに表示
  // console.log(`現在のテーマ: ${themeKey}`, theme);


}
let themeChangeTimeout;
function debouncedThemeChange(themeKey) {
  clearTimeout(themeChangeTimeout);
  themeChangeTimeout = setTimeout(() => {
    applyTheme(themeKey);
  }, 100);
}
/////////////// 上下の判定を分離して、演出と精度を両立 ///////////////
const sections = Array.from(document.querySelectorAll('div[data-theme]'));

sections.forEach((section, index) => {
  const nextThemeKey = sections[index + 1]?.dataset.theme;

  // 上から入ってくるとき
  const observerUp = new IntersectionObserver(entries => {
    entries.forEach(entry => {
      if (entry.intersectionRatio > 0.4 && entry.boundingClientRect.top > 0) {
        // VISIONが再表示されたら強制的に黒テーマに戻す
      if (entry.target.id === 'vision') {
        debouncedThemeChange('black'); // ← VISIONのテーマキー
      } else {
        debouncedThemeChange(entry.target.dataset.theme);
      }
        // debouncedThemeChange(entry.target.dataset.theme);
      }
    });
  }, {
    // threshold: 0.3,
    // rootMargin: '10% 0px 0px 0px'
    threshold: [0.4],
    rootMargin: '10% 0px 0px 0px'  
  });

  // 下から消えるとき
  const observerDown = new IntersectionObserver(entries => {
    entries.forEach(entry => {
      // if (!entry.isIntersecting && entry.boundingClientRect.top < 0 && nextThemeKey) {
      //   applyTheme(nextThemeKey);
      if (entry.intersectionRatio < 0.01 && entry.boundingClientRect.top < 0 && nextThemeKey) {
      debouncedThemeChange(nextThemeKey);
      }
    });
  }, {

  threshold: [0.4],
  rootMargin: '10% 0px 0px 0px' // ← observerUp と同じにする

  });

  observerUp.observe(section);
  // observerDown.observe(section);
  if (nextThemeKey) {
  observerDown.observe(section);
}

});




//----------  ドロワーメニューメニューの開閉処理・ハンバーガーメニュークリック時・メニューアイテムクリック時  ----------//

document.addEventListener('DOMContentLoaded', () => {
  const trigger = document.querySelector('.menu-trigger');
  const sp_header = document.querySelector('.Header');
  const logo = document.querySelector('.Header_Logo img');//宣言済
  const drawerItems = document.querySelectorAll('.Menu_Item'); // ドロワー内の各アイテム

  let isMenuOpen = false;


  function toggleMenu(open) {
    isMenuOpen = open;

    // 閉じる残骸を除去
    document.body.classList.remove('menu_closing_stage1');
    document.body.classList.remove('menu_closing_stage2');

    trigger.classList.toggle('active', isMenuOpen);
    sp_header.classList.toggle('isMenuOpen', isMenuOpen);
    document.body.classList.toggle('no-scroll', isMenuOpen);

    // logo.style.display = isMenuOpen ? 'none' : '';以下で同じ処理をしているので不要

    if (isMenuOpen) {
      document.body.classList.remove('menu_closing_stage2');
      document.body.classList.add('menu_open');
      logo.style.display = 'none';
    } else {
      document.body.classList.remove('menu_open');
      logo.style.display = '';
    }
  }

  function closeMenuWithStages() {
    isMenuOpen = false;

    // トリガー・ヘッダーの状態だけ先に解除
    trigger.classList.remove('active');
    sp_header.classList.remove('isMenuOpen');
    document.body.classList.remove('no-scroll');
    // logo.style.display = '';//早すぎる

    //ここでは menu_open を消さない！ → アニメーションを見せる
    document.body.classList.add('menu_closing_stage1');

    // ステージ2
    setTimeout(() => {
      document.body.classList.remove('menu_closing_stage1');
      document.body.classList.add('menu_closing_stage2');

      setTimeout(() => {
        document.body.classList.remove('menu_closing_stage2');
        document.body.classList.remove('menu_open'); // ★最後に消す
        logo.style.display = '';//画面が完全に閉じる直前
      }, 400);
    }, 800);
  }
  trigger.addEventListener('click', () => {
    if (isMenuOpen) {
      closeMenuWithStages(); // 閉じるときは段階的に
    } else {
      document.body.classList.remove('menu_closing_stage2'); // ← 前回の残骸を掃除
      toggleMenu(true); // 開く処理
    }
  });
  //メニュー項目クリック時にも閉じる処理を追加
  drawerItems.forEach(item => {
    item.addEventListener('click', () => {
      //ハンバーガークリック時と同じテンポに合わせるため、少し遅延を入れる
      setTimeout(() => {
        closeMenuWithStages();
      }, 100); //50〜150msが自然。ハンバーガーと同じ体感に調整
    });
  });
});





//----------  VISION背景ロゴ処理  ----------//

const visionBackground = document.querySelector('.Vision_Background');
const visionSection = document.getElementById('vision');

// VISIONセクションの間だけ表示
const visionObserver = new IntersectionObserver(entries => {
  entries.forEach(entry => {
    visionBackground.style.opacity = entry.isIntersecting ? '1' : '0';
  });
}, {
  // threshold: 0.4,
  // rootMargin: '0px 0px -10% 0px'
  threshold: 0.3,//8.16
  rootMargin: '0px 0px -20% 0px'
});

if (visionSection && visionBackground) {
  visionObserver.observe(visionSection);
}





//----------　VISION テキストアニメーション  ----------//

document.addEventListener("DOMContentLoaded", () => {
  const paragraphs = document.querySelectorAll(".js-text");

  const tl = gsap.timeline({ paused: true }); // 1つのタイムラインを定義
  const overlapTime = 0.3; // 通常の重なり時間（3段落目以降）

  paragraphs.forEach((paragraph, i) => {
    const originalHTML = paragraph.innerHTML;
    const parts = originalHTML.split(/(<br[^>]*>)/); // <br>で分割

    // 各文字を <span class="char"> にラップ
    const newHTML = parts.map((part) => {
      if (part.startsWith("<br")) return part;
      return [...part].map((char) => `<span class="char">${char}</span>`).join("");
    }).join("");

    paragraph.innerHTML = newHTML;

    const spans = paragraph.querySelectorAll(".char");
    const durationPerChar = 0.18;
    const staggerTime = 0.01;

    // 段落ごとの開始タイミングを調整
    const delay =
      i === 0
        ? 0 // 最初の段落は即スタート
        : i === 1
        ? '-=0.4' // 2段落目だけ特別に早く始める
        : `-=${overlapTime}`; // それ以降は通常の重なり時間
        // : '+=0.1'; // ← 2段落目以降に少し“間”を取る

    tl.fromTo(
      spans,
      { autoAlpha: 0, y: 20 },
      { autoAlpha: 1, y: 0, duration: durationPerChar, ease: "power2.out", stagger: staggerTime },
      delay
    );
  });

  // 1回だけ再生するObserver
  const textObserver = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          tl.play();
          textObserver.disconnect(); // 全体を1回だけ再生
        }
      });
    },
    {
      threshold: 0.05,
      // rootMargin: '10% 0px 0px 0px'
    }
  );

  // 最初の段落だけ監視すればOK
  if (paragraphs[0]) {
    textObserver.observe(paragraphs[0]);
  }
});





//----------  モーダルウィンドウ  ----------//

const openButtons = document.querySelectorAll('.js-modal-open');
const closeButtons = document.querySelectorAll('.js-modal-close');

// 開くボタンにイベント付加
openButtons.forEach(button => {
  button.addEventListener('click', () => {
    const targetId = button.getAttribute('data-modal');
    const modal = document.getElementById(targetId);
    modal.classList.add('is-active');
  });
});

// 閉じるボタンにイベント付加
closeButtons.forEach(button => {
  button.addEventListener('click', () => {
    const modal = button.closest('.js-modal');
    modal.classList.remove('is-active');
  });
});

// モーダルを開くとき
// モーダルをアクティブにするだけでなく、bodyにmodal-openクラスを付けてスクロールを防止。
document.querySelectorAll('.js-modal-open').forEach(btn => {
  btn.addEventListener('click', () => {
    document.body.classList.add('modal-open');
    const modalId = btn.getAttribute('data-modal');
    document.getElementById(modalId).classList.add('is-active');
  });
});

function closeModal(modal) {
  if (modal) {
    modal.classList.remove('is-active');
    document.body.classList.remove('modal-open');
  }
}

document.querySelectorAll('.js-modal').forEach(modal => {
  modal.addEventListener('click', (e) => {
    // console.log('クリック対象:', e.target);
    if (!e.target.closest('.modal__container')) {
      closeModal(modal);
    }
  });
});

document.querySelectorAll('.js-modal-close').forEach(closeBtn => {
  closeBtn.addEventListener('click', () => {
    const modal = closeBtn.closest('.js-modal');
    closeModal(modal); // 関数化された閉じ処理に統一
  });
});

//明示的に内部コンテンツのクリックイベントを遮断（stopPropagation）する
document.querySelectorAll('.modal__container').forEach(container => {
  container.addEventListener('click', (e) => {
    e.stopPropagation(); // 背景（.js-modal）への伝播を止める
  });
});






//----------  ヘッダーロゴ・メニュー文字色用  ----------//

//背景色アニメーションで宣言済み
// const logo = document.querySelector('.Header_Logo img');
// const navLinks = document.querySelectorAll('.Header_Menu a');
const uiThemes = {
  black: {
    textColor: '#F9F9F9',
    logoSrc: 'img/logo-wh.svg'
  },
  gray: {
    textColor: '#000000',
    logoSrc: 'img/logo.svg'
  },
  white: {
    textColor: '#000000',
    logoSrc: 'img/logo.svg'
  }
};

function applyUI(themeKey) {
  const theme = uiThemes[themeKey];
  if (!theme) return;

  navLinks.forEach(link => {
    link.style.color = theme.textColor;
  });

  logo.src = theme.logoSrc; // ← 即時切り替えのみ
}

//IntersectionObserver
const observer = new IntersectionObserver(entries => {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      const uiKey = entry.target.dataset.ui;
      applyUI(uiKey);
    }
  });
}, {
  threshold: 0.1,
  rootMargin: '0px 0px -40% 0px'
});

document.querySelectorAll('[data-ui]').forEach(section => {
observer.observe(section);
});





//////////////////////////////////////
// テーマ表示インジケーター デバッグ用 //
//////////////////////////////////////

// function applyTheme(themeKey, sectionElement) {
//   const theme = themes[themeKey];
//   if (!theme) return;

//   document.body.setAttribute('data-theme', themeKey);
//   navLinks.forEach(link => {
//     link.style.color = theme.text;
//   });
//   logo.src = theme.logo;
//   document.body.style.backgroundColor = theme.bg;

//   //  現在のテーマとセクション名を画面に表示
//   const indicator = document.getElementById('theme-indicator');
//   if (indicator) {
//     const sectionName = sectionElement?.dataset.name || sectionElement?.id || '不明なセクション';
//     indicator.textContent = `現在のテーマ: ${themeKey}（${sectionName}）`;
//     indicator.style.opacity = '1';

//     clearTimeout(indicator._hideTimer);
//     indicator._hideTimer = setTimeout(() => {
//       indicator.style.opacity = '0';
//     }, 3000);
//   }
// }


//----------  MEMBER セクション アニメーション & パネル  ----------//

document.addEventListener('DOMContentLoaded', () => {

  // === メンバーの順序定義（矢印ナビ用） ===
  const memberOrder = ['kaneko', 'kawakami', 'ogawa', 'ukawa', 'inoue'];

  // === サムネイルのスクロールアニメーション ===
  const memberThumbs = document.querySelectorAll('.js-member-thumb');
  const memberFades = document.querySelectorAll('.js-member-fade');

  // サムネイルのフェードイン（スタガー付き）
  const thumbObserver = new IntersectionObserver((entries) => {
    const visibleEntries = entries.filter(e => e.isIntersecting);
    visibleEntries.forEach((entry, index) => {
      setTimeout(() => {
        entry.target.classList.add('is-visible');
      }, index * 120);
      thumbObserver.unobserve(entry.target);
    });
  }, {
    threshold: 0.1,
    rootMargin: '0px 0px -30px 0px'
  });

  memberThumbs.forEach(thumb => {
    thumbObserver.observe(thumb);
  });

  // タイトルなどのフェードイン
  const fadeObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('is-visible');
        fadeObserver.unobserve(entry.target);
      }
    });
  }, {
    threshold: 0.2,
    rootMargin: '0px 0px -30px 0px'
  });

  memberFades.forEach(el => {
    fadeObserver.observe(el);
  });


  // === メンバーパネル（右スライドイン） ===
  const thumbs = document.querySelectorAll('.js-member-thumb');
  const modals = document.querySelectorAll('.js-member-modal');

  // パネルを開く処理
  function openMemberPanel(memberId) {
    const modal = document.getElementById('memberModal-' + memberId);
    if (modal) {
      // 他のパネルが開いていれば閉じる
      modals.forEach(m => m.classList.remove('is-active'));
      modal.classList.add('is-active');
      document.body.style.overflow = 'hidden';
      document.body.classList.add('modal-open'); // ヘッダー非表示用
      // パネル内のスクロール位置をリセット
      const content = modal.querySelector('.MemberModal_Content');
      if (content) content.scrollTop = 0;
    }
  }

  // サムネイルクリック → 一瞬拡大アニメーション → パネル開く
  thumbs.forEach(thumb => {
    thumb.addEventListener('click', () => {
      const memberId = thumb.getAttribute('data-member');

      // 一瞬拡大アニメーション
      thumb.classList.add('is-clicked');
      setTimeout(() => {
        thumb.classList.remove('is-clicked');
        openMemberPanel(memberId);
      }, 250);
    });
  });

  // パネルを閉じる処理
  function closeMemberModal(modal) {
    modal.classList.remove('is-active');
    document.body.style.overflow = '';
    document.body.classList.remove('modal-open'); // ヘッダー再表示
  }

  // 閉じるボタン & オーバーレイクリック
  document.querySelectorAll('.js-member-modal-close').forEach(btn => {
    btn.addEventListener('click', () => {
      const modal = btn.closest('.js-member-modal');
      if (modal) closeMemberModal(modal);
    });
  });

  // Escキーで閉じる
  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') {
      modals.forEach(modal => {
        if (modal.classList.contains('is-active')) {
          closeMemberModal(modal);
        }
      });
    }
  });

  // === 矢印ナビゲーション（前後のメンバーに移動） ===
  document.querySelectorAll('.js-member-nav').forEach(btn => {
    btn.addEventListener('click', () => {
      const modal = btn.closest('.js-member-modal');
      if (!modal) return;

      const currentId = modal.getAttribute('data-member-id');
      const currentIndex = memberOrder.indexOf(currentId);
      if (currentIndex === -1) return;

      const dir = btn.getAttribute('data-dir');
      let nextIndex;
      if (dir === 'next') {
        nextIndex = (currentIndex + 1) % memberOrder.length;
      } else {
        nextIndex = (currentIndex - 1 + memberOrder.length) % memberOrder.length;
      }

      const nextId = memberOrder[nextIndex];
      // 現在のパネルを閉じて次を開く
      modal.classList.remove('is-active');
      openMemberPanel(nextId);
    });
  });

});

