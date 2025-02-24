# CodeIgniter 4 To-Do App

## What is To-Do App?

A To-Do App is a task management application designed to help users organize, track, and manage their daily tasks efficiently. It provides features such as task creation, editing, and deletion, along with options to set deadlines, priorities, and categories. Some To-Do Apps also include reminders, notifications, and collaboration tools to enhance productivity.

This repository contains a simple and user-friendly To-Do App built using modern web technologies. It allows users to add tasks, mark them as completed, and remove them when no longer needed. The goal of this project is to provide an intuitive interface for task management while ensuring smooth performance and ease of use.

More information about the features and usage can be found in the [official documentation](#). The source code is available in this repository, and contributions or suggestions are always welcome.

You can read the [user guide](#) to explore more about how to use the application effectively.

## Setup

Copy `env` to `.env` and tailor for your app, specifically the baseURL
and any database settings.

## Repository Management

We use GitHub issues, in our main repository, to track **BUGS** and to track approved **DEVELOPMENT** work packages.
We use Discord [server](http://discord.gg/wZEYMUZSZ7) to provide SUPPORT and to discuss
FEATURE REQUESTS.

This repository is a "distribution" one, built by our release preparation script.
Problems with it can be raised on our server, or as issues in the main repository.

## Server Requirements

PHP version 8.1 or higher is required, with the following extensions installed:

- [intl](http://php.net/manual/en/intl.requirements.php)
- [mbstring](http://php.net/manual/en/mbstring.installation.php)

> [!WARNING]
> - The end of life date for PHP 7.4 was November 28, 2022.
> - The end of life date for PHP 8.0 was November 26, 2023.
> - If you are still using PHP 7.4 or 8.0, you should upgrade immediately.
> - The end of life date for PHP 8.1 will be December 31, 2025.

Additionally, make sure that the following extensions are enabled in your PHP:

- json (enabled by default - don't turn it off)
- [mysqlnd](http://php.net/manual/en/mysqlnd.install.php) if you plan to use MySQL
- [libcurl](http://php.net/manual/en/curl.requirements.php) if you plan to use the HTTP\CURLRequest library
