# UCLearn Code 

[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](./LICENSE)

UCLearn Code is a friendly open source online platform for learning programming languages. The primary goal of the project is to create a system for university lecturers to prepare different levels of programming puzzles for their studens to solve.

For enhancing student engagement and motivation the application will integrate game design elements (such as scores, leaderboards) to make learning more interactive and enjoyable. Additionally, students can provide their feedback on allowing instructors imporve the problems.

UCLearn Code is built with modern technologies such as Laravel, Tailwind etc.

**Note:** Currently, this project in under development, and no stable version is released.

## Requirements

* PHP: 8.3 or higher
* Database: PostgreSQL
* Web Server: (Nginx, Apache)

## Installation

* Install [Composer](https://getcomposer.org/download), [Npm](https://nodejs.org/en/download), and [Make](https://www.gnu.org/software/make/)
* Clone the repository: `git clone https://github.com/alleyshairu/uclearncode.git`
* Install php dependencies: `composer install;`
* Install npm dependencies: `npm install;`
* Setup your .env with correct database details

## Development

* Create a test database named `uclearncode_test`. (Only required for running tests)
* Start the vite server using `npm run dev` for frontend assets
* Start the PHP server using `php artisan serve` or use a webserver such as Nginx or Apache
* Run `make check` to format, lint and run tests
* Have fun!

## Contributing

When contributing code to UCLearn Code, you must follow the PSR coding standards, and all your code is properly type hinted. The code must pass
through all the defined linter checks.

Also, please be very clear on your commit messages and pull requests.

## License

UCLearn Code is open-sourced software licensed under the [MIT license](LICENSE.md).
