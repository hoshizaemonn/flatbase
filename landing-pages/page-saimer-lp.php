<?php
/**
 * Template Name: S'aimer LP
 * Description: S'aimer ランディングページ用テンプレート
 */
$img = esc_url( get_stylesheet_directory_uri() . '/img/' );
// 予約ボタンのリンク先（箱物スケジュール）※変更時はここだけ修正
$schedule_url = 'https://saimer.hacomono.jp/register/';
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>【体験無料】S'aimer｜福岡市東区 香椎の女性専用マシンピラティススタジオ</title>
<meta name="description" content="福岡市東区・香椎駅徒歩4分の女性専用マシンピラティススタジオS'aimer。今なら体験レッスン無料＆即日入会で入会金0円・初月50%OFF！">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@300;400;500;700;900&family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;0,700;1,400&family=Noto+Serif+JP:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
<style>
/* ===== RESET ===== */
*,*::before,*::after{margin:0;padding:0;box-sizing:border-box}
:root{
  --gold:#b8964e;--gold-light:#d4b876;--gold-dark:#9a7b3c;
  --dark:#1a1a1a;--dark-bg:#3a3632;--dark-bg2:#4a433d;
  --cream:#faf7f2;--cream-dark:#f0ebe3;--white:#fff;
  --text:#555;--text-dark:#333;--text-light:#999;
  --accent-red:#c0392b;
  --shadow:0 4px 24px rgba(0,0,0,0.06);
  --shadow-gold:0 4px 20px rgba(184,150,78,0.25);
  --radius:16px;
  --transition:all 0.4s cubic-bezier(0.25,0.46,0.45,0.94);
}
html{scroll-behavior:smooth;font-size:16px}
body{font-family:'Noto Sans JP',sans-serif;color:var(--text);background:var(--white);line-height:1.9;font-weight:300;overflow-x:hidden;-webkit-font-smoothing:antialiased}
img{max-width:100%;height:auto;display:block}
a{text-decoration:none;color:inherit}

/* ===== UTILITY ===== */
.inner{max-width:720px;margin:0 auto;padding:0 24px}
.inner-wide{max-width:960px;margin:0 auto;padding:0 24px}
.eng{font-family:'Cormorant Garamond',serif;font-size:.72rem;letter-spacing:.3em;text-transform:uppercase;color:var(--gold);text-align:center;display:block;margin-bottom:6px}
.sh{text-align:center;font-family:'Noto Serif JP',serif;font-size:1.45rem;font-weight:500;color:var(--text-dark);letter-spacing:.1em;line-height:1.7;margin-bottom:12px}
.hl{width:32px;height:1px;background:var(--gold);margin:0 auto 48px}
.fade{opacity:0;transform:translateY(28px);transition:opacity .7s ease,transform .7s ease}
.fade.v{opacity:1;transform:translateY(0)}

/* ===== FIXED SIDE CTA (pilates K style) ===== */
.side-cta{position:fixed;right:0;top:50%;transform:translateY(-50%);z-index:999;display:none;flex-direction:column;gap:2px}
.side-cta a{display:flex;flex-direction:column;align-items:center;justify-content:center;width:72px;padding:18px 8px;font-size:.58rem;font-weight:700;letter-spacing:.05em;text-align:center;color:var(--white);transition:var(--transition);line-height:1.4}
.side-cta .sc-trial{background:linear-gradient(180deg,var(--gold),var(--gold-dark));border-radius:var(--radius) 0 0 0}
.side-cta .sc-tel{background:var(--dark-bg);border-radius:0 0 0 var(--radius)}
.side-cta a:hover{width:82px}
.side-cta .sc-icon{font-size:1.3rem;margin-bottom:4px}
.side-cta .sc-big{font-size:.82rem;font-weight:900;letter-spacing:0}

/* ===== FLOATING CTA (MOBILE) ===== */
.fl-cta{position:fixed;bottom:0;left:0;right:0;z-index:1000;background:rgba(255,255,255,.96);backdrop-filter:blur(12px);-webkit-backdrop-filter:blur(12px);padding:10px 16px 14px;box-shadow:0 -2px 20px rgba(0,0,0,.1);display:flex;gap:8px;justify-content:center;transform:translateY(100%);opacity:0;transition:var(--transition)}
.fl-cta.show{transform:translateY(0);opacity:1}
.fl-cta a{flex:1;max-width:180px;display:flex;align-items:center;justify-content:center;gap:6px;padding:14px 8px;border-radius:50px;font-size:.78rem;font-weight:700;transition:var(--transition)}
.fl-p{background:var(--gold);color:var(--white)}.fl-p:hover{background:var(--gold-dark)}
.fl-s{background:var(--dark-bg);color:var(--white)}.fl-s:hover{background:var(--dark)}

