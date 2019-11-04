<?php

use Illuminate\Database\Seeder;

use App\Discipline;

class CorequisiteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $disciplines = Discipline::get();
        
        foreach($disciplines as $keyA => $disciplineA) {
            $idsArray = [];

            // Estatística -> Cál. II
            if($disciplineA->name == "CÁLCULO II" ||
                $disciplineA->name == "CÁLCULO II (Virtual)" ||
                $disciplineA->name == "CÁLCULO DIFERENCIAL E INTEGRAL II") {
                foreach($disciplines as $keyB => $disciplineB) {
                    if($disciplineB->name == "ESTATÍSTICA E PROBABILIDADE" ||
                        $disciplineB->name == "ESTATÍSTICA E PROBABILIDADE (Virtual)" ||
                        $disciplineB->name == "PROBABILIDADE E ESTATÍSTICA (Virtual)" ||
                        $disciplineB->name == "ESTATÍSTICA BÁSICA" ||
                        $disciplineB->name == "MÉTODOS DE ANÁLISE ESTATÍSTICA") {
                        array_push($idsArray, $disciplineB['id']);
                    }
                }
            }

            // LPA -> Estatística 
            else if($disciplineA->name == "ESTATÍSTICA E PROBABILIDADE" ||
                $disciplineA->name == "ESTATÍSTICA E PROBABILIDADE (Virtual)" ||
                $disciplineA->name == "PROBABILIDADE E ESTATÍSTICA (Virtual)" ||
                $disciplineA->name == "ESTATÍSTICA BÁSICA" ||
                $disciplineA->name == "MÉTODOS DE ANÁLISE ESTATÍSTICA") {
                foreach($disciplines as $keyB => $disciplineB) {
                    if($disciplineB->name == "LABORATÓRIO DE PROJETO DE ALGORITMOS") {
                        array_push($idsArray, $disciplineB['id']);
                    }
                }
            }

            // PAA -> Estatística
            else if($disciplineA->name == "ESTATÍSTICA E PROBABILIDADE" ||
                $disciplineA->name == "ESTATÍSTICA E PROBABILIDADE (Virtual)" ||
                $disciplineA->name == "PROBABILIDADE E ESTATÍSTICA (Virtual)" ||
                $disciplineA->name == "ESTATÍSTICA BÁSICA" ||
                $disciplineA->name == "MÉTODOS DE ANÁLISE ESTATÍSTICA") {
                foreach($disciplines as $keyB => $disciplineB) {
                    if($disciplineB->name == "PROJETO E ANÁLISE DE ALGORITMOS") {
                        array_push($idsArray, $disciplineB['id']);
                    }
                }
            }

            $disciplineA->corequisite()->sync($idsArray);
        }
    }
}
