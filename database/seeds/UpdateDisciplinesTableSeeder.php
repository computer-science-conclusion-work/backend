<?php

use Illuminate\Database\Seeder;
use App\Helpers\Constants;

use App\Discipline;

class UpdateDisciplinesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $disciplines = Discipline::get();
        
        foreach($disciplines as $key => $discipline) {
            // 3812
            if ($discipline->name == "ALGORITMOS E ESTRUTURAS DE DADOS I") {
                $this->update($discipline, 'AEDs I', Constants::PERIOD_1, Constants::CURRICULUM_3812);
            } else if($discipline->name == "CÁLCULO I" ||
                    $discipline->name == "CALCULO I" ||
                    $discipline->name == "CÁLCULO I (Virtual)" ||
                    $discipline->name == "CÁLCULO DIFERENCIAL E INTEGRAL I" ||
                    $discipline->name == "CÁLCULO NUMÉRICO" ||
                    $discipline->name == "FUNDAMENTOS DE CÁLCULO") {
                if($discipline->code == "50292") {
                    $this->update($discipline, 'Cál. I', Constants::PERIOD_2, Constants::CURRICULUM_3811);
                } else {
                    $this->update($discipline, 'Cál. I', Constants::PERIOD_1, Constants::CURRICULUM_3812);
                }
            } else if($discipline->name == "COMPUTADORES E SOCIEDADE") {
                $this->update($discipline, 'CS', Constants::PERIOD_1, Constants::CURRICULUM_3812);
            } else if($discipline->name == "INTRODUÇÃO À CIÊNCIA DA COMPUTAÇÃO" ||
                    $discipline->name == "INTRODUÇÃO À COMPUTAÇÃO") {
                $this->update($discipline, 'ICC', Constants::PERIOD_1, Constants::CURRICULUM_3812);
            } else if($discipline->name == "LABORATÓRIO DE INICIAÇÃO À PROGRAMAÇÃO") {
                $this->update($discipline, 'LIP', Constants::PERIOD_1, Constants::CURRICULUM_3812);
            } else if($discipline->name == "SEMINÁRIOS I" ||
                    $discipline->name == "SEMINÁRIO I") {
                $this->update($discipline, 'Sem. I', Constants::PERIOD_1, Constants::CURRICULUM_3812);
            } else if($discipline->name == "ALGORITMOS E ESTRUTURAS DE DADOS II") {
                $this->update($discipline, 'AEDs II', Constants::PERIOD_2, Constants::CURRICULUM_3812);
            } else if($discipline->name == "ARQUITETURA DE COMPUTADORES I" ||
                    $discipline->name == "ARQUITETURA DE COMPUTADORES" ||
                    $discipline->name == "ARQUITETURA E ORGANIZAÇÃO DE COMPUTADORES I") {
                $this->update($discipline, 'AC I', Constants::PERIOD_2, Constants::CURRICULUM_3812);
            } else if($discipline->name == "CÁLCULO II" ||
                    $discipline->name == "CÁLCULO II (Virtual)" ||
                    $discipline->name == "CÁLCULO DIFERENCIAL E INTEGRAL II") {
                if($discipline->code == "47057") {
                    $this->update($discipline, 'Cál. II', Constants::PERIOD_3, Constants::CURRICULUM_3811);
                } else {
                    $this->update($discipline, 'Cál. II', Constants::PERIOD_2, Constants::CURRICULUM_3812);
                }
            } else if($discipline->name == "CULTURA RELIGIOSA: FENÔMENO RELIGIOSO" ||
                    $discipline->name == "CULTURA RELIGIOSA I") {
                $this->update($discipline, 'Cul.: FR', Constants::PERIOD_2, Constants::CURRICULUM_3812);
            } else if($discipline->name == "GEOMETRIA ANALÍTICA" ||
                    $discipline->name == "GEOMETRIA ANÁLITICA (Virtual)" ||
                    $discipline->name == "GEOMETRIA ANALÍTICA I" ||
                    $discipline->name == "ANÁLISE VETORIAL E GEOMETRIA ANALÍTICA (AVGA) (Virtual)") {
                if($discipline->code == "47046") {
                    $this->update($discipline, 'GA', Constants::PERIOD_1, Constants::CURRICULUM_3811);
                } else {
                    $this->update($discipline, 'GA', Constants::PERIOD_2, Constants::CURRICULUM_3812);
                }
            } else if($discipline->name == "SEMINÁRIOS II" ||
                    $discipline->name == "SEMINÁRIO II") {
                $this->update($discipline, 'Sem. II', Constants::PERIOD_2, Constants::CURRICULUM_3812);
            } else if($discipline->name == "ALGORITMOS E ESTRUTURAS DE DADOS III") {
                $this->update($discipline, 'AEDs III', Constants::PERIOD_3, Constants::CURRICULUM_3812);
            } else if($discipline->name == "ARQUITETURA DE COMPUTADORES II" ||
                    $discipline->name == "ARQUITETURA E ORGANIZAÇÃO DE COMPUTADORES II"||
                    $discipline->name == "COMPLEMENTAÇÃO ARQUITETURA DE COMPUTADORES II") {
                $this->update($discipline, 'AC II', Constants::PERIOD_3, Constants::CURRICULUM_3812);
            } else if($discipline->name == "CÁLCULO III" ||
                    $discipline->name == "CALCULO III") {
                if($discipline->code == "47064") {
                    $this->update($discipline, 'Cál. III', Constants::PERIOD_4, Constants::CURRICULUM_3811);
                } else {
                    $this->update($discipline, 'Cál. III', Constants::PERIOD_3, Constants::CURRICULUM_3812);
                }
            } else if($discipline->name == "EMPREENDEDORISMO E PLANO DE NEGÓCIOS" ||
                    $discipline->name == "EMPREENDEDORISMO E PLANO DE NEGÓCIOS (Virtual)" ||
                    $discipline->name == "ADMINISTRAÇÃO E EMPREENDEDORISMO") {
                $this->update($discipline, 'Empreend.', Constants::PERIOD_3, Constants::CURRICULUM_3812);
            } else if($discipline->name == "INTRODUÇÃO À PESQUISA EM INFORMÁTICA") {
                $this->update($discipline, 'IPI', Constants::PERIOD_3, Constants::CURRICULUM_3812);
            } else if($discipline->name == "LABORATÓRIO DE ARQUITETURA DE COMPUTADORES") {
                $this->update($discipline, 'LAC', Constants::PERIOD_3, Constants::CURRICULUM_3812);
            } else if($discipline->name == "MATEMÁTICA DISCRETA" ||
                    $discipline->name == "MATEMÁTICA DISCRETA I" ||
                    $discipline->name == "MATEMÁTICA DISCRETA II") {
                if($discipline->code == "47053") {
                    $this->update($discipline, 'MD', Constants::PERIOD_2, Constants::CURRICULUM_3811);
                } else {
                    $this->update($discipline, 'MD', Constants::PERIOD_3, Constants::CURRICULUM_3812);
                }
            } else if($discipline->name == "ÁLGEBRA LINEAR" ||
                    $discipline->name == "ALGEBRA LINEAR") {
                if($discipline->code == "47058") {
                    $this->update($discipline, 'Alg. Lin.', Constants::PERIOD_3, Constants::CURRICULUM_3811);
                } else {
                    $this->update($discipline, 'Alg. Lin.', Constants::PERIOD_4, Constants::CURRICULUM_3812);
                }
            } else if($discipline->name == "ALGORITMOS EM GRAFOS" ||
                    $discipline->name == "GRAFOS E TEORIA DA COMPLEXIDADE") {
                $this->update($discipline, 'Grafos', Constants::PERIOD_4, Constants::CURRICULUM_3812);
            } else if($discipline->name == "ARQUITETURA DE COMPUTADORES III") {
                $this->update($discipline, 'AC III', Constants::PERIOD_4, Constants::CURRICULUM_3812);
            } else if($discipline->name == "BANCOS DE DADOS" ||
                    $discipline->name == "BANCOS DE DADOS I" ||
                    $discipline->name == "BANCOS DE DADOS II" ||
                    $discipline->name == "COMPLEMENTAÇÃO BANCO DE DADOS II") {
                if($discipline->code == "47080") {
                    $this->update($discipline, 'BD', Constants::PERIOD_6, Constants::CURRICULUM_3811);
                } else {
                    $this->update($discipline, 'BD', Constants::PERIOD_4, Constants::CURRICULUM_3812);
                }
            } else if($discipline->name == "ENGENHARIA DE SOFTWARE I" ||
                    $discipline->name == "ENGENHARIA DE SOFTWARE" ||
                    $discipline->name == "TÓPICOS ESPECIAIS EM ENGENHARIA DE COMPUTAÇÃO I" ||
                    $discipline->name == "INTRODUÇÃO À ENGENHARIA" ||
                    $discipline->name == "INTRODUÇÃO À ENGENHARIA DE COMPUTAÇÃO" ||
                    $discipline->name == "FUNDAMENTOS DE ENGENHARIA DE SOFTWARE") {
                $this->update($discipline, 'ES I', Constants::PERIOD_4, Constants::CURRICULUM_3812);
            } else if($discipline->name == "ESTATÍSTICA E PROBABILIDADE" ||
                    $discipline->name == "ESTATÍSTICA E PROBABILIDADE (Virtual)" ||
                    $discipline->name == "PROBABILIDADE E ESTATÍSTICA (Virtual)" ||
                    $discipline->name == "ESTATÍSTICA BÁSICA" ||
                    $discipline->name == "MÉTODOS DE ANÁLISE ESTATÍSTICA") {
                $this->update($discipline, 'Estatística', Constants::PERIOD_4, Constants::CURRICULUM_3812);
            } else if($discipline->name == "LABORATÓRIO DE DESENVOLVIMENTO PARA DISPOSITIVOS MÓVEIS") {
                $this->update($discipline, 'LDDM', Constants::PERIOD_4, Constants::CURRICULUM_3812);
            } else if($discipline->name == "CULTURA RELIGIOSA: PESSOA E SOCIEDADE" ||
                    $discipline->name == "CULTURA RELIGIOSA II") {
                $this->update($discipline, 'Cul.: PS', Constants::PERIOD_5, Constants::CURRICULUM_3812);
            } else if($discipline->name == "ENGENHARIA DE SOFTWARE II" ||
                    $discipline->name == "ENGENHARIA SOFTWARE II") {
                $this->update($discipline, 'ES II', Constants::PERIOD_5, Constants::CURRICULUM_3812);
            } else if($discipline->name == "FUNDAMENTOS TEÓRICOS DA COMPUTAÇÃO") {
                $this->update($discipline, 'FTC', Constants::PERIOD_5, Constants::CURRICULUM_3812);
            } else if($discipline->name == "LABORATÓRIO DE PROJETO DE ALGORITMOS") {
                $this->update($discipline, 'LPA', Constants::PERIOD_5, Constants::CURRICULUM_3812);
            } else if($discipline->name == "LINGUAGENS DE PROGRAMAÇÃO") {
                $this->update($discipline, 'LP', Constants::PERIOD_5, Constants::CURRICULUM_3812);
            } else if($discipline->name == "PROJETO E ANÁLISE DE ALGORITMOS") {
                $this->update($discipline, 'PAA', Constants::PERIOD_5, Constants::CURRICULUM_3812);
            } else if($discipline->name == "SISTEMAS OPERACIONAIS") {
                $this->update($discipline, 'SO', Constants::PERIOD_5, Constants::CURRICULUM_3812);
            } else if($discipline->name == "COMPUTAÇÃO GRÁFICA") {
                $this->update($discipline, 'CG', Constants::PERIOD_6, Constants::CURRICULUM_3812);
            } else if($discipline->name == "COMPUTAÇÃO PARALELA" ||
                    $discipline->name == "COMPUTAÇÃO PARALELA - A (Virtual)" ||
                    $discipline->name == "COMPUTAÇÃO PARALELA - B") {
                $this->update($discipline, 'CP', Constants::PERIOD_6, Constants::CURRICULUM_3812);
            } else if($discipline->name == "ENGENHARIA DE SOFTWARE III") {
                $this->update($discipline, 'ES III', Constants::PERIOD_6, Constants::CURRICULUM_3812);
            } else if($discipline->name == "FILOSOFIA: RAZÃO E MODERNIDADE" ||
                    $discipline->name == "FILOSOFIA I" ||
                    $discipline->name == "FILOSOFIA: RAZÃO E MODERNIDADE (Virtual)") {
                if($discipline->code == "47551") {
                    $this->update($discipline, 'Fil.: RM', Constants::PERIOD_7, Constants::CURRICULUM_3811);
                } else {
                    $this->update($discipline, 'Fil.: RM', Constants::PERIOD_6, Constants::CURRICULUM_3812);
                }
            } else if($discipline->name == "LABORATÓRIO DE PROJETO DE SISTEMAS") {
                $this->update($discipline, 'LPS', Constants::PERIOD_6, Constants::CURRICULUM_3812);
            } else if($discipline->name == "PROCESSAMENTO DE IMAGENS") {
                $this->update($discipline, 'PI', Constants::PERIOD_6, Constants::CURRICULUM_3812);
            } else if($discipline->name == "REDES DE COMPUTADORES I" ||
                    $discipline->name == "REDES DE COMPUTADORES") {
                $this->update($discipline, 'Redes I', Constants::PERIOD_6, Constants::CURRICULUM_3812);
            } else if($discipline->name == "COMPILADORES") {
                if($discipline->code == "47077") {
                    $this->update($discipline, 'Compila.', Constants::PERIOD_6, Constants::CURRICULUM_3811);
                } else {
                    $this->update($discipline, 'Compila.', Constants::PERIOD_7, Constants::CURRICULUM_3812);
                }
            } else if($discipline->name == "INTELIGÊNCIA ARTIFICIAL" ||
                $discipline->name == "INTELIGÊNCIA ARTIFICIAL (Virtual)") {
                $this->update($discipline, 'IA', Constants::PERIOD_7, Constants::CURRICULUM_3812);
            } else if($discipline->name == "LABORATÓRIO DE REDES E SISTEMAS OPERACIONAIS") {
                $this->update($discipline, 'LRSO', Constants::PERIOD_7, Constants::CURRICULUM_3812);
            } else if($discipline->name == "OTIMIZAÇÃO DE SISTEMAS") {
                $this->update($discipline, 'Otimização', Constants::PERIOD_7, Constants::CURRICULUM_3812);
            } else if($discipline->name == "REDES DE COMPUTADORES II") {
                $this->update($discipline, 'Redes II', Constants::PERIOD_7, Constants::CURRICULUM_3812);
            } else if($discipline->name == "TÓPICOS EM COMPUTAÇÃO I") {
                $this->update($discipline, 'Tópicos I', Constants::PERIOD_7, Constants::CURRICULUM_3812);
            } else if($discipline->name == "TÓPICOS EM COMPUTAÇÃO II") {
                $this->update($discipline, 'Tópicos II', Constants::PERIOD_7, Constants::CURRICULUM_3812);
            } else if($discipline->name == "TRABALHO DE CONCLUSÃO DE CURSO I" ||
                    $discipline->name == "TRABALHO DE DIPLOMAÇÃO I") {
                $this->update($discipline, 'TCC I', Constants::PERIOD_7, Constants::CURRICULUM_3812);
            } else if($discipline->name == "COMPUTAÇÃO DISTRIBUÍDA") {
                $this->update($discipline, 'CD', Constants::PERIOD_8, Constants::CURRICULUM_3812);
            } else if($discipline->name == "FILOSOFIA: ANTROPOLOGIA E ÉTICA" ||
                    $discipline->name == "FILOSOFIA II" ||
                    $discipline->name == "FILOSOFIA: ANTROPOLOGIA E ÉTICA (Virtual)") {
                $this->update($discipline, 'Fil.: AE', Constants::PERIOD_8, Constants::CURRICULUM_3812);
            } else if($discipline->name == "MODELAGEM E AVALIAÇÃO DE DESEMPENHO") {
                $this->update($discipline, 'Modelagem', Constants::PERIOD_8, Constants::CURRICULUM_3812);
            } else if($discipline->name == "SEGURANÇA E AUDITORIA DE SISTEMAS" ||
                    $discipline->name == "SEGURANÇA E AUDITORIA DE SISTEMAS (Virtual)") {
                $this->update($discipline, 'Segurança', Constants::PERIOD_8, Constants::CURRICULUM_3812);
            } else if($discipline->name == "TÓPICOS EM COMPUTAÇÃO III" ||
                    $discipline->name == "TÓPICOS ESPECIAIS EM SISTEMAS DE INFORMAÇÃO: APLICAÇÕES HÍBRIDAS (Virtual)") {
                $this->update($discipline, 'Tópicos III', Constants::PERIOD_8, Constants::CURRICULUM_3812);
            } else if($discipline->name == "TÓPICOS EM COMPUTAÇÃO IV") {
                $this->update($discipline, 'Tópicos IV', Constants::PERIOD_8, Constants::CURRICULUM_3812);
            } else if($discipline->name == "TRABALHO DE CONCLUSÃO DE CURSO II" ||
                $discipline->name == "TRABALHO DE DIPLOMAÇÃO II") {
                $this->update($discipline, 'TCC II', Constants::PERIOD_8, Constants::CURRICULUM_3812);
            }
            // 3811
            else if($discipline->name == "LABORATÓRIO DE PROGRAMAÇÃO VISUAL") {
                $this->update($discipline, 'LPV', Constants::PERIOD_1, Constants::CURRICULUM_3811);
            } else if($discipline->name == "EMPREENDEDORISMO") {
                $this->update($discipline, 'Empreend.', Constants::PERIOD_3, Constants::CURRICULUM_3811);
            } else if($discipline->name == "INICIAÇÃO À PESQUISA EM CIÊNCIA DA COMPUTAÇÃO") {
                $this->update($discipline, 'IPCC', Constants::PERIOD_3, Constants::CURRICULUM_3811);
            } else if($discipline->name == "PROCESSAMENTO DE IMAGENS DIGITAIS") {
                $this->update($discipline, 'PID', Constants::PERIOD_4, Constants::CURRICULUM_3811);
            } else if($discipline->name == "TEORIA DE LINGUAGENS") {
                $this->update($discipline, 'TL', Constants::PERIOD_5, Constants::CURRICULUM_3811);
            } else if($discipline->name == "RECUPERAÇÃO DE INFORMAÇÃO") {
                $this->update($discipline, 'RI', Constants::PERIOD_7, Constants::CURRICULUM_3811);
            } else if($discipline->name == "SEMINÁRIOS III") {
                $this->update($discipline, 'Sem. III', Constants::PERIOD_7, Constants::CURRICULUM_3811);
            } else if($discipline->name == "SEMINÁRIOS IV") {
                $this->update($discipline, 'Sem. IV', Constants::PERIOD_8, Constants::CURRICULUM_3811);
            } else if($discipline->name == "TÓPICOS EM COMPUTAÇÃO") {
                $this->update($discipline, 'Tópicos Comp.', Constants::PERIOD_8, Constants::CURRICULUM_3811);
            } else {
                $this->update($discipline, 'default', Constants::PERIOD_0, null);
            }
            $discipline->save();
        }
    }

    public function update($discipline, $alias, $period, $id_curriculum) {
        $discipline->alias = $alias;
        $discipline->period = $period;
        $discipline->id_curriculum = $id_curriculum;
    }
}
