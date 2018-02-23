<?php

use Illuminate\Database\Seeder;

class QuestionsSeeds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $questions = [
            'Quelle heure de la journée je suis né? (hh:mm)',
            'En quelle année mon père est né?',
            'Quel étais le nom de mon premier animale?',
            'Quel étais mon meilleur jeux d\'enfance?',
            'Quel étais le nom de mon meilleur professeur?',
            'le prénom de mon premier amour?',
            'le prénom de mon meilleur amis d\'enfance?',
            'le prénom de mon favori (cousin / cousine)?',
            'Quel est le nom de l’hôpital où suis-je né?',
            'Quel numéro de téléphone que je me souviens plus de mon enfance?',
            'Quel étais mon endroit préféré a visité comme un enfant?',
            'Dans quel rue j\'ai grandi?',
            'Quel est ma couleur préférée?',
            'Quel ma favori marque de PC?'
        ];
        foreach ($questions as $question){
            \Illuminate\Support\Facades\DB::table('question_secretes')->insert([
                'question' => $question,
            ]);
        }
    }
}
