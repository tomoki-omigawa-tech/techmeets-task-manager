# techmeets-task-manager

techmeets Week9 練習課題1として、最初からRepository/Service/Policyパターンで構築したタスク管理アプリです。

## 構成
- `app/Models/Task.php`
- `app/Repositories/TaskRepository.php`
- `app/Services/TaskService.php`
- `app/Policies/TaskPolicy.php`
- `app/Http/Controllers/TaskController.php`

## 環境
- Laravel + Breeze（Blade）
- Docker（Nginx + PHP-FPM + MySQL + phpMyAdmin）

## 動作確認
- ユーザー登録・ログイン
- タスクの作成・一覧表示・編集・削除
- 他人のタスクは編集・削除できないこと（TaskPolicyによる403）を確認済み
