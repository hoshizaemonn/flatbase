# Flatbase プロジェクト

このプロジェクトは、Flatbaseのウェブサイトに関するファイルを管理しています。

## プロジェクト構造

```
flatbase/
├── index.html              # メインのウェブサイト（現在使用中）
├── mail.php                # メール送信機能
├── sitemap.xml             # サイトマップ
│
├── assets/                 # 静的アセット
│   ├── icons/             # ファビコンとアイコンファイル
│   ├── browserconfig.xml  # ブラウザ設定
│   └── site.webmanifest   # Webマニフェスト
│
├── css/                    # スタイルシート
│   └── style.css
│
├── js/                     # JavaScriptファイル
│   ├── main.js
│   └── script.js
│
├── img/                    # 画像ファイル
│   ├── event/             # イベント関連画像
│   ├── free/              # フリー素材
│   ├── members/           # メンバー写真
│   ├── shin/              # 新規画像
│   ├── temp-members/      # 一時メンバー画像
│   ├── web/               # Web用画像
│   └── その他のロゴ、アイコン、背景画像など
│
├── landing-pages/          # ランディングページ（すべてのバージョン）
│   ├── flatbase_lp_v2.html
│   ├── flatbase_lp_v3.html
│   ├── flatbase_lp_v4.html
│   ├── flatbase_lp_v5.html
│   ├── flatbase_lp_latest.html
│   ├── flatbase_lp_preview.html
│   ├── page-saimer-lp.php
│   └── page-water-ig.php
│
├── contact-pages/          # コンタクトページのバリエーション
│   ├── contact.html
│   ├── contact1.html
│   ├── contact3.html
│   └── _contact.html
│
├── archive/                # 古いバックアップファイル
│   ├── _index.html
│   ├── index.html.backup
│   └── verify_final.html
│
└── reference/              # 参考資料

```

## フォルダの説明

### 📁 メインファイル
- **index.html**: 現在公開中のメインページ
- **mail.php**: お問い合わせフォームからのメール送信処理

### 📁 assets/
静的アセットを管理するフォルダ
- **icons/**: ファビコン、アプリアイコンなど

### 📁 img/
すべての画像ファイルを管理
- **event/**: イベント用画像
- **free/**: フリー素材
- **members/**: チームメンバーの写真
- **shin/**: 新しく追加された画像
- **web/**: Web用に最適化された画像

### 📁 landing-pages/
ランディングページのすべてのバージョンを保管
- v2～v5までのバージョン管理
- プレビュー版とPHPページも含む

### 📁 contact-pages/
お問い合わせページの異なるバージョン

### 📁 archive/
使用していない古いファイルやバックアップ

## 開発メモ

### 最近の更新
- 2026年2月17日: プロジェクト全体のファイル整理を実施
  - ランディングページを専用フォルダに移動
  - コンタクトページを整理
  - 画像フォルダの構造を改善
  - 不要な.DS_Storeファイルを削除

### その他の情報
- サマリードキュメント: `LANDING_PAGE_SUMMARY.md`, `UPDATE_SUMMARY.md`
- Git管理されています（`.git/`フォルダ参照）