/* ===== HERO (the SILK inspired full-screen visual) ===== */
.hero{position:relative;min-height:100vh;min-height:100svh;display:flex;flex-direction:column;justify-content:center;align-items:center;background:var(--dark-bg);color:var(--white);text-align:center;padding:60px 24px 100px;overflow:hidden}
.hero-bg{position:absolute;inset:0;background:url('<?php echo $img; ?>038.jpg') center/cover no-repeat;opacity:.35}
.hero::before{content:'';position:absolute;inset:0;background:linear-gradient(160deg,rgba(58,54,50,.92),rgba(40,36,32,.82));z-index:1}
.hero>*:not(.hero-bg){position:relative;z-index:2}
.hero-logo{font-family:'Cormorant Garamond',serif;font-size:3.2rem;font-weight:400;letter-spacing:.12em;line-height:1.2;margin-bottom:4px}
.hero-logo-sub{font-size:.6rem;letter-spacing:.4em;color:var(--gold-light);margin-bottom:36px}
.hero-badge{display:inline-flex;align-items:center;gap:6px;background:var(--accent-red);padding:8px 24px;border-radius:50px;font-size:.72rem;font-weight:700;letter-spacing:.08em;margin-bottom:28px;animation:pulse 2.5s ease infinite}
@keyframes pulse{0%,100%{box-shadow:0 0 0 0 rgba(192,57,43,.4)}50%{box-shadow:0 0 0 12px rgba(192,57,43,0)}}
.hero h1{font-family:'Noto Serif JP',serif;font-size:1.5rem;font-weight:400;line-height:2.2;letter-spacing:.12em;margin-bottom:8px}
.hero h1 .em{font-size:2.6rem;font-weight:700;color:var(--gold-light)}
.hero-sub{font-size:.82rem;color:rgba(255,255,255,.55);letter-spacing:.08em;margin-bottom:32px}
.hero-benefits{display:flex;gap:10px;flex-wrap:wrap;justify-content:center;margin-bottom:36px;max-width:480px}
.hb{flex:1;min-width:130px;background:rgba(184,150,78,.12);border:1px solid rgba(184,150,78,.28);border-radius:14px;padding:16px 12px;text-align:center;backdrop-filter:blur(4px)}
.hb-label{font-size:.62rem;color:var(--gold-light);letter-spacing:.08em;margin-bottom:4px}
.hb-val{font-family:'Cormorant Garamond',serif;font-size:2rem;font-weight:700;line-height:1.2}
.hb-val small{font-size:.85rem;font-weight:400}
.hb-unit{font-size:.68rem;opacity:.7}
.hero-cta{width:100%;max-width:340px}
.btn-gold{display:block;width:100%;padding:17px 16px;border-radius:50px;font-size:1rem;font-weight:700;text-align:center;letter-spacing:.05em;transition:var(--transition);background:linear-gradient(135deg,var(--gold),var(--gold-light));color:var(--white);box-shadow:var(--shadow-gold)}
.btn-gold:hover{transform:translateY(-2px);box-shadow:0 8px 32px rgba(184,150,78,.4)}
.btn-gold .btn-sm{display:block;font-size:.68rem;font-weight:400;margin-bottom:2px;opacity:.85}
.hero-note{font-size:.68rem;color:rgba(255,255,255,.35);margin-top:10px}

