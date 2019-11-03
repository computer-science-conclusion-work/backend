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
            if ($discipline->name == "ALGORITMOS E ESTRUTURAS DE DADOS I") {
                $this->update($discipline, 'AEDs I', Constants::PERIOD_1, Constants::CURRICULUM_3812);
            } else if($discipline->name == "CÁLCULO I") {
                $this->update($discipline, 'Cál. I', Constants::PERIOD_1, Constants::CURRICULUM_3812);
            } else if($discipline->name == "COMPUTADORES E SOCIEDADE") {
                $this->update($discipline, 'CS', Constants::PERIOD_1, Constants::CURRICULUM_3812);
            } else if($discipline->name == "INTRODUÇÃO À CIÊNCIA DA COMPUTAÇÃO") {
                $this->update($discipline, 'ICC', Constants::PERIOD_1, Constants::CURRICULUM_3812);
            } else if($discipline->name == "LABORATÓRIO DE INICIAÇÃO À PROGRAMAÇÃO") {
                $this->update($discipline, 'LIP', Constants::PERIOD_1, Constants::CURRICULUM_3812);
            } else if($discipline->name == "SEMINÁRIOS I") {
                $this->update($discipline, 'Sem. I', Constants::PERIOD_1, Constants::CURRICULUM_3812);
            } else if($discipline->name == "ALGORITMOS E ESTRUTURAS DE DADOS II") {
                $this->update($discipline, 'AEDs II', Constants::PERIOD_2, Constants::CURRICULUM_3812);
            } else if($discipline->name == "ARQUITETURA DE COMPUTADORES I") {
                $this->update($discipline, 'AC I', Constants::PERIOD_2, Constants::CURRICULUM_3812);
            } else if($discipline->name == "CÁLCULO II") {
                $this->update($discipline, 'Cál. II', Constants::PERIOD_2, Constants::CURRICULUM_3812);
            } else if($discipline->name == "CULTURA RELIGIOSA: FENÔMENO RELIGIOSO") {
                $this->update($discipline, 'Cul.: FR', Constants::PERIOD_2, Constants::CURRICULUM_3812);
            } else if($discipline->name == "GEOMETRIA ANALÍTICA") {
                $this->update($discipline, 'GA', Constants::PERIOD_2, Constants::CURRICULUM_3812);
            } else if($discipline->name == "SEMINÁRIOS II") {
                $this->update($discipline, 'Sem. II', Constants::PERIOD_2, Constants::CURRICULUM_3812);
            } else if($discipline->name == "ALGORITMOS E ESTRUTURAS DE DADOS III") {
                $this->update($discipline, 'AEDs III', Constants::PERIOD_3, Constants::CURRICULUM_3812);
            } else if($discipline->name == "ARQUITETURA DE COMPUTADORES II") {
                $this->update($discipline, 'AC II', Constants::PERIOD_3, Constants::CURRICULUM_3812);
            } else if($discipline->name == "CÁLCULO III") {
                $this->update($discipline, 'Cál. III', Constants::PERIOD_3, Constants::CURRICULUM_3812);
            } else if($discipline->name == "EMPREENDEDORISMO E PLANO DE NEGÓCIOS") {
                $this->update($discipline, 'Empreend.', Constants::PERIOD_3, Constants::CURRICULUM_3812);
            } else if($discipline->name == "INTRODUÇÃO À PESQUISA EM INFORMÁTICA") {
                $this->update($discipline, 'IPI', Constants::PERIOD_3, Constants::CURRICULUM_3812);
            } else if($discipline->name == "LABORATÓRIO DE ARQUITETURA DE COMPUTADORES") {
                $this->update($discipline, 'LAC', Constants::PERIOD_3, Constants::CURRICULUM_3812);
            } else if($discipline->name == "MATEMÁTICA DISCRETA") {
                $this->update($discipline, 'MD', Constants::PERIOD_3, Constants::CURRICULUM_3812);
            } else if($discipline->name == "ÁLGEBRA LINEAR") {
                $this->update($discipline, 'Alg. Lin.', Constants::PERIOD_4, Constants::CURRICULUM_3812);
            } else if($discipline->name == "ALGORITMOS EM GRAFOS") {
                $this->update($discipline, 'Grafos', Constants::PERIOD_4, Constants::CURRICULUM_3812);
            } else if($discipline->name == "ARQUITETURA DE COMPUTADORES III") {
                $this->update($discipline, 'AC III', Constants::PERIOD_4, Constants::CURRICULUM_3812);
            } else if($discipline->name == "BANCOS DE DADOS") {
                $this->update($discipline, 'BD', Constants::PERIOD_4, Constants::CURRICULUM_3812);
            } else if($discipline->name == "ENGENHARIA DE SOFTWARE I") {
                $this->update($discipline, 'ES I', Constants::PERIOD_4, Constants::CURRICULUM_3812);
            } else if($discipline->name == "ESTATÍSTICA E PROBABILIDADE") {
                $this->update($discipline, 'Estatística', Constants::PERIOD_4, Constants::CURRICULUM_3812);
            } else if($discipline->name == "LABORATÓRIO DE DESENVOLVIMENTO PARA DISPOSITIVOS MÓVEIS") {
                $this->update($discipline, 'LDDM', Constants::PERIOD_4, Constants::CURRICULUM_3812);
            } else if($discipline->name == "CULTURA RELIGIOSA: PESSOA E SOCIEDADE") {
                $this->update($discipline, 'Cul.: PS', Constants::PERIOD_5, Constants::CURRICULUM_3812);
            } else if($discipline->name == "ENGENHARIA DE SOFTWARE II") {
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
            } else if($discipline->name == "COMPUTAÇÃO PARALELA") {
                $this->update($discipline, 'CP', Constants::PERIOD_6, Constants::CURRICULUM_3812);
            } else if($discipline->name == "ENGENHARIA DE SOFTWARE III") {
                $this->update($discipline, 'ES III', Constants::PERIOD_6, Constants::CURRICULUM_3812);
            } else if($discipline->name == "FILOSOFIA: RAZÃO E MODERNIDADE") {
                $this->update($discipline, 'Fil.: RM', Constants::PERIOD_6, Constants::CURRICULUM_3812);
            } else if($discipline->name == "LABORATÓRIO DE PROJETO DE SISTEMAS") {
                $this->update($discipline, 'LPS', Constants::PERIOD_6, Constants::CURRICULUM_3812);
            } else if($discipline->name == "PROCESSAMENTO DE IMAGENS") {
                $this->update($discipline, 'PI', Constants::PERIOD_6, Constants::CURRICULUM_3812);
            } else if($discipline->name == "REDES DE COMPUTADORES I") {
                $this->update($discipline, 'Redes I', Constants::PERIOD_6, Constants::CURRICULUM_3812);
            } else if($discipline->name == "COMPILADORES") {
                $this->update($discipline, 'Compila.', Constants::PERIOD_7, Constants::CURRICULUM_3812);
            } else if($discipline->name == "INTELIGÊNCIA ARTIFICIAL") {
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
            } else if($discipline->name == "TRABALHO DE CONCLUSÃO DE CURSO I") {
                $this->update($discipline, 'TCC I', Constants::PERIOD_7, Constants::CURRICULUM_3812);
            } else if($discipline->name == "COMPUTAÇÃO DISTRIBUÍDA") {
                $this->update($discipline, 'CD', Constants::PERIOD_8, Constants::CURRICULUM_3812);
            } else if($discipline->name == "FILOSOFIA: ANTROPOLOGIA E ÉTICA") {
                $this->update($discipline, 'Fil.: AE', Constants::PERIOD_8, Constants::CURRICULUM_3812);
            } else if($discipline->name == "MODELAGEM E AVALIAÇÃO DE DESEMPENHO") {
                $this->update($discipline, 'Modelagem', Constants::PERIOD_8, Constants::CURRICULUM_3812);
            } else if($discipline->name == "SEGURANÇA E AUDITORIA DE SISTEMAS") {
                $this->update($discipline, 'Segurança', Constants::PERIOD_8, Constants::CURRICULUM_3812);
            } else if($discipline->name == "TÓPICOS EM COMPUTAÇÃO III") {
                $this->update($discipline, 'Tópicos III', Constants::PERIOD_8, Constants::CURRICULUM_3812);
            } else if($discipline->name == "TÓPICOS EM COMPUTAÇÃO IV") {
                $this->update($discipline, 'Tópicos IV', Constants::PERIOD_8, Constants::CURRICULUM_3812);
            } else if($discipline->name == "TRABALHO DE CONCLUSÃO DE CURSO II") {
                $this->update($discipline, 'TCC II', Constants::PERIOD_8, Constants::CURRICULUM_3812);
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
