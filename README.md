# Laravel Job Board

![Laravel Version](https://img.shields.io/badge/Laravel-13.x-FF2D20?style=flat-square&logo=laravel&logoColor=white)
![PHP Version](https://img.shields.io/badge/PHP-8.3%2B-777BB4?style=flat-square&logo=php&logoColor=white)
![Composer Version](https://img.shields.io/badge/Composer-2.x-885630?style=flat-square&logo=composer&logoColor=white)
![MySQL Version](https://img.shields.io/badge/MySQL-9.x-4479A1?style=flat-square&logo=mysql&logoColor=white)
![Node.js Version](https://img.shields.io/badge/Node.js-26.x-5FA04E?style=flat-square&logo=node.js&logoColor=white)
[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg?style=flat-square)](LICENSE)

<a href="https://github.com/mdinehin/laravel-job-board/actions/workflows/tests.yml"><img src="https://github.com/mdinehin/laravel-job-board/workflows/Tests/badge.svg" alt="Tests"></a>
<a href="https://github.com/mdinehin/laravel-job-board/actions/workflows/coding-standards.yml"><img src="https://github.com/mdinehin/laravel-job-board/actions/workflows/coding-standards.yml/badge.svg" alt="Coding Standards"></a>

A full-stack Laravel recruitment platform built with Eloquent, policy-driven authorization, Blade components, Tailwind CSS, and Alpine.js.

## Preview

![Application demo walkthrough](https://github.com/user-attachments/assets/446b5d55-763a-433f-af2a-a0aaf368dbd1)

## Features

- Job Discovery and Search: Filter vacancies by keyword, company name, category, experience level, and salary range via Eloquent query scopes, with clickable card tags and Alpine.js search controls.
- Employer Vacancy Management: Create employer profiles and manage vacancies (`create`, `edit`, `update`, `destroy`) with form request validation, soft deletes, and support for trashed vacancies.
- Candidate Applications and CV Storage: Submit and withdraw job applications, block duplicate applications on the same vacancy, and store uploaded CVs on a dedicated local storage disk.
- Authorization and UI Components: Guard actions with Laravel policies and middleware, paired with modular Blade components and Tailwind CSS.

## Prerequisites

The following software dependencies are required:

- PHP 8.3+
- [Composer](https://getcomposer.org/download/)
- [MySQL](https://www.mysql.com/downloads/)
- [Node.js](https://nodejs.org/en/download)

## Installation

1. Clone the repository `git clone https://github.com/mdinehin/laravel-job-board.git`
2. Install PHP dependencies `composer install`
3. Install Node.js dependencies `npm install`
4. Copy the `.env.example` file to `.env` and fill in the database credentials
5. Generate the application key `php artisan key:generate`
6. Run database migrations `php artisan migrate`
7. Seed the database `php artisan db:seed`
8. Start the local server `php artisan serve`
9. Start the Vite asset development server `npm run dev`

Open [http://127.0.0.1:8000](http://127.0.0.1:8000) in your browser to access the application.

## Commands

| Command | Description |
| --- | --- |
| `php artisan test` | Run the tests |
| `php artisan migrate:fresh --seed` | Reset the database |
| `composer types:check` | Perform static code analysis |
