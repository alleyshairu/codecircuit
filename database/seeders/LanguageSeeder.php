<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Uc\Module\Language\Service\LanguageService;
use Uc\Module\Language\Request\LanguageCreateRequest;

class LanguageSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $service = new LanguageService();

        $java = new LanguageCreateRequest(
            name: 'Java',
            color: '#b07219',
            logo: 'images/java.png',
            website: 'https://www.java.com/en/',
            compilerId: 62,
            description: 'Java is a high-level, class-based, object-oriented programming language that is designed to have as few implementation dependencies as possible.'
        );

        $service->create($java);

        $php = new LanguageCreateRequest(
            name: 'PHP',
            color: '#4F5D95',
            logo: 'images/php.png',
            website: 'https://www.php.net/',
            compilerId: 68,
            description: 'A popular general-purpose scripting language that is especially suited to web development.'
        );
        $service->create($php);

        $python = new LanguageCreateRequest(
            name: 'Python',
            color: '#3572A5',
            logo: 'images/python.png',
            website: 'https://www.python.org/',
            compilerId: 71,
            description: 'Python is a programming language that lets you work quickly and integrate systems more effectively.'
        );
        $service->create($python);

        $rlang = new LanguageCreateRequest(
            name: 'R',
            color: '#198CE7',
            logo: 'images/r.png',
            compilerId: 80,
            website: 'https://www.r-project.org/',
            description: 'R is a free software environment for statistical computing and graphics.'
        );

        $service->create($rlang);
    }
}
