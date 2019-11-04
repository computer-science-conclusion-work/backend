<?php

use Illuminate\Database\Seeder;

use App\Discipline;

class PrerequisiteTableSeeder extends Seeder
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

            // AEDs II -> AEDs I
            if($disciplineA->name == "ALGORITMOS E ESTRUTURAS DE DADOS II") {
                foreach($disciplines as $keyB => $disciplineB) {
                    if($disciplineB->name == "ALGORITMOS E ESTRUTURAS DE DADOS I") {
                        array_push($idsArray, $disciplineB['id']);
                    }
                }
            }

            // AC I -> AEDs I
            else if($disciplineA->name == "ARQUITETURA DE COMPUTADORES I" ||
                $disciplineA->name == "ARQUITETURA DE COMPUTADORES" ||
                $disciplineA->name == "ARQUITETURA E ORGANIZAÇÃO DE COMPUTADORES I") {
                foreach($disciplines as $keyB => $disciplineB) {
                    if($disciplineB->name == "ALGORITMOS E ESTRUTURAS DE DADOS I") {
                        array_push($idsArray, $disciplineB['id']);
                    }
                }
            }

            // Cál. II -> Cál. I
            else if($disciplineA->name == "CÁLCULO II" ||
                $disciplineA->name == "CÁLCULO II (Virtual)" ||
                $disciplineA->name == "CÁLCULO DIFERENCIAL E INTEGRAL II") {
                foreach($disciplines as $keyB => $disciplineB) {
                    if($disciplineB->name == "CÁLCULO I" ||
                        $disciplineB->name == "CALCULO I" ||
                        $disciplineB->name == "CÁLCULO I (Virtual)" ||
                        $disciplineB->name == "CÁLCULO DIFERENCIAL E INTEGRAL I" ||
                        $disciplineB->name == "CÁLCULO NUMÉRICO" ||
                        $disciplineB->name == "FUNDAMENTOS DE CÁLCULO") {
                        array_push($idsArray, $disciplineB['id']);
                    }
                }
            }

            // Sem. II -> AEDs I
            else if($disciplineA->name == "SEMINÁRIOS II" ||
                $disciplineA->name == "SEMINÁRIO II") {
                foreach($disciplines as $keyB => $disciplineB) {
                    if($disciplineB->name == "ALGORITMOS E ESTRUTURAS DE DADOS I") {
                        array_push($idsArray, $disciplineB['id']);
                    }
                }
            }

            // AEDs III -> AEDs II
            else if($disciplineA->name == "ALGORITMOS E ESTRUTURAS DE DADOS III") {
                foreach($disciplines as $keyB => $disciplineB) {
                    if($disciplineB->name == "ALGORITMOS E ESTRUTURAS DE DADOS II") {
                        array_push($idsArray, $disciplineB['id']);
                    }
                }
            }

            // AC II -> AC I
            else if($disciplineA->name == "ARQUITETURA DE COMPUTADORES II" ||
                $disciplineA->name == "ARQUITETURA E ORGANIZAÇÃO DE COMPUTADORES II"||
                $disciplineA->name == "COMPLEMENTAÇÃO ARQUITETURA DE COMPUTADORES II") {
                foreach($disciplines as $keyB => $disciplineB) {
                    if($disciplineB->name == "ARQUITETURA DE COMPUTADORES I" ||
                        $disciplineB->name == "ARQUITETURA DE COMPUTADORES" ||
                        $disciplineB->name == "ARQUITETURA E ORGANIZAÇÃO DE COMPUTADORES I") {
                        array_push($idsArray, $disciplineB['id']);
                    }
                }
            }

            // Cál. III -> Cál. II
            else if($disciplineA->name == "CÁLCULO III" ||
                $disciplineA->name == "CALCULO III") {
                foreach($disciplines as $keyB => $disciplineB) {
                    if($disciplineB->name == "CÁLCULO II" ||
                        $disciplineB->name == "CÁLCULO II (Virtual)" ||
                        $disciplineB->name == "CÁLCULO DIFERENCIAL E INTEGRAL II") {
                        array_push($idsArray, $disciplineB['id']);
                    }
                }
            }

            // Empreend. -> AEDs II
            else if($disciplineA->name == "EMPREENDEDORISMO E PLANO DE NEGÓCIOS" ||
                $disciplineA->name == "EMPREENDEDORISMO E PLANO DE NEGÓCIOS (Virtual)" ||
                $disciplineA->name == "ADMINISTRAÇÃO E EMPREENDEDORISMO" ||
                $disciplineA->name == "EMPREENDEDORISMO") {
                foreach($disciplines as $keyB => $disciplineB) {
                    if($disciplineB->name == "ALGORITMOS E ESTRUTURAS DE DADOS II") {
                        array_push($idsArray, $disciplineB['id']);
                    }
                }
            }

            // IPI -> AEDs II
            else if($disciplineA->name == "INTRODUÇÃO À PESQUISA EM INFORMÁTICA" ||
                $disciplineA->name == "INICIAÇÃO À PESQUISA EM CIÊNCIA DA COMPUTAÇÃO") {
                foreach($disciplines as $keyB => $disciplineB) {
                    if($disciplineB->name == "ALGORITMOS E ESTRUTURAS DE DADOS II") {
                        array_push($idsArray, $disciplineB['id']);
                    }
                }
            }

            // LAC -> AC I
            else if($disciplineA->name == "LABORATÓRIO DE ARQUITETURA DE COMPUTADORES") {
                foreach($disciplines as $keyB => $disciplineB) {
                    if($disciplineB->name == "ARQUITETURA DE COMPUTADORES I" ||
                        $disciplineB->name == "ARQUITETURA DE COMPUTADORES" ||
                        $disciplineB->name == "ARQUITETURA E ORGANIZAÇÃO DE COMPUTADORES I") {
                        array_push($idsArray, $disciplineB['id']);
                    }
                }
            }

            // MD -> AEDs II
            else if($disciplineA->name == "MATEMÁTICA DISCRETA" ||
                $disciplineA->name == "MATEMÁTICA DISCRETA I" ||
                $disciplineA->name == "MATEMÁTICA DISCRETA II") {
                foreach($disciplines as $keyB => $disciplineB) {
                    if($disciplineB->name == "ALGORITMOS E ESTRUTURAS DE DADOS II") {
                        array_push($idsArray, $disciplineB['id']);
                    }
                }
            }

            // AL -> GA
            else if($disciplineA->name == "ÁLGEBRA LINEAR" ||
                $disciplineA->name == "ALGEBRA LINEAR") {
                foreach($disciplines as $keyB => $disciplineB) {
                    if($disciplineB->name == "GEOMETRIA ANALÍTICA" ||
                        $disciplineB->name == "GEOMETRIA ANÁLITICA (Virtual)" ||
                        $disciplineB->name == "GEOMETRIA ANALÍTICA I" ||
                        $disciplineB->name == "ANÁLISE VETORIAL E GEOMETRIA ANALÍTICA (AVGA) (Virtual)") {
                        array_push($idsArray, $disciplineB['id']);
                    }
                }
            }

            // Grafos -> AEDs II
            else if($disciplineA->name == "ALGORITMOS EM GRAFOS" ||
                $disciplineA->name == "GRAFOS E TEORIA DA COMPLEXIDADE") {
                foreach($disciplines as $keyB => $disciplineB) {
                    if($disciplineB->name == "ALGORITMOS E ESTRUTURAS DE DADOS II") {
                        array_push($idsArray, $disciplineB['id']);
                    }
                }
            }

            // AC III -> AC II
            else if($disciplineA->name == "ARQUITETURA DE COMPUTADORES III") {
                foreach($disciplines as $keyB => $disciplineB) {
                    if($disciplineB->name == "ARQUITETURA DE COMPUTADORES II" ||
                        $disciplineB->name == "ARQUITETURA E ORGANIZAÇÃO DE COMPUTADORES II"||
                        $disciplineB->name == "COMPLEMENTAÇÃO ARQUITETURA DE COMPUTADORES II") {
                        array_push($idsArray, $disciplineB['id']);
                    }
                }
            }

            // BD -> AEDs I
            else if($disciplineA->name == "BANCOS DE DADOS" ||
                $disciplineA->name == "BANCOS DE DADOS I" ||
                $disciplineA->name == "BANCOS DE DADOS II" ||
                $disciplineA->name == "COMPLEMENTAÇÃO BANCO DE DADOS II") {
                foreach($disciplines as $keyB => $disciplineB) {
                    if($disciplineB->name == "ALGORITMOS E ESTRUTURAS DE DADOS I") {
                        array_push($idsArray, $disciplineB['id']);
                    }
                }
            }

            // ES I -> AEDs II
            else if($disciplineA->name == "ENGENHARIA DE SOFTWARE II" ||
                $disciplineA->name == "ENGENHARIA SOFTWARE II") {
                foreach($disciplines as $keyB => $disciplineB) {
                    if($disciplineB->name == "ALGORITMOS E ESTRUTURAS DE DADOS II") {
                        array_push($idsArray, $disciplineB['id']);
                    }
                }
            }

            // LDDM -> AEDs II
            else if($disciplineA->name == "LABORATÓRIO DE DESENVOLVIMENTO PARA DISPOSITIVOS MÓVEIS") {
                foreach($disciplines as $keyB => $disciplineB) {
                    if($disciplineB->name == "ALGORITMOS E ESTRUTURAS DE DADOS II") {
                        array_push($idsArray, $disciplineB['id']);
                    }
                }
            }

            // ES II -> ES I
            else if($disciplineA->name == "ENGENHARIA DE SOFTWARE II" ||
                $disciplineA->name == "ENGENHARIA SOFTWARE II") {
                foreach($disciplines as $keyB => $disciplineB) {
                    if($disciplineB->name == "ENGENHARIA DE SOFTWARE I" ||
                        $disciplineB->name == "ENGENHARIA DE SOFTWARE" ||
                        $disciplineB->name == "TÓPICOS ESPECIAIS EM ENGENHARIA DE COMPUTAÇÃO I" ||
                        $disciplineB->name == "INTRODUÇÃO À ENGENHARIA" ||
                        $disciplineB->name == "INTRODUÇÃO À ENGENHARIA DE COMPUTAÇÃO" ||
                        $disciplineB->name == "FUNDAMENTOS DE ENGENHARIA DE SOFTWARE") {
                        array_push($idsArray, $disciplineB['id']);
                    }
                }
            }

            // FTC -> AEDs II
            // FTC -> MD
            else if($disciplineA->name == "FUNDAMENTOS TEÓRICOS DA COMPUTAÇÃO" ||
                $disciplineA->name == "TEORIA DE LINGUAGENS") {
                foreach($disciplines as $keyB => $disciplineB) {
                    if($disciplineB->name == "ALGORITMOS E ESTRUTURAS DE DADOS II") {
                        array_push($idsArray, $disciplineB['id']);
                    } else if($disciplineB->name == "MATEMÁTICA DISCRETA" ||
                        $disciplineB->name == "MATEMÁTICA DISCRETA I" ||
                        $disciplineB->name == "MATEMÁTICA DISCRETA II") {
                        array_push($idsArray, $disciplineB['id']);
                    }
                }
            }

            // LPA -> AEDs III
            // LPA -> Grafos
            else if($disciplineA->name == "LABORATÓRIO DE PROJETO DE ALGORITMOS") {
                foreach($disciplines as $keyB => $disciplineB) {
                    if($disciplineB->name == "ALGORITMOS E ESTRUTURAS DE DADOS III") {
                        array_push($idsArray, $disciplineB['id']);
                    } else if($disciplineB->name == "ALGORITMOS EM GRAFOS" ||
                        $disciplineB->name == "GRAFOS E TEORIA DA COMPLEXIDADE") {
                        array_push($idsArray, $disciplineB['id']);
                    }
                }
            }

            // LP -> AEDs II
            else if($disciplineA->name == "LINGUAGENS DE PROGRAMAÇÃO") {
                foreach($disciplines as $keyB => $disciplineB) {
                    if($disciplineB->name == "ALGORITMOS E ESTRUTURAS DE DADOS II") {
                        array_push($idsArray, $disciplineB['id']);
                    }
                }
            }

            // PAA -> AEDs III
            // PAA -> Grafos
            else if($disciplineA->name == "PROJETO E ANÁLISE DE ALGORITMOS") {
                foreach($disciplines as $keyB => $disciplineB) {
                    if($disciplineB->name == "ALGORITMOS E ESTRUTURAS DE DADOS III") {
                        array_push($idsArray, $disciplineB['id']);
                    } else if($disciplineB->name == "ALGORITMOS EM GRAFOS" ||
                        $disciplineB->name == "GRAFOS E TEORIA DA COMPLEXIDADE") {
                        array_push($idsArray, $disciplineB['id']);
                    }
                }
            }

            // SO -> AEDs II
            // SO -> AC III
            else if($disciplineA->name == "SISTEMAS OPERACIONAIS") {
                foreach($disciplines as $keyB => $disciplineB) {
                    if($disciplineB->name == "ALGORITMOS E ESTRUTURAS DE DADOS II") {
                        array_push($idsArray, $disciplineB['id']);
                    } else if($disciplineB->name == "ARQUITETURA DE COMPUTADORES III") {
                        array_push($idsArray, $disciplineB['id']);
                    }
                }
            }

            // CG -> AEDs II
            // CG -> GA
            else if($disciplineA->name == "COMPUTAÇÃO GRÁFICA") {
                foreach($disciplines as $keyB => $disciplineB) {
                    if($disciplineB->name == "ALGORITMOS E ESTRUTURAS DE DADOS II") {
                        array_push($idsArray, $disciplineB['id']);
                    } else if($disciplineB->name == "GEOMETRIA ANALÍTICA" ||
                        $disciplineB->name == "GEOMETRIA ANÁLITICA (Virtual)" ||
                        $disciplineB->name == "GEOMETRIA ANALÍTICA I" ||
                        $disciplineB->name == "ANÁLISE VETORIAL E GEOMETRIA ANALÍTICA (AVGA) (Virtual)") {
                        array_push($idsArray, $disciplineB['id']);
                    }
                }
            }

            // CP -> AEDs III
            // CP -> AC III
            else if($disciplineA->name == "COMPUTAÇÃO PARALELA" ||
                $disciplineA->name == "COMPUTAÇÃO PARALELA - A (Virtual)" ||
                $disciplineA->name == "COMPUTAÇÃO PARALELA - B") {
                foreach($disciplines as $keyB => $disciplineB) {
                    if($disciplineB->name == "ALGORITMOS E ESTRUTURAS DE DADOS III") {
                        array_push($idsArray, $disciplineB['id']);
                    } else if($disciplineB->name == "ARQUITETURA DE COMPUTADORES III") {
                        array_push($idsArray, $disciplineB['id']);
                    }
                }
            }

            // ES III -> BD
            // ES III -> ES I
            else if($disciplineA->name == "ENGENHARIA DE SOFTWARE III") {
                foreach($disciplines as $keyB => $disciplineB) {
                    if($disciplineB->name == "BANCOS DE DADOS" ||
                        $disciplineB->name == "BANCOS DE DADOS I" ||
                        $disciplineB->name == "BANCOS DE DADOS II" ||
                        $disciplineB->name == "COMPLEMENTAÇÃO BANCO DE DADOS II") {
                        array_push($idsArray, $disciplineB['id']);
                    } else if($disciplineB->name == "ENGENHARIA DE SOFTWARE I" ||
                        $disciplineB->name == "ENGENHARIA DE SOFTWARE" ||
                        $disciplineB->name == "TÓPICOS ESPECIAIS EM ENGENHARIA DE COMPUTAÇÃO I" ||
                        $disciplineB->name == "INTRODUÇÃO À ENGENHARIA" ||
                        $disciplineB->name == "INTRODUÇÃO À ENGENHARIA DE COMPUTAÇÃO" ||
                        $disciplineB->name == "FUNDAMENTOS DE ENGENHARIA DE SOFTWARE") {
                        array_push($idsArray, $disciplineB['id']);
                    }
                }
            }

            // LPS -> BD
            // LPS -> ES I
            else if($disciplineA->name == "LABORATÓRIO DE PROJETO DE SISTEMAS") {
                foreach($disciplines as $keyB => $disciplineB) {
                    if($disciplineB->name == "BANCOS DE DADOS" ||
                        $disciplineB->name == "BANCOS DE DADOS I" ||
                        $disciplineB->name == "BANCOS DE DADOS II" ||
                        $disciplineB->name == "COMPLEMENTAÇÃO BANCO DE DADOS II") {
                        array_push($idsArray, $disciplineB['id']);
                    } else if($disciplineB->name == "ENGENHARIA DE SOFTWARE I" ||
                        $disciplineB->name == "ENGENHARIA DE SOFTWARE" ||
                        $disciplineB->name == "TÓPICOS ESPECIAIS EM ENGENHARIA DE COMPUTAÇÃO I" ||
                        $disciplineB->name == "INTRODUÇÃO À ENGENHARIA" ||
                        $disciplineB->name == "INTRODUÇÃO À ENGENHARIA DE COMPUTAÇÃO" ||
                        $disciplineB->name == "FUNDAMENTOS DE ENGENHARIA DE SOFTWARE") {
                        array_push($idsArray, $disciplineB['id']);
                    }
                }
            }

            // PI -> AEDs III
            // PI -> Estatística
            else if($disciplineA->name == "PROCESSAMENTO DE IMAGENS" ||
                    $disciplineA->name == "PROCESSAMENTO DE IMAGENS DIGITAIS") {
                foreach($disciplines as $keyB => $disciplineB) {
                    if($disciplineB->name == "ALGORITMOS E ESTRUTURAS DE DADOS III") {
                        array_push($idsArray, $disciplineB['id']);
                    } else if($disciplineB->name == "ESTATÍSTICA E PROBABILIDADE" ||
                        $disciplineB->name == "ESTATÍSTICA E PROBABILIDADE (Virtual)" ||
                        $disciplineB->name == "PROBABILIDADE E ESTATÍSTICA (Virtual)" ||
                        $disciplineB->name == "ESTATÍSTICA BÁSICA" ||
                        $disciplineB->name == "MÉTODOS DE ANÁLISE ESTATÍSTICA") {
                        array_push($idsArray, $disciplineB['id']);
                    }
                }
            }

            // Redes I -> Grafos
            else if($disciplineA->name == "REDES DE COMPUTADORES I" ||
                $disciplineA->name == "REDES DE COMPUTADORES") {
                foreach($disciplines as $keyB => $disciplineB) {
                    if($disciplineB->name == "ALGORITMOS EM GRAFOS" ||
                        $disciplineB->name == "GRAFOS E TEORIA DA COMPLEXIDADE") {
                        array_push($idsArray, $disciplineB['id']);
                    }
                }
            }

            // Compila. -> FTC
            // Compila. -> AC II
            else if($disciplineA->name == "COMPILADORES") {
                foreach($disciplines as $keyB => $disciplineB) {
                    if($disciplineB->name == "FUNDAMENTOS TEÓRICOS DA COMPUTAÇÃO" ||
                        $disciplineB->name == "TEORIA DE LINGUAGENS") {
                        array_push($idsArray, $disciplineB['id']);
                    } else if($disciplineB->name == "ARQUITETURA DE COMPUTADORES II" ||
                        $disciplineB->name == "ARQUITETURA E ORGANIZAÇÃO DE COMPUTADORES II"||
                        $disciplineB->name == "COMPLEMENTAÇÃO ARQUITETURA DE COMPUTADORES II") {
                        array_push($idsArray, $disciplineB['id']);
                    }
                }
            }

            // IA -> Grafos
            else if($disciplineA->name == "INTELIGÊNCIA ARTIFICIAL" ||
                $disciplineA->name == "INTELIGÊNCIA ARTIFICIAL (Virtual)") {
                foreach($disciplines as $keyB => $disciplineB) {
                    if($disciplineB->name == "ALGORITMOS EM GRAFOS" ||
                        $disciplineB->name == "GRAFOS E TEORIA DA COMPLEXIDADE") {
                        array_push($idsArray, $disciplineB['id']);
                    }
                }
            }

            // LRSO -> Redes I
            // LRSO -> SO
            else if($disciplineA->name == "LABORATÓRIO DE REDES E SISTEMAS OPERACIONAIS") {
                foreach($disciplines as $keyB => $disciplineB) {
                    if($disciplineB->name == "REDES DE COMPUTADORES I" ||
                        $disciplineB->name == "REDES DE COMPUTADORES") {
                        array_push($idsArray, $disciplineB['id']);
                    } else if($disciplineB->name == "SISTEMAS OPERACIONAIS") {
                        array_push($idsArray, $disciplineB['id']);
                    }
                }
            }

            // OS -> PAA
            else if($disciplineA->name == "OTIMIZAÇÃO DE SISTEMAS") {
                foreach($disciplines as $keyB => $disciplineB) {
                    if($disciplineB->name == "PROJETO E ANÁLISE DE ALGORITMOS") {
                        array_push($idsArray, $disciplineB['id']);
                    }
                }
            }

            // Redes II -> Redes I
            else if($disciplineA->name == "REDES DE COMPUTADORES II") {
                foreach($disciplines as $keyB => $disciplineB) {
                    if($disciplineB->name == "REDES DE COMPUTADORES I" ||
                        $disciplineB->name == "REDES DE COMPUTADORES") {
                        array_push($idsArray, $disciplineB['id']);
                    }
                }
            }

            // Trópicos I -> PAA
            else if($disciplineA->name == "TÓPICOS EM COMPUTAÇÃO I") {
                foreach($disciplines as $keyB => $disciplineB) {
                    if($disciplineB->name == "PROJETO E ANÁLISE DE ALGORITMOS") {
                        array_push($idsArray, $disciplineB['id']);
                    }
                }
            }

            // Trópicos II -> PAA
            else if($disciplineA->name == "TÓPICOS EM COMPUTAÇÃO II") {
                foreach($disciplines as $keyB => $disciplineB) {
                    if($disciplineB->name == "PROJETO E ANÁLISE DE ALGORITMOS") {
                        array_push($idsArray, $disciplineB['id']);
                    }
                }
            }

            // TCC I -> PAA
            else if($disciplineA->name == "TRABALHO DE CONCLUSÃO DE CURSO I" ||
                $disciplineA->name == "TRABALHO DE DIPLOMAÇÃO I") {
                foreach($disciplines as $keyB => $disciplineB) {
                    if($disciplineB->name == "PROJETO E ANÁLISE DE ALGORITMOS") {
                        array_push($idsArray, $disciplineB['id']);
                    }
                }
            }

            // CD -> PAA
            else if($disciplineA->name == "COMPUTAÇÃO DISTRIBUÍDA") {
                foreach($disciplines as $keyB => $disciplineB) {
                    if($disciplineB->name == "PROJETO E ANÁLISE DE ALGORITMOS") {
                        array_push($idsArray, $disciplineB['id']);
                    }
                }
            }

            // Modelagem -> PAA
            else if($disciplineA->name == "MODELAGEM E AVALIAÇÃO DE DESEMPENHO") {
                foreach($disciplines as $keyB => $disciplineB) {
                    if($disciplineB->name == "PROJETO E ANÁLISE DE ALGORITMOS") {
                        array_push($idsArray, $disciplineB['id']);
                    }
                }
            }

            // Segurança -> ES III
            else if($disciplineA->name == "SEGURANÇA E AUDITORIA DE SISTEMAS" ||
                $disciplineA->name == "SEGURANÇA E AUDITORIA DE SISTEMAS (Virtual)") {
                foreach($disciplines as $keyB => $disciplineB) {
                    if($disciplineB->name == "ENGENHARIA DE SOFTWARE III") {
                        array_push($idsArray, $disciplineB['id']);
                    }
                }
            }

            // Tópicos III -> PAA
            else if($disciplineA->name == "TÓPICOS EM COMPUTAÇÃO III" ||
                $disciplineA->name == "TÓPICOS ESPECIAIS EM SISTEMAS DE INFORMAÇÃO: APLICAÇÕES HÍBRIDAS (Virtual)") {
                foreach($disciplines as $keyB => $disciplineB) {
                    if($disciplineB->name == "PROJETO E ANÁLISE DE ALGORITMOS") {
                        array_push($idsArray, $disciplineB['id']);
                    }
                }
            }

            // Tópicos IV -> PAA
            else if($disciplineA->name == "TÓPICOS EM COMPUTAÇÃO IV") {
                foreach($disciplines as $keyB => $disciplineB) {
                    if($disciplineB->name == "PROJETO E ANÁLISE DE ALGORITMOS") {
                        array_push($idsArray, $disciplineB['id']);
                    }
                }
            }

            // TCC II -> TCC I
            else if($disciplineA->name == "TRABALHO DE CONCLUSÃO DE CURSO II" ||
                $disciplineA->name == "TRABALHO DE DIPLOMAÇÃO II") {
                foreach($disciplines as $keyB => $disciplineB) {
                    if($disciplineB->name == "TRABALHO DE CONCLUSÃO DE CURSO I" ||
                        $disciplineB->name == "TRABALHO DE DIPLOMAÇÃO I") {
                        array_push($idsArray, $disciplineB['id']);
                    }
                }
            }

            $disciplineA->prerequisite()->sync($idsArray);
        }
    }
}
