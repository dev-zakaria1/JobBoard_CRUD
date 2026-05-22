# Job Board Platform

A job posting and listing platform built with Laravel 12 and Tailwind CSS.

---

## Requirements

- PHP >= 8.2
- Composer
- MySQL / MariaDB

---

## Installation

1. **Clone the repository**
```bash
git clone https://github.com/dev-zakaria1/JobBoard_CRUD.git
```
```bash
cd JobBoard_CRUD
```
2. **Install dependencies**
```bash 
composer install
```
3. **Environment configuration**
```bash 
copy .env.example .env 
```
(Note: If you are on Linux/macOS, use cp .env.example .env instead)

4. **Generate application key**
```bash 
php artisan key:generate
```
5. **Database Migration**
```bash 
php artisan migrate
```
6. **Run the application**
```bash 
php artisan serve
```
