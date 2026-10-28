<?php

namespace Database\Seeders;

use App\Models\Experience;
use App\Models\Profile;
use App\Models\Project;
use App\Models\Skill;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Profile::create([
            'full_name' => 'Yaya Olatoundji Sobour',
            'job_title' => 'Développeur Web Full Stack',
            'bio'       => "Diplômé d'une Licence en Génie Logiciel à AFI L'UE, je m'intéresse à la création de solutions numériques utiles, accessibles et adaptées aux besoins réels.",
            'tags'      => 'Créatif, Curieux, En constante progression',
            'email'     => 'sobouryayaolatoundji@gmail.com',
            'phone'     => '+221 76 445 51 14',
            'github'    => 'https://github.com/YOSOBOUR',
            'linkedin'  => 'https://www.linkedin.com/in/sobour-dylan-yaya-olatoundji-146552298/',
        ]);

        $skills = [
            ['html5', 'HTML5', 'Développement', 'Intermédiaire'],
            ['css3', 'CSS3', 'Développement', 'Intermédiaire'],
            ['javascript', 'JavaScript', 'Développement', 'Intermédiaire'],
            ['react', 'React', 'Développement', 'Débutant'],
            ['php', 'PHP', 'Développement', 'Intermédiaire'],
            ['laravel', 'Laravel', 'Développement', 'Intermédiaire'],
            ['mysql', 'MySQL', 'Développement', 'Intermédiaire'],
            ['github', 'Git / GitHub', 'Outils', 'Intermédiaire'],
            ['tailwindcss', 'Tailwind CSS', 'Outils', 'Intermédiaire'],
            ['visualstudiocode', 'VS Code', 'Outils', 'Avancé'],
        ];
        foreach ($skills as $i => [$icon, $name, $category, $level]) {
            Skill::create(compact('icon', 'name', 'category', 'level') + ['sort' => $i]);
        }

        Project::create([
            'title'       => 'Mini Market',
            'description' => "Marketplace e-commerce avec gestion des rôles (admin, vendeur, client) et messagerie intégrée.",
            'tags'        => 'Laravel, MySQL, Tailwind',
            'link'        => 'https://github.com/YOSOBOUR',
            'sort'        => 0,
        ]);
        Project::create([
            'title'       => 'UrbaNova',
            'description' => "Plateforme de signalement d'incidents urbains pour soutenir l'e-gouvernance locale à Dakar.",
            'tags'        => 'PHP, MySQL, JavaScript',
            'link'        => 'https://github.com/YOSOBOUR',
            'sort'        => 1,
        ]);

        Experience::create([
            'type' => 'academic', 'title' => 'Licence en Génie Logiciel', 'organization' => "AFI L'UE",
            'period' => '2023 – 2025',
            'description' => 'Développement Fullstack, APIs, bases de données, interfaces responsives.', 'sort' => 0,
        ]);
        Experience::create([
            'type' => 'professional', 'title' => 'Stagiaire Développeur', 'organization' => 'Volkeno',
            'period' => 'Sept. 2026 – En cours',
            'description' => "Projets d'innovation, conception, développement et support technique.", 'sort' => 0,
        ]);
        Experience::create([
            'type' => 'professional', 'title' => 'Stagiaire Développeur Junior', 'organization' => 'Xarala (Dakar)',
            'period' => '2025', 'description' => 'Travail en équipe selon les méthodologies Agile.', 'sort' => 1,
        ]);
    }
}