/* ===== CAMPAIGN STRIP ===== */
.camp{background:linear-gradient(135deg,var(--gold),#c9a855,var(--gold-light));color:var(--white);padding:36px 24px}
.camp-inner{max-width:680px;margin:0 auto;display:flex;flex-direction:column;gap:12px}
.camp-title{text-align:center;font-size:.75rem;letter-spacing:.18em;border:1px solid rgba(255,255,255,.45);display:inline-block;padding:4px 20px;border-radius:50px;margin:0 auto 8px}
.camp-cards{display:flex;flex-direction:column;gap:10px}
.cc{background:rgba(255,255,255,.14);border-radius:14px;padding:18px 20px;display:flex;align-items:center;gap:16px;backdrop-filter:blur(6px)}
.cc-num{font-family:'Cormorant Garamond',serif;font-size:.68rem;letter-spacing:.2em;opacity:.7;white-space:nowrap}
.cc-body{flex:1}
.cc-title{font-size:1.05rem;font-weight:700;line-height:1.4}
.cc-title .big{font-family:'Cormorant Garamond',serif;font-size:1.8rem;font-weight:700}
.cc-note{font-size:.7rem;opacity:.8;margin-top:2px}

/* ===== FULL-WIDTH IMAGE BREAK (the SILK style) ===== */
.img-break{position:relative;height:380px;overflow:hidden}
.img-break img{width:100%;height:100%;object-fit:cover}
.img-break-overlay{position:absolute;inset:0;background:linear-gradient(to bottom,rgba(58,54,50,.5),rgba(58,54,50,.7));display:flex;flex-direction:column;justify-content:center;align-items:center;color:var(--white);text-align:center;padding:24px}
.img-break-overlay .ib-eng{font-family:'Cormorant Garamond',serif;font-size:2.2rem;font-weight:300;letter-spacing:.15em;margin-bottom:8px;line-height:1.3}
.img-break-overlay .ib-jp{font-family:'Noto Serif JP',serif;font-size:.92rem;font-weight:300;letter-spacing:.15em;line-height:2}

/* ===== SECTION ===== */
section{padding:80px 0}

/* ===== PAIN POINTS ===== */
.pain{background:var(--cream)}
.pain-list{list-style:none;max-width:520px;margin:0 auto 40px}
.pain-list li{padding:15px 0;border-bottom:1px solid rgba(0,0,0,.06);font-size:.92rem;font-weight:400;color:var(--text-dark);display:flex;align-items:flex-start;gap:14px}
.pain-list .ck{flex-shrink:0;width:22px;height:22px;border-radius:50%;background:var(--gold);color:var(--white);display:flex;align-items:center;justify-content:center;font-size:.7rem;margin-top:2px}
.pain-ans{text-align:center;margin-top:40px;font-family:'Noto Serif JP',serif;font-size:1.1rem;font-weight:500;color:var(--text-dark);line-height:2}
.pain-ans .g{color:var(--gold);font-weight:700}

/* ===== CONCEPT (with photo) ===== */
.concept{position:relative;overflow:hidden}
.concept-grid{display:flex;flex-direction:column;gap:32px}
.concept-img{border-radius:var(--radius);overflow:hidden;height:260px}
.concept-img img{width:100%;height:100%;object-fit:cover}
.concept-text{text-align:center;font-size:.9rem;line-height:2.3}
.concept-text .hl-text{color:var(--gold);font-weight:500}
.concept-quote{background:var(--cream);border-radius:var(--radius);padding:32px 28px;text-align:center;font-family:'Noto Serif JP',serif;font-size:.92rem;font-weight:400;color:var(--text-dark);line-height:2.2;border-left:3px solid var(--gold);margin-top:32px}
.concept-quote .gtext{color:var(--gold);font-weight:600}

/* ===== MID CTA ===== */
.mid-cta{background:var(--dark-bg);text-align:center;padding:48px 24px;color:var(--white)}
.mid-cta-text{font-family:'Noto Serif JP',serif;font-size:1.05rem;font-weight:400;margin-bottom:4px;letter-spacing:.06em}
.mid-cta-sub{font-size:.75rem;color:var(--gold-light);margin-bottom:20px}
.btn-mid{display:inline-block;background:linear-gradient(135deg,var(--gold),var(--gold-light));color:var(--white);padding:15px 48px;border-radius:50px;font-weight:700;font-size:.92rem;box-shadow:var(--shadow-gold);transition:var(--transition)}
.btn-mid:hover{transform:translateY(-2px);box-shadow:0 8px 28px rgba(184,150,78,.4)}

/* ===== SERVICES (with photos, pilates K style) ===== */
.services{background:var(--cream)}
.svc-grid{display:flex;flex-direction:column;gap:20px}
.svc-card{background:var(--white);border-radius:var(--radius);overflow:hidden;box-shadow:var(--shadow);transition:var(--transition)}
.svc-card:hover{transform:translateY(-3px);box-shadow:0 8px 32px rgba(0,0,0,.1)}
.svc-photo{height:200px;overflow:hidden}
.svc-photo img{width:100%;height:100%;object-fit:cover;transition:transform .6s ease}
.svc-card:hover .svc-photo img{transform:scale(1.05)}
.svc-body{padding:24px}
.svc-body h3{font-size:1.05rem;font-weight:700;color:var(--text-dark);margin-bottom:8px;display:flex;align-items:center;gap:8px}
.svc-body h3 .svc-icon{width:28px;height:28px;border-radius:8px;background:linear-gradient(135deg,var(--gold),var(--gold-light));color:var(--white);display:flex;align-items:center;justify-content:center;font-size:.85rem;flex-shrink:0}
.svc-body p{font-size:.85rem;line-height:1.9}

/* ===== REASONS (pilates K 01/02/03 with big photos) ===== */
.reason{margin-bottom:56px;display:flex;flex-direction:column}
.reason:last-child{margin-bottom:0}
.reason-photo{width:100%;height:280px;border-radius:var(--radius);overflow:hidden;margin-bottom:24px;position:relative}
.reason-photo img{width:100%;height:100%;object-fit:cover}
.reason-photo .rp-num{position:absolute;bottom:16px;left:20px;font-family:'Cormorant Garamond',serif;font-size:4rem;font-weight:300;color:rgba(255,255,255,.85);line-height:1;text-shadow:0 2px 12px rgba(0,0,0,.3)}
.reason h3{font-family:'Noto Serif JP',serif;font-size:1.15rem;font-weight:600;color:var(--text-dark);margin-bottom:12px;line-height:1.7}
.reason p{font-size:.88rem;line-height:2}

/* ===== PHOTO GALLERY STRIP (the SILK style) ===== */
.gallery-strip{padding:48px 0;overflow-x:auto;-webkit-overflow-scrolling:touch}
.gallery-row{display:flex;gap:12px;padding:0 24px;width:max-content}
.gallery-row img{width:220px;height:300px;object-fit:cover;border-radius:12px;flex-shrink:0}

/* ===== TESTIMONIALS ===== */
.testi{background:var(--cream)}
.testi-grid{display:flex;flex-direction:column;gap:16px}
.testi-card{background:var(--white);border-radius:var(--radius);padding:28px 24px;box-shadow:var(--shadow);position:relative}
.testi-card::before{content:'\201C';font-family:'Cormorant Garamond',serif;font-size:4.5rem;color:var(--gold);opacity:.2;position:absolute;top:4px;left:16px;line-height:1}
.testi-text{font-size:.86rem;line-height:2;margin-bottom:16px;position:relative;z-index:1}
.testi-meta{display:flex;align-items:center;gap:12px}
.testi-av{width:40px;height:40px;border-radius:50%;background:var(--gold);color:var(--white);display:flex;align-items:center;justify-content:center;font-family:'Cormorant Garamond',serif;font-size:1rem;font-weight:600}
.testi-name{font-size:.82rem;font-weight:500;color:var(--text-dark)}
.testi-detail{font-size:.7rem;color:var(--text-light)}

/* ===== INSTRUCTOR (with large photo, the SILK style) ===== */
.instructor{background:var(--dark-bg);color:var(--white)}
.instructor .sh{color:var(--white)}
.inst-flex{display:flex;flex-direction:column;align-items:center;gap:32px}
.inst-photo{width:200px;height:200px;border-radius:50%;overflow:hidden;border:3px solid var(--gold);flex-shrink:0}
.inst-photo img{width:100%;height:100%;object-fit:cover}
.inst-text{text-align:center}
.inst-name{font-family:'Cormorant Garamond',serif;font-size:1.5rem;font-weight:600;letter-spacing:.08em}
.inst-role{font-size:.72rem;color:var(--gold-light);letter-spacing:.1em;margin-bottom:24px}
.inst-msg{font-size:.86rem;line-height:2.4;font-weight:300;max-width:500px;margin:0 auto}
.inst-msg .em{color:var(--gold-light);font-weight:500}

/* ===== FLOW (with small photos) ===== */
.flow{background:var(--cream)}
.flow-steps{max-width:520px;margin:0 auto}
.flow-step{display:flex;gap:20px;margin-bottom:32px;position:relative}
.flow-step:not(:last-child)::after{content:'';position:absolute;left:23px;top:56px;width:1px;height:calc(100% - 24px);background:linear-gradient(180deg,var(--gold),transparent)}
.fs-circle{width:48px;height:48px;border-radius:50%;background:var(--white);border:2px solid var(--gold);color:var(--gold);display:flex;align-items:center;justify-content:center;font-family:'Cormorant Garamond',serif;font-size:1.1rem;font-weight:600;flex-shrink:0}
.flow-step h3{font-size:1rem;font-weight:700;color:var(--text-dark);margin-bottom:4px;padding-top:10px}
.flow-step p{font-size:.82rem;color:var(--text-light);line-height:1.8}

/* ===== PRICING (pilates K style strikethrough) ===== */
.price-cards{display:flex;flex-direction:column;gap:16px}
.pc{border:2px solid var(--cream-dark);border-radius:var(--radius);overflow:hidden;background:var(--white);transition:var(--transition)}
.pc.pop{border-color:var(--gold);box-shadow:0 8px 32px rgba(184,150,78,.12)}
.pc-head{padding:18px 20px;text-align:center;background:var(--cream)}
.pc.pop .pc-head{background:linear-gradient(135deg,var(--gold),var(--gold-light));color:var(--white)}
.pc-head h3{font-size:1rem;font-weight:700}
.pc-head .dur{font-size:.75rem;opacity:.8}
.pc-body{padding:24px 20px;text-align:center}
.pc-old{font-size:.82rem;color:var(--text-light);text-decoration:line-through;margin-bottom:4px}
.pc-new{font-size:1rem;font-weight:700;color:var(--accent-red);margin-bottom:4px}
.pc-new .big{font-family:'Cormorant Garamond',serif;font-size:2.6rem;font-weight:700}
.pc-note{font-size:.7rem;color:var(--text-light)}

/* ===== FAQ ===== */
.faq{background:var(--cream)}
.faq-list{max-width:600px;margin:0 auto}
.fq-item{background:var(--white);border-radius:12px;margin-bottom:10px;box-shadow:0 1px 6px rgba(0,0,0,.03);overflow:hidden}
.fq-q{width:100%;border:none;background:none;padding:18px 20px;font-size:.9rem;font-weight:500;color:var(--text-dark);text-align:left;cursor:pointer;display:flex;align-items:center;gap:12px;font-family:'Noto Sans JP',sans-serif;transition:background .3s}
.fq-q:hover{background:var(--cream)}
.fq-q .qm{font-family:'Cormorant Garamond',serif;font-size:1.2rem;font-weight:600;color:var(--gold);flex-shrink:0}
.fq-q .tg{margin-left:auto;font-size:1.3rem;color:var(--gold);transition:transform .3s;flex-shrink:0}
.fq-item.open .fq-q .tg{transform:rotate(45deg)}
.fq-a{max-height:0;overflow:hidden;transition:max-height .35s ease}
.fq-a-inner{padding:0 20px 18px 52px;font-size:.84rem;line-height:1.9;color:var(--text)}

/* ===== ACCESS (with photo) ===== */
.access-grid{display:flex;flex-direction:column;gap:24px}
.access-photo{border-radius:var(--radius);overflow:hidden;height:200px}
.access-photo img{width:100%;height:100%;object-fit:cover}
.access-box{background:var(--cream);border-radius:var(--radius);padding:32px 24px;text-align:center}
.access-box h3{font-family:'Cormorant Garamond',serif;font-size:1.3rem;font-weight:600;color:var(--text-dark);letter-spacing:.08em;margin-bottom:16px}
.access-detail{font-size:.86rem;line-height:2.2}
.access-detail .g{color:var(--gold);font-weight:500}
.access-map{border-radius:var(--radius);overflow:hidden;box-shadow:var(--shadow)}
.access-map iframe{width:100%;height:280px;border:none}

/* ===== FINAL CTA ===== */
.final-cta{background:linear-gradient(160deg,var(--dark-bg),var(--dark-bg2));color:var(--white);text-align:center;padding:80px 24px 130px}
.final-cta .sh{color:var(--white)}
.fb-row{display:flex;flex-direction:column;gap:10px;max-width:420px;margin:0 auto 32px}
.fb{background:rgba(184,150,78,.1);border:1px solid rgba(184,150,78,.22);border-radius:14px;padding:16px 20px;display:flex;align-items:center;gap:14px}
.fb-icon{width:38px;height:38px;border-radius:50%;background:var(--gold);color:var(--white);display:flex;align-items:center;justify-content:center;font-size:1rem;flex-shrink:0}
.fb-text{font-size:.88rem;font-weight:500;text-align:left;line-height:1.5}
.fb-text span{font-family:'Cormorant Garamond',serif;font-size:1.5rem;font-weight:700;color:var(--gold-light)}
.final-btns{display:flex;flex-direction:column;gap:10px;max-width:340px;margin:0 auto}
.btn-final{display:block;padding:17px 20px;border-radius:50px;font-size:1rem;font-weight:700;text-align:center;transition:var(--transition)}
.bf-gold{background:linear-gradient(135deg,var(--gold),var(--gold-light));color:var(--white);box-shadow:var(--shadow-gold)}
.bf-gold:hover{transform:translateY(-2px);box-shadow:0 8px 32px rgba(184,150,78,.45)}
.bf-outline{border:1.5px solid rgba(255,255,255,.25);color:var(--white)}
.bf-outline:hover{background:rgba(255,255,255,.08)}
.final-note{font-size:.68rem;color:rgba(255,255,255,.35);margin-top:16px}

/* ===== FOOTER ===== */
footer{background:var(--dark);color:rgba(255,255,255,.4);text-align:center;padding:28px 20px 90px;font-size:.68rem}
footer .f-logo{font-family:'Cormorant Garamond',serif;font-size:1.3rem;color:var(--white);margin-bottom:2px;letter-spacing:.1em}
footer .f-sub{font-size:.58rem;letter-spacing:.15em;margin-bottom:10px}

/* ===== RESPONSIVE ===== */
@media(min-width:768px){
  .hero h1{font-size:2rem}.hero h1 .em{font-size:3.2rem}
  .sh{font-size:1.7rem}
  .camp-cards{flex-direction:row}.cc{flex:1;flex-direction:column;text-align:center;gap:8px}
  .svc-grid{display:grid;grid-template-columns:1fr 1fr;gap:20px}
  .reason{flex-direction:row;gap:40px;align-items:center}
  .reason:nth-child(even){flex-direction:row-reverse}
  .reason-photo{width:50%;min-width:320px;height:300px;margin-bottom:0;flex-shrink:0}
  .reason-text{flex:1}
  .testi-grid{flex-direction:row}.testi-card{flex:1}
  .price-cards{flex-direction:row}.pc{flex:1}
  .fb-row{flex-direction:row;max-width:680px}.fb{flex:1}
  .side-cta{display:flex}
  .fl-cta{display:none!important}
  .inst-flex{flex-direction:row;text-align:left;gap:48px;max-width:640px;margin:0 auto}
  .inst-text{text-align:left}
  .inst-photo{width:220px;height:220px}
  .concept-grid{flex-direction:row;align-items:center;gap:40px}
  .concept-img{width:40%;min-width:280px;height:320px;flex-shrink:0}
  .concept-text-wrap{flex:1}
  .access-grid{flex-direction:row;align-items:stretch}
  .access-photo{width:40%;height:auto;min-height:250px;flex-shrink:0}
  .access-info{flex:1;display:flex;flex-direction:column;gap:16px}
  .gallery-row img{width:280px;height:380px}
  .img-break{height:440px}
  .img-break-overlay .ib-eng{font-size:3rem}
}
</style>
<?php wp_head(); ?>
</head>
<body>
<?php wp_body_open(); ?>

<!-- SIDE CTA (pilates K style) -->
<div class="side-cta">
  <a href="<?php echo esc_url( $schedule_url ); ?>" class="sc-trial"><span class="sc-icon">&#9998;</span><span>TRIAL</span><span class="sc-big">体験予約</span></a>
  <a href="tel:092-692-4930" class="sc-tel"><span class="sc-icon">&#9742;</span><span>TEL</span><span class="sc-big">電話相談</span></a>
</div>

<!-- FLOATING CTA (MOBILE) -->
<div class="fl-cta" id="flCta">
  <a href="<?php echo esc_url( $schedule_url ); ?>" class="fl-p">
    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
    無料体験を予約
  </a>
  <a href="tel:092-692-4930" class="fl-s">
    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72"/></svg>
    電話で相談
  </a>
</div>

<!-- ===== HERO ===== -->
<section class="hero">
  <div class="hero-bg"></div>
  <div>
    <div class="hero-logo">S'aimer</div>
    <div class="hero-logo-sub">PILATES STUDIO &amp; AROMA SALON</div>
  </div>
  <div class="hero-badge">&#9733; 期間限定キャンペーン実施中</div>
  <h1>週1回のピラティスで<br>姿勢もココロも<br><span class="em">ピン</span>ッと上向きに</h1>
  <p class="hero-sub">福岡市東区・香椎駅 徒歩4分 ｜ 女性専用マシンピラティス</p>
  <div class="hero-benefits">
    <div class="hb"><div class="hb-label">体験レッスン</div><div class="hb-val">0<small>円</small></div><div class="hb-unit">今だけ無料</div></div>
    <div class="hb"><div class="hb-label">即日入会で入会金</div><div class="hb-val">0<small>円</small></div><div class="hb-unit">通常料金から免除</div></div>
    <div class="hb"><div class="hb-label">さらに初月</div><div class="hb-val">50<small>%</small></div><div class="hb-unit">OFF</div></div>
  </div>
  <div class="hero-cta">
    <a href="<?php echo esc_url( $schedule_url ); ?>" class="btn-gold"><span class="btn-sm">たった30秒で完了</span>無料体験レッスンを予約する</a>
  </div>
  <p class="hero-note">※ 強引な勧誘は一切ございません</p>
</section>

<!-- ===== CAMPAIGN STRIP ===== -->
<div class="camp">
  <div class="camp-inner">
    <div class="camp-title">&#10047; 今だけの3大特典 &#10047;</div>
    <div class="camp-cards">
      <div class="cc"><div class="cc-num">01</div><div class="cc-body"><div class="cc-title">体験レッスン <span class="big">0</span>円</div><div class="cc-note">通常¥3,000〜の体験が今だけ完全無料</div></div></div>
      <div class="cc"><div class="cc-num">02</div><div class="cc-body"><div class="cc-title">入会金 <span class="big">0</span>円</div><div class="cc-note">体験当日のご入会で入会金を全額免除</div></div></div>
      <div class="cc"><div class="cc-num">03</div><div class="cc-body"><div class="cc-title">初月 <span class="big">50</span>%OFF</div><div class="cc-note">初月のレッスン料が半額でスタート</div></div></div>
    </div>
  </div>
</div>

<!-- ===== PAIN POINTS ===== -->
<section class="pain fade">
  <div class="inner">
    <span class="eng">Your Worries</span>
    <h2 class="sh">こんなお悩み、<br>ありませんか？</h2>
    <div class="hl"></div>
    <ul class="pain-list">
      <li><span class="ck">&#10003;</span>姿勢が悪いのが気になるけど、どうすればいいかわからない</li>
      <li><span class="ck">&#10003;</span>運動不足で体が重い…でもジムはハードルが高い</li>
      <li><span class="ck">&#10003;</span>肩こり・腰痛がつらくて、根本から改善したい</li>
      <li><span class="ck">&#10003;</span>産後の体型変化が戻らず、スタイルに自信がない</li>
      <li><span class="ck">&#10003;</span>もっとキレイになる自分時間が欲しい</li>
      <li><span class="ck">&#10003;</span>子連れだとレッスンに通えないと諦めている</li>
    </ul>
    <div class="pain-ans">ひとつでも当てはまるなら<br><span class="g">S'aimerにお任せください。</span><br>あなたの「変わりたい」に<br>寄り添うピラティススタジオです。</div>
  </div>
</section>

<!-- ===== IMAGE BREAK 1 (the SILK style) ===== -->
<div class="img-break fade">
  <img src="<?php echo $img; ?>014.jpg" alt="S'aimerスタジオ内装">
  <div class="img-break-overlay">
    <div class="ib-eng">Be Yourself,<br>Be Beautiful.</div>
    <div class="ib-jp">前向きで自分らしい美しさを</div>
  </div>
</div>

<!-- ===== CONCEPT ===== -->
<section class="concept fade">
  <div class="inner">
    <span class="eng">Concept</span>
    <h2 class="sh">前向きで<br>自分らしい美しさを</h2>
    <div class="hl"></div>
    <div class="concept-grid">
      <div class="concept-img">
        <img src="<?php echo $img; ?>015.jpg" alt="S'aimerスタジオ">
      </div>
      <div class="concept-text-wrap">
        <p class="concept-text">
          仕事や家事など、毎日忙しい女性には<br>ご褒美時間が必要です。<br><br>
          <span class="hl-text">S'aimerは、そんな女性のためのパワースポット。</span><br><br>
          元気な日はもちろん、落ち込んでいる日でも<br>帰る頃にはまた頑張ろうと思っていただけるスタジオを目指しています。
        </p>
      </div>
    </div>
    <div class="concept-quote">
      ピラティスを通して得られる、<br>まっすぐピンッと伸びた姿勢。<br>
      レインドロップでリラックスして生まれる、<br>心からの笑顔。<br><br>
      <span class="gtext">身体も心もスッキリ元気になる、<br>そんな時間を提供します。</span>
    </div>
  </div>
</section>

<!-- ===== MID CTA 1 ===== -->
<div class="mid-cta">
  <p class="mid-cta-text">まずは一度、体験してみませんか？</p>
  <p class="mid-cta-sub">今なら体験レッスンが無料で受けられます</p>
  <a href="<?php echo esc_url( $schedule_url ); ?>" class="btn-mid">無料体験を予約する</a>
</div>

<!-- ===== SERVICES (with photos) ===== -->
<section class="services fade">
  <div class="inner">
    <span class="eng">Service</span>
    <h2 class="sh">S'aimerのサービス</h2>
    <div class="hl"></div>
    <div class="svc-grid">
      <div class="svc-card">
        <div class="svc-photo"><img src="<?php echo $img; ?>080.jpg" alt="マシンピラティス"></div>
        <div class="svc-body">
          <h3><span class="svc-icon">&#9671;</span>マシンピラティス</h3>
          <p>インナーマッスルを強化し、体のバランスを整えます。背筋がピンと伸びた姿勢や、しなやかで引き締まったスタイルを目指す方におすすめです。</p>
        </div>
      </div>
      <div class="svc-card">
        <div class="svc-photo"><img src="<?php echo $img; ?>016.jpg" alt="レインドロップ"></div>
        <div class="svc-body">
          <h3><span class="svc-icon">&#9826;</span>レインドロップ</h3>
          <p>エッセンシャルオイルを背中に贅沢に垂らすアロマヒーリング。心身のリフレッシュやご褒美時間に最適です。</p>
        </div>
      </div>
      <div class="svc-card">
        <div class="svc-photo"><img src="<?php echo $img; ?>040.jpg" alt="スタイルアップ矯正"></div>
        <div class="svc-body">
          <h3><span class="svc-icon">&#10023;</span>スタイルアップ矯正</h3>
          <p>全身の歪みを改善し、痩せやすく美しいスタイルに導く施術。体型の変化や基礎代謝の低下が気になる方に。</p>
        </div>
      </div>
      <div class="svc-card">
        <div class="svc-photo"><img src="<?php echo $img; ?>020.jpg" alt="小顔矯正・アロマ"></div>
        <div class="svc-body">
          <h3><span class="svc-icon">&#10038;</span>小顔矯正</h3>
          <p>リンパの流れを良くし、表情筋の緊張や血行不良を改善。お顔を本来の大きさに戻します。</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ===== REASONS (pilates K style with big photos) ===== -->
<section class="fade">
  <div class="inner">
    <span class="eng">Why S'aimer?</span>
    <h2 class="sh">S'aimerのピラティスが<br>選ばれる3つの理由</h2>
    <div class="hl"></div>

    <div class="reason">
      <div class="reason-photo">
        <img src="<?php echo $img; ?>098.jpg" alt="一人一人に合わせた指導">
        <div class="rp-num">01</div>
      </div>
      <div class="reason-text">
        <h3>一人一人の特徴に合わせた<br>効果的なエクササイズ</h3>
        <p>姿勢や体の状態をしっかり見た上で、必要なエクササイズを提供します。お休みしてしまっている筋肉、使いすぎている部分を観察しながら、細かくトレーニングを提案できるのが強みです。だからこそ、続けることでバランスの良い引き締まった体やキレイな姿勢が手に入ります。</p>
      </div>
    </div>

    <div class="reason">
      <div class="reason-photo">
        <img src="<?php echo $img; ?>060.jpg" alt="テーマを設定">
        <div class="rp-num">02</div>
      </div>
      <div class="reason-text">
        <h3>キレイを毎日キープできる<br>テーマを設定</h3>
        <p>キレイな姿勢を保つのに必要なのは、適切なレッスンだけではありません。長い時間筋肉を使う、日常での意識を高めることも大切です。S'aimerでは、次のレッスンまでに意識して欲しいテーマを一人一人お伝え。1つでも意識して日常を過ごすことで、よりキレイをキープしやすくなります。</p>
      </div>
    </div>

    <div class="reason">
      <div class="reason-photo">
        <img src="<?php echo $img; ?>052.jpg" alt="子連れOK">
        <div class="rp-num">03</div>
      </div>
      <div class="reason-text">
        <h3>子連れOKだから通いやすい</h3>
        <p>レッスンに通いたいけれども、お子様の様子が心配という方もご安心ください。S'aimerでは、子連れでのレッスンも歓迎しています。お子様を預けられないからレッスンに通えない、と諦める必要はありません！ ぜひご一緒にお越しください。</p>
      </div>
    </div>
  </div>
</section>

<!-- ===== PHOTO GALLERY STRIP (the SILK style) ===== -->
<div class="gallery-strip fade">
  <div class="gallery-row">
    <img src="<?php echo $img; ?>035.jpg" alt="ピラティスレッスン">
    <img src="<?php echo $img; ?>085.jpg" alt="リフォーマーレッスン">
    <img src="<?php echo $img; ?>105.jpg" alt="マシンピラティス">
    <img src="<?php echo $img; ?>075.jpg" alt="グループレッスン">
    <img src="<?php echo $img; ?>100.jpg" alt="マンツーマン指導">
    <img src="<?php echo $img; ?>025.jpg" alt="リフォーマーマシン">
    <img src="<?php echo $img; ?>092.jpg" alt="スタジオ風景">
  </div>
</div>

<!-- ===== TESTIMONIALS ===== -->
<section class="testi fade">
  <div class="inner">
    <span class="eng">Customer Reviews</span>
    <h2 class="sh">お客様の声</h2>
    <div class="hl"></div>
    <div class="testi-grid">
      <div class="testi-card">
        <p class="testi-text">運動不足解消と美容・健康維持のために、ピラティスを受講しています。マンツーマンで丁寧に指導をしてもらえたので、初心者の私でも安心して取り組めました。レッスン後は心も身体もスッキリします。トレーナーさんとの楽しい会話もモチベーションの一つです！</p>
        <div class="testi-meta"><div class="testi-av">E</div><div><div class="testi-name">emi さま</div><div class="testi-detail">30代 会社員</div></div></div>
      </div>
      <div class="testi-card">
        <p class="testi-text">効果を継続するためにも、定期的に通いたいです。身体の変化を実感でき、姿勢が良くなったと周りからも言われるようになりました。毎回のレッスンが楽しみで、通うことが自分へのご褒美になっています。</p>
        <div class="testi-meta"><div class="testi-av">Y</div><div><div class="testi-name">Y.A さま</div><div class="testi-detail">30代 保育士</div></div></div>
      </div>
    </div>
  </div>
</section>

<!-- ===== MID CTA 2 ===== -->
<div class="mid-cta">
  <p class="mid-cta-text">私も変われるかも…と思ったあなたへ</p>
  <p class="mid-cta-sub">体験は無料。まずはお気軽にお試しください</p>
  <a href="<?php echo esc_url( $schedule_url ); ?>" class="btn-mid">無料体験を予約する</a>
</div>

<!-- ===== INSTRUCTOR (the SILK style with large photo) ===== -->
<section class="instructor fade">
  <div class="inner">
    <span class="eng" style="color:var(--gold-light)">Message</span>
    <h2 class="sh">代表挨拶</h2>
    <div class="hl" style="background:var(--gold-light)"></div>
    <div class="inst-flex">
      <div class="inst-photo"><img src="<?php echo $img; ?>048.jpg" alt="SATOMI"></div>
      <div class="inst-text">
        <div class="inst-name">SATOMI</div>
        <div class="inst-role">S'aimer 代表</div>
        <p class="inst-msg">
          私はピラティスに出会って、人生がもっと楽しくなりました。続けることで姿勢や体調がどんどん変わっていき、自分らしく生きられるようになったからです。<br><br>
          ピラティスを薦めた友人もまた、身体が変わっていき、笑顔に。<br><br>
          この経験から、<span class="em">「ピラティスをきっかけに、自分らしく笑顔で生きる女性を増やしたい」</span>という思いで、日々レッスンに向き合っています。<br><br>
          S'aimerは、そんな女性を増やすためのピラティススタジオです。
        </p>
      </div>
    </div>
  </div>
</section>

<!-- ===== IMAGE BREAK 2 ===== -->
<div class="img-break fade">
  <img src="<?php echo $img; ?>090.jpg" alt="S'aimerレッスン風景">
  <div class="img-break-overlay">
    <div class="ib-eng">Your Body,<br>Your Confidence.</div>
    <div class="ib-jp">身体が変われば、自信も変わる</div>
  </div>
</div>

<!-- ===== FLOW ===== -->
<section class="flow fade">
  <div class="inner">
    <span class="eng">Trial Lesson Flow</span>
    <h2 class="sh">体験レッスンの流れ</h2>
    <div class="hl"></div>
    <div class="flow-steps">
      <div class="flow-step"><div class="fs-circle">1</div><div><h3>ご来店</h3><p>予約時間の10分前までに店舗にお越しください。香椎駅から徒歩4分、3Fがスタジオです。</p></div></div>
      <div class="flow-step"><div class="fs-circle">2</div><div><h3>ヒアリング・姿勢チェック</h3><p>お身体の状態のヒアリングと姿勢のチェックに基づき、体験のプランを作成します。</p></div></div>
      <div class="flow-step"><div class="fs-circle">3</div><div><h3>体験レッスン</h3><p>実際にピラティスを体験いただきます。負荷を調整しますので、運動が苦手な方もご安心ください。</p></div></div>
      <div class="flow-step"><div class="fs-circle">4</div><div><h3>アフターカウンセリング</h3><p>レッスン前後の身体の変化を一緒に観察。感想や不安があれば、ぜひ教えてください。</p></div></div>
    </div>
  </div>
</section>

<!-- ===== PRICING (pilates K style) ===== -->
<section class="fade">
  <div class="inner">
    <span class="eng">Price</span>
    <h2 class="sh">料金プラン</h2>
    <div class="hl"></div>
    <div class="price-cards">
      <div class="pc pop">
        <div class="pc-head"><h3>プライベートレッスン</h3><div class="dur">60分 ｜ マンツーマン</div></div>
        <div class="pc-body">
          <div class="pc-old">通常体験価格 ¥3,000</div>
          <div class="pc-new">体験 <span class="big">0</span>円<small>（税込）</small></div>
          <div class="pc-note">通常レッスン ¥25,000/月（月4回）</div>
        </div>
      </div>
      <div class="pc">
        <div class="pc-head"><h3>スタイルアップ矯正<br>＋ ピラティス</h3><div class="dur">90分 ｜ マンツーマン</div></div>
        <div class="pc-body">
          <div class="pc-old">通常体験価格 ¥4,000</div>
          <div class="pc-new">体験 <span class="big">0</span>円<small>（税込）</small></div>
          <div class="pc-note">通常レッスン ¥30,000/月（月4回）</div>
        </div>
      </div>
    </div>
    <p style="text-align:center;margin-top:24px;font-size:.78rem;color:var(--text-light);line-height:1.9">
      ※ 即日入会で<strong style="color:var(--accent-red)">入会金0円</strong> + <strong style="color:var(--accent-red)">初月レッスン料50%OFF</strong><br>
      ※ レインドロップ・小顔矯正の体験もございます
    </p>
  </div>
</section>

<!-- ===== FAQ ===== -->
<section class="faq fade">
  <div class="inner">
    <span class="eng">FAQ</span>
    <h2 class="sh">よくあるご質問</h2>
    <div class="hl"></div>
    <div class="faq-list">
      <div class="fq-item"><button class="fq-q" onclick="toggleFaq(this)"><span class="qm">Q</span><span>運動経験がなく自信がないのですが、私にもできますか？</span><span class="tg">+</span></button><div class="fq-a"><div class="fq-a-inner">はい、もちろんです！ S'aimerでは一人一人に合わせたマンツーマン指導を行いますので、運動が苦手な方や初心者の方でも安心して取り組めます。</div></div></div>
      <div class="fq-item"><button class="fq-q" onclick="toggleFaq(this)"><span class="qm">Q</span><span>どれくらいの期間で効果を実感できますか？</span><span class="tg">+</span></button><div class="fq-a"><div class="fq-a-inner">個人差はありますが、多くの方が1回のレッスンで姿勢の変化を実感されています。継続的な変化は、週1回のペースで2〜3ヶ月ほどで感じていただける方が多いです。</div></div></div>
      <div class="fq-item"><button class="fq-q" onclick="toggleFaq(this)"><span class="qm">Q</span><span>子連れでも大丈夫ですか？</span><span class="tg">+</span></button><div class="fq-a"><div class="fq-a-inner">はい、お子様連れ大歓迎です！ お子様を預けられない方も、ぜひご一緒にお越しください。</div></div></div>
      <div class="fq-item"><button class="fq-q" onclick="toggleFaq(this)"><span class="qm">Q</span><span>怪我があるのですが、トレーニングできますか？</span><span class="tg">+</span></button><div class="fq-a"><div class="fq-a-inner">ピラティスはリハビリとしても活用されています。体験時にヒアリングを行い、お身体に合わせたプランをご提案しますので、まずはお気軽にご相談ください。</div></div></div>
      <div class="fq-item"><button class="fq-q" onclick="toggleFaq(this)"><span class="qm">Q</span><span>体験当日に入会を決めなくても大丈夫ですか？</span><span class="tg">+</span></button><div class="fq-a"><div class="fq-a-inner">もちろんです。じっくりご検討いただいて構いません。強引な勧誘は一切行っておりません。ただし、即日入会で入会金0円＆初月50%OFFの特典が適用されます。</div></div></div>
      <div class="fq-item"><button class="fq-q" onclick="toggleFaq(this)"><span class="qm">Q</span><span>体験レッスンを受講するにはどうすればいいですか？</span><span class="tg">+</span></button><div class="fq-a"><div class="fq-a-inner">このページの「無料体験を予約する」ボタン、またはお電話（092-692-4930）にてご予約ください。</div></div></div>
    </div>
  </div>
</section>

<!-- ===== ACCESS (with photo) ===== -->
<section class="fade">
  <div class="inner">
    <span class="eng">Access</span>
    <h2 class="sh">アクセス</h2>
    <div class="hl"></div>
    <div class="access-grid">
      <div class="access-photo"><img src="<?php echo $img; ?>001.jpg" alt="S'aimerビル外観"></div>
      <div class="access-info">
        <div class="access-box">
          <h3>S'aimer</h3>
          <div class="access-detail">
            〒813-0013<br>
            福岡市東区香椎駅前2丁目9-15（3F）<br><br>
            <span class="g">&#9670; 香椎駅から徒歩4分</span><br><br>
            電話番号：092-692-4930<br>
            営業時間：10:00〜20:00<br>
            定休日：日曜日
          </div>
        </div>
        <div class="access-map">
          <iframe src="https://www.google.com/maps?q=福岡市東区香椎駅前2丁目9-15&output=embed" loading="lazy"></iframe>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ===== FINAL CTA ===== -->
<section class="final-cta" id="reserve">
  <div class="inner">
    <span class="eng" style="color:var(--gold-light)">Reserve</span>
    <h2 class="sh">あなたの「変わりたい」を<br>S'aimerが全力でサポートします</h2>
    <div class="hl" style="background:var(--gold-light)"></div>
    <div class="fb-row">
      <div class="fb"><div class="fb-icon">&#10003;</div><div class="fb-text">体験レッスン<br><span>0</span>円</div></div>
      <div class="fb"><div class="fb-icon">&#10003;</div><div class="fb-text">即日入会で入会金<br><span>0</span>円</div></div>
      <div class="fb"><div class="fb-icon">&#10003;</div><div class="fb-text">さらに初月<br><span>50%</span>OFF</div></div>
    </div>
    <div class="final-btns">
      <a href="<?php echo esc_url( $schedule_url ); ?>" class="btn-final bf-gold">無料体験レッスンを予約する</a>
      <a href="tel:092-692-4930" class="btn-final bf-outline">電話で相談する（092-692-4930）</a>
    </div>
    <p class="final-note">※ 強引な勧誘は一切ございません ※ 営業時間 10:00〜20:00（日曜定休）</p>
  </div>
</section>

<!-- FOOTER -->
<footer>
  <div class="f-logo">S'aimer</div>
  <div class="f-sub">PILATES STUDIO &amp; AROMA SALON</div>
  <p>&copy; S'aimer. All Rights Reserved.</p>
</footer>

<script>
function toggleFaq(btn){
  const item=btn.parentElement;
  const ans=item.querySelector('.fq-a');
  const isOpen=item.classList.contains('open');
  document.querySelectorAll('.fq-item').forEach(el=>{el.classList.remove('open');el.querySelector('.fq-a').style.maxHeight='0'});
  if(!isOpen){item.classList.add('open');ans.style.maxHeight=ans.scrollHeight+'px'}
}
const fc=document.getElementById('flCta');
window.addEventListener('scroll',()=>{if(window.scrollY>500)fc.classList.add('show');else fc.classList.remove('show')});
const obs=new IntersectionObserver(entries=>{entries.forEach(e=>{if(e.isIntersecting){e.target.classList.add('v');obs.unobserve(e.target)}})},{threshold:.12});
document.querySelectorAll('.fade').forEach(el=>obs.observe(el));
</script>
<?php wp_footer(); ?>
</body>
</html>
