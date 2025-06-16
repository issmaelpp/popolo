<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrganizationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 001
        $intendencia = Organization::create([
            'parent_id' => null,
            'slug' => 'intendencia',
            'name' => '',
            'full_name' => 'Intendencia',
            'other_name' => 'dem',
            'classification' => ClassificationEnum::intendencia,
            'abstract' => 'Decreto - Ley 39 del 28 de Julio de 2.000',
            'description' => 'Paso de los Libres (antigua localidad de Restauración) conocida también como "la cuna del carnaval argentino" está ubicada en la provincia de Corrientes, cabecera del departamento homónimo. Ubicada junto a la frontera brasileña, frente a la ciudad de Uruguayana, fue fundada el 12 de septiembre de 1843 por el general Joaquín Madariaga, ubicada a 368 kilómetros de la Ciudad de Corrientes. El municipio comprende la isla Guardaisla.',
            'founding_date' => '1843-09-12',
            'dissolution_date' => null,
            'status' => GeneralStatusEnum::activo,
        ]);

        // 002
        $viceintendencia = Organization::create([
            'parent_id' => $intendencia->id,
            'slug' => 'viceintendencia',
            'name' => '',
            'full_name' => 'Viceintendencia',
            'other_name' => 'viceintendencia',
            'classification' => ClassificationEnum::viceintendencia,
            'abstract' => null,
            'description' => null,
            'founding_date' => null,
            'dissolution_date' => null,
            'status' => GeneralStatusEnum::activo,
        ]);

        // 003
        $secretaria_de_coordinacion_y_planificacion = Organization::create([
            'parent_id' => $intendencia->id,
            'slug' => 'secretaria-de-coordinacion-y-planificacion',
            'name' => 'de Coordinación y Planificación',
            'full_name' => 'Secretaría de Coordinación y Planificación',
            'other_name' => 'coordinacion y planificacion',
            'classification' => ClassificationEnum::secretaría,
            'abstract' => null,
            'description' => null,
            'founding_date' => null,
            'dissolution_date' => null,
            'status' => GeneralStatusEnum::activo,
        ]);

        // 004
        $secretaria_de_desarrollo_economico = Organization::create([
            'parent_id' => $intendencia->id,
            'slug' => 'secretaria-de-desarrollo-economico',
            'name' => 'de Desarrollo Económico y Participación',
            'full_name' => 'Secretaría de Desarrollo Económico y Participación',
            'other_name' => 'desarrollo economico y participacion',
            'classification' => ClassificationEnum::secretaría,
            'abstract' => null,
            'description' => null,
            'founding_date' => null,
            'dissolution_date' => null,
            'status' => GeneralStatusEnum::activo,
        ]);

        // 005
        $secretaria_de_hacienda = Organization::create([
            'parent_id' => $intendencia->id,
            'slug' => 'secretaria-de-hacienda',
            'name' => 'de Hacienda',
            'full_name' => 'Secretaría de Hacienda',
            'other_name' => 'secretaria de hacienda',
            'classification' => ClassificationEnum::secretaría,
            'abstract' => null,
            'description' => null,
            'founding_date' => null,
            'dissolution_date' => null,
            'status' => GeneralStatusEnum::activo,
        ]);

        // 006
        $secretaria_de_gobierno = Organization::create([
            'parent_id' => $intendencia->id,
            'slug' => 'secretaria-de-gobierno',
            'name' => 'de Gobierno',
            'full_name' => 'Secretaría de Gobierno',
            'other_name' => 'secretaria de gobierno',
            'classification' => ClassificationEnum::secretaría,
            'abstract' => null,
            'description' => null,
            'founding_date' => null,
            'dissolution_date' => null,
            'status' => GeneralStatusEnum::activo,
        ]);

        // 007
        $secretaria_de_accion_social = Organization::create([
            'parent_id' => $intendencia->id,
            'slug' => 'secretaria-de-accion-social',
            'name' => 'de Acción Social',
            'full_name' => 'Secretaría de Acción Social',
            'other_name' => 'accion social',
            'classification' => ClassificationEnum::secretaría,
            'abstract' => null,
            'description' => null,
            'founding_date' => null,
            'dissolution_date' => null,
            'status' => GeneralStatusEnum::activo,
        ]);

        // 008
        $secretaria_de_obras_y_servicios_publicos = Organization::create([
            'parent_id' => $intendencia->id,
            'slug' => 'secretaria-de-obras-y-servicios-publicos',
            'name' => 'de Obras y Servicios Públicos',
            'full_name' => 'Secretaría de Obras y Servicios Públicos',
            'other_name' => 'obras y servicios publicos',
            'classification' => ClassificationEnum::secretaría,
            'abstract' => null,
            'description' => null,
            'founding_date' => null,
            'dissolution_date' => null,
            'status' => GeneralStatusEnum::activo,
        ]);

        // 009
        $secretaria_de_salud = Organization::create([
            'parent_id' => $intendencia->id,
            'slug' => 'secretaria-de-salud',
            'name' => 'de Salud',
            'full_name' => 'Secretaría de Salud',
            'other_name' => 'secretaria de salud',
            'classification' => ClassificationEnum::secretaría,
            'abstract' => null,
            'description' => null,
            'founding_date' => null,
            'dissolution_date' => null,
            'status' => GeneralStatusEnum::activo,
        ]);

        // 010
        $secretaria_de_desarrollo_humano_y_participacion = Organization::create([
            'parent_id' => $intendencia->id,
            'slug' => 'secretaria-de-desarrollo-humano',
            'name' => 'de Desarrollo Humano y Participación',
            'full_name' => 'Secretaría de Desarrollo Humano y Participación',
            'other_name' => 'secretaria de desarrollo humano y participacion',
            'classification' => ClassificationEnum::secretaría,
            'abstract' => null,
            'description' => null,
            'founding_date' => null,
            'dissolution_date' => null,
            'status' => GeneralStatusEnum::activo,
        ]);

        // 011
        $direccion_de_comercio = Organization::create([
            'parent_id' => $secretaria_de_gobierno->id,
            'slug' => 'direccion-de-comercio',
            'name' => 'de Comercio',
            'full_name' => 'Dirección de Comercio',
            'other_name' => 'direccion de comercio',
            'classification' => ClassificationEnum::dirección,
            'abstract' => null,
            'description' => null,
            'founding_date' => null,
            'dissolution_date' => null,
            'status' => GeneralStatusEnum::activo,
        ]);

        // 012
        $subsecretaria_de_gobierno = Organization::create([
            'parent_id' => $secretaria_de_gobierno->id,
            'slug' => 'subsecretaria-de-gobierno',
            'name' => 'de Gobierno',
            'full_name' => 'Subsecretaría de Gobierno',
            'other_name' => 'subsecreatria de gobierno',
            'classification' => ClassificationEnum::subsecretaría,
            'abstract' => null,
            'description' => null,
            'founding_date' => null,
            'dissolution_date' => null,
            'status' => GeneralStatusEnum::activo,
        ]);

        // 013
        $direccion_de_turismo = Organization::create([
            'parent_id' => $secretaria_de_desarrollo_economico->id,
            'slug' => 'direccion-de-turismo',
            'name' => 'de Turismo',
            'full_name' => 'Dirección de Turismo',
            'other_name' => 'direccion de turismo',
            'classification' => ClassificationEnum::dirección,
            'abstract' => null,
            'description' => null,
            'founding_date' => null,
            'dissolution_date' => null,
            'status' => GeneralStatusEnum::activo,
        ]);

        // 014
        $direccion_de_cultura = Organization::create([
            'parent_id' => $secretaria_de_desarrollo_economico->id,
            'slug' => 'direccion-de-cultura',
            'name' => 'de Cultura',
            'full_name' => 'Dirección de Cultura',
            'other_name' => 'direccion de cultura',
            'classification' => ClassificationEnum::dirección,
            'abstract' => null,
            'description' => null,
            'founding_date' => null,
            'dissolution_date' => null,
            'status' => GeneralStatusEnum::activo,
        ]);

        // 015
        $direccion_de_carnaval = Organization::create([
            'parent_id' => $secretaria_de_desarrollo_economico->id,
            'slug' => 'direccion-de-carnaval',
            'name' => 'de Carnaval',
            'full_name' => 'Dirección de Carnaval',
            'other_name' => 'direccion de carnaval',
            'classification' => ClassificationEnum::dirección,
            'abstract' => null,
            'description' => null,
            'founding_date' => null,
            'dissolution_date' => null,
            'status' => GeneralStatusEnum::activo,
        ]);

        // 016
        $direccion_de_personal = Organization::create([
            'parent_id' => $secretaria_de_gobierno->id,
            'slug' => 'direccion-de-personal',
            'name' => 'de Personal',
            'full_name' => 'Dirección de Personal',
            'other_name' => 'direccion de personal',
            'classification' => ClassificationEnum::dirección,
            'abstract' => null,
            'description' => null,
            'founding_date' => null,
            'dissolution_date' => null,
            'status' => GeneralStatusEnum::activo,
        ]);

        // 017
        $direccion_de_legal_y_tecnica = Organization::create([
            'parent_id' => $intendencia->id,
            'slug' => 'direccion-de-legal-y-tecnica',
            'name' => 'de Legal y Técnica',
            'full_name' => 'Dirección de Legal y Técnica',
            'other_name' => 'direccion de legal y tecnica',
            'classification' => ClassificationEnum::dirección,
            'abstract' => null,
            'description' => null,
            'founding_date' => null,
            'dissolution_date' => null,
            'status' => GeneralStatusEnum::activo,
        ]);

        // 018
        $direccion_de_prensa = Organization::create([
            'parent_id' => $intendencia->id,
            'slug' => 'direccion-de-prensa',
            'name' => 'de Prensa',
            'full_name' => 'Dirección de Prensa',
            'other_name' => 'direccion de prensa',
            'classification' => ClassificationEnum::dirección,
            'abstract' => null,
            'description' => null,
            'founding_date' => null,
            'dissolution_date' => null,
            'status' => GeneralStatusEnum::activo,
        ]);

        // 019
        $oficina_de_asesoria_letrada = Organization::create([
            'parent_id' => $intendencia->id,
            'slug' => 'oficina-de-asesoria-letrada',
            'name' => 'de Asesoría Letrada',
            'full_name' => 'Oficina de Asesoría Letrada',
            'other_name' => 'oficina de asesoria letrada',
            'classification' => ClassificationEnum::oficina,
            'abstract' => null,
            'description' => null,
            'founding_date' => null,
            'dissolution_date' => null,
            'status' => GeneralStatusEnum::activo,
        ]);

        // 020
        $direccion_de_catastro = Organization::create([
            'parent_id' => $secretaria_de_obras_y_servicios_publicos->id,
            'slug' => 'direccion-de-catastro',
            'name' => 'de Catastro',
            'full_name' => 'Dirección de Catastro',
            'other_name' => 'direccion de catastro',
            'classification' => ClassificationEnum::dirección,
            'abstract' => null,
            'description' => null,
            'founding_date' => null,
            'dissolution_date' => null,
            'status' => GeneralStatusEnum::activo,
        ]);

        // 021
        $museo = Organization::create([
            'parent_id' => $direccion_de_cultura->id,
            'slug' => 'coordinacion-de-museo',
            'name' => 'de Museo',
            'full_name' => 'Coordinación de Museo',
            'other_name' => 'museo municipal',
            'classification' => ClassificationEnum::coordinación,
            'abstract' => null,
            'description' => null,
            'founding_date' => null,
            'dissolution_date' => null,
            'status' => GeneralStatusEnum::activo,
        ]);

        // 022 - Dirección de Educación
        $direccion_de_educacion = Organization::create([
            'parent_id' => $secretaria_de_desarrollo_humano_y_participacion->id,
            'slug' => 'direccion-de-educacion',
            'name' => 'de Educación',
            'full_name' => 'Dirección de Educación',
            'other_name' => 'direccion de educacion',
            'classification' => ClassificationEnum::dirección,
            'abstract' => null,
            'description' => null,
            'founding_date' => null,
            'dissolution_date' => null,
            'status' => GeneralStatusEnum::activo,
        ]);

        // 023 - Secretaría privada
        $secretaria_privada = Organization::create([
            'parent_id' => $intendencia->id,
            'slug' => 'secretaria-privada',
            'name' => 'de Secretaria Privada',
            'full_name' => 'Secretaria Privada',
            'other_name' => 'secretaria privada',
            'classification' => ClassificationEnum::nc,
            'abstract' => null,
            'description' => null,
            'founding_date' => null,
            'dissolution_date' => null,
            'status' => GeneralStatusEnum::activo,
        ]);

        // 024 - Secretaría de Asuntos Parlamentarios
        $secretaria_de_asuntos_parlamentarios = Organization::create([
            'parent_id' => $intendencia->id,
            'slug' => 'secretaria-de-asuntos-parlamentarios',
            'name' => 'de Asuntos Parlamentarios',
            'full_name' => 'Secretaria de Asuntos Parlamentarios',
            'other_name' => 'secretaria de asuntos parlamentarios',
            'classification' => ClassificationEnum::nc,
            'abstract' => null,
            'description' => null,
            'founding_date' => null,
            'dissolution_date' => null,
            'status' => GeneralStatusEnum::activo,
        ]);

        // 025 - Secretaría de desarrollo para la Gestión Municipal
        $secretaria_de_desarrollo_para_la_gestion_municipal = Organization::create([
            'parent_id' => $intendencia->id,
            'slug' => 'secretaria-de-desarrollo-para-la-gestion-municipal',
            'name' => 'de Desarrollo para la Gestion Municipal',
            'full_name' => 'Secretaría de Desarrollo para la Gestión Municipal',
            'other_name' => 'secretaria de desarrollo para la gestion municipal',
            'classification' => ClassificationEnum::nc,
            'abstract' => null,
            'description' => null,
            'founding_date' => null,
            'dissolution_date' => null,
            'status' => GeneralStatusEnum::activo,
        ]);

        // 026 - Oficina de Procuradores
        $oficina_de_procuradores = Organization::create([
            'parent_id' => $oficina_de_asesoria_letrada->id,
            'slug' => 'oficina-de-procuradores',
            'name' => 'de Procuradores',
            'full_name' => 'Oficina de Procuradores',
            'other_name' => 'oficina de procuradores',
            'classification' => ClassificationEnum::oficina,
            'abstract' => null,
            'description' => null,
            'founding_date' => null,
            'dissolution_date' => null,
            'status' => GeneralStatusEnum::activo,
        ]);

        // 027 - Coordinación de la Oficina de Infraestructura Institucional
        $coordinacion_de_la_oficina_de_infraestructura_institucional = Organization::create([
            'parent_id' => $viceintendencia->id,
            'slug' => 'coordinacion-de-la-oficina-de-infraestructura-institucional',
            'name' => 'de Infraestructura Institucional',
            'full_name' => 'Coordinación de la Oficina de Infraestructura Institucional',
            'other_name' => 'coordinacion de la oficina de infraestructura institucional',
            'classification' => ClassificationEnum::coordinación,
            'abstract' => null,
            'description' => null,
            'founding_date' => null,
            'dissolution_date' => null,
            'status' => GeneralStatusEnum::activo,
        ]);

        // 028 - Secretaría de Asuntos Internacionales
        $secretaria_de_asuntos_internacionales = Organization::create([
            'parent_id' => $intendencia->id,
            'slug' => 'secretaria-de-asuntos-internacionales',
            'name' => 'de Asuntos Internacionales',
            'full_name' => 'Secretaría de Asuntos Internacionales',
            'other_name' => 'secretaria de asuntos internacionales',
            'classification' => ClassificationEnum::secretaría,
            'abstract' => null,
            'description' => null,
            'founding_date' => null,
            'dissolution_date' => null,
            'status' => GeneralStatusEnum::activo,
        ]);

        // 029 - Secretaría de Asuntos Estratégicos y Análisis de Gestión
        $secretaria_de_asuntos_estrategicos_y_analisis_de_gestion = Organization::create([
           'parent_id' => $intendencia->id,
           'slug' => 'secretaria-de-asuntos-estrategicos-y-analisis-de-gestion',
           'name' => 'de Asuntos Estrategicos y Análisis de Gestión',
           'full_name' => 'Secretaría de Asuntos Estratégicos y Análisis de Gestión',
           'other_name' => 'secretaria de asuntos estrategicos y analisis de gestion',
           'classification' => ClassificationEnum::nc,
           'abstract' => null,
           'description' => null,
           'founding_date' => null,
           'dissolution_date' => null,
           'status' => GeneralStatusEnum::activo,
        ]);

        // 030 - Secretaría de Asuntos Institucionales
        $secretaria_de_asuntos_institucionales = Organization::create([
            'parent_id' => $intendencia->id,
            'slug' => 'secretaria-de-asuntos-institucionales',
            'name' => 'de Asuntos Institucionales',
            'full_name' => 'Secretaría de Asuntos Institucionales',
            'other_name' => 'secretaria de asuntos institucionales',
            'classification' => ClassificationEnum::secretaría,
            'abstract' => null,
            'description' => null,
            'founding_date' => null,
            'dissolution_date' => null,
            'status' => GeneralStatusEnum::activo,
        ]);

        // 031 - Fiscal de Control de la Gestión Publica Municipal
        $fiscal_de_control_de_la_gestion_publica_municipal = Organization::create([
            'parent_id' => $intendencia->id,
            'slug' => 'fiscal-de-control-de-la-gestion-publica-municipal',
            'name' => 'de Control de la Gestion Publica Municipal',
            'full_name' => 'Fiscal de Control de la Gestión Pública Municipal',
            'other_name' => 'fiscal de control de la gestion publica municipal',
            'classification' => ClassificationEnum::nc,
            'abstract' => null,
            'description' => null,
            'founding_date' => null,
            'dissolution_date' => null,
            'status' => GeneralStatusEnum::activo,
        ]);

        // 032 - Dirección de Políticas de Inclusión Social
        $direccion_de_politicas_de_inclusion_social = Organization::create([
            'parent_id' => $secretaria_de_coordinacion_y_planificacion->id,
            'slug' => 'direccion-de-politicas-de-inclusion-social',
            'name' => 'de Politicas de Inclusion Social',
            'full_name' => 'Dirección de Políticas de Inclusión Social',
            'other_name' => 'direccion de politicas de inclusion social',
            'classification' => ClassificationEnum::dirección,
            'abstract' => null,
            'description' => null,
            'founding_date' => null,
            'dissolution_date' => null,
            'status' => GeneralStatusEnum::activo,
        ]);

        // 033 - Dirección de Defensa Civil
        $direccion_de_defensa_civil = Organization::create([
            'parent_id' => $intendencia->id,
            'slug' => 'direccion-de-defensa-civil',
            'name' => 'de Defensa Civil',
            'full_name' => 'Dirección de Defensa Civil',
            'other_name' => 'direccion de defensa civil',
            'classification' => ClassificationEnum::dirección,
            'abstract' => null,
            'description' => null,
            'founding_date' => null,
            'dissolution_date' => null,
            'status' => GeneralStatusEnum::activo,
        ]);

        // 034 - Departamento de Defensa Civil
        $departamento_de_defensa_civil = Organization::create([
            'parent_id' => $direccion_de_defensa_civil->id,
            'slug' => 'departamento-de-defensa-civil',
            'name' => 'de Defensa Civil',
            'full_name' => 'Departamento de Defensa Civil',
            'other_name' => 'departamento de defensa civil',
            'classification' => ClassificationEnum::departamento,
            'abstract' => null,
            'description' => null,
            'founding_date' => null,
            'dissolution_date' => null,
            'status' => GeneralStatusEnum::activo,
        ]);

        // 035 - Secretaría de Seguridad y Protección Ciudadana
        $secretaria_de_seguridad_y_proteccion_ciudadana = Organization::create([
            'parent_id' => $intendencia->id,
            'slug' => 'secretaria-de-seguridad-y-proteccion-ciudadana',
            'name' => 'de Seguridad y Proteccion Ciudadana',
            'full_name' => 'Secretaría de Seguridad y Protección Ciudadana',
            'other_name' => 'secretaria de seguridad y proteccion ciudadana',
            'classification' => ClassificationEnum::nc,
            'abstract' => null,
            'description' => null,
            'founding_date' => null,
            'dissolution_date' => null,
            'status' => GeneralStatusEnum::activo,
        ]);

        // 036 - Coordinación de Seguridad y Protección ciudadana
        $coordinacion_de_seguridad_y_proteccion_ciudadana = Organization::create([
            'parent_id' => $secretaria_de_seguridad_y_proteccion_ciudadana->id,
            'slug' => 'coordinacion-de-seguridad-y-proteccion-ciudadana',
            'name' => 'de Seguridad y Proteccion Ciudadana',
            'full_name' => 'Coordinación de Seguridad y Protección Ciudadana',
            'other_name' => 'coordinacion de seguridad y proteccion ciudadana',
            'classification' => ClassificationEnum::coordinación,
            'abstract' => null,
            'description' => null,
            'founding_date' => null,
            'dissolution_date' => null,
            'status' => GeneralStatusEnum::activo,
        ]);

        // 037 - Protocolo y Ceremonial
        $protocolo_y_ceremonial = Organization::create([
            'parent_id' => $intendencia->id,
            'slug' => 'protocolo-y-ceremonial',
            'name' => 'Protocolo y Ceremonial',
            'full_name' => 'Protocolo y Ceremonial',
            'other_name' => 'protocolo y ceremonial',
            'classification' => ClassificationEnum::nc,
            'abstract' => null,
            'description' => null,
            'founding_date' => null,
            'dissolution_date' => null,
            'status' => GeneralStatusEnum::activo,
        ]);

        // 038 - Coordinación de Comunicación Política
        $coordinacion_de_comunicacion_politica = Organization::create([
            'parent_id' => $direccion_de_prensa->id,
            'slug' => 'coordinacion-de-comunicacion-politica',
            'name' => 'de Comunicación Política',
            'full_name' => 'Coordinación de Comunicación Política',
            'other_name' => 'coordinacion de comunicacion politica',
            'classification' => ClassificationEnum::coordinación,
            'abstract' => null,
            'description' => null,
            'founding_date' => null,
            'dissolution_date' => null,
            'status' => GeneralStatusEnum::activo,
        ]);

        // 039 - Dirección de Radio Municipal
        $direccion_de_radio_municipal = Organization::create([
            'parent_id' => $intendencia->id,
            'slug' => 'direccion-de-radio-municipal',
            'name' => 'de Radio Municipal',
            'full_name' => 'Dirección de Radio Municipal',
            'other_name' => 'direccion de radio municipal',
            'classification' => ClassificationEnum::dirección,
            'abstract' => null,
            'description' => null,
            'founding_date' => null,
            'dissolution_date' => null,
            'status' => GeneralStatusEnum::activo,
        ]);

        // 040 - Coordinación de Comunicación Audiovisual
        $coordinacion_de_comunicacion_audiovisual = Organization::create([
            'parent_id' => $direccion_de_radio_municipal->id,
            'slug' => 'coordinacion-de-comunicacion-audiovisual',
            'name' => 'de Comunicación Audiovisual',
            'full_name' => 'Coordinación de Comunicación Audiovisual',
            'other_name' => 'coordinacion de comunicacion audiovisual',
            'classification' => ClassificationEnum::coordinación,
            'abstract' => null,
            'description' => null,
            'founding_date' => null,
            'dissolution_date' => null,
            'status' => GeneralStatusEnum::activo,
        ]);

        // 041 - Coordinación de la Secretaria de Gobierno
        $coordinacion_de_la_secretaria_de_gobierno = Organization::create([
            'parent_id' => $secretaria_de_gobierno->id,
            'slug' => 'coordinacion-de-la-secretaria-de-gobierno',
            'name' => 'de la Secretaría de Gobierno',
            'full_name' => 'Coordinación de la Secretaría de Gobierno',
            'other_name' => 'coordinacion de la secretaria de gobierno',
            'classification' => ClassificationEnum::coordinación,
            'abstract' => null,
            'description' => null,
            'founding_date' => null,
            'dissolution_date' => null,
            'status' => GeneralStatusEnum::activo,
        ]);

        // 042 - Departamento de Terminal de Omnibus
        $departamento_de_terminal_de_omnibus = Organization::create([
            'parent_id' => $secretaria_de_gobierno->id,
            'slug' => 'departamento-de-terminal-de-omnibus',
            'name' => 'de Terminal de Omnibus',
            'full_name' => 'Departamento de Terminal de Omnibus',
            'other_name' => 'departamento de terminal de omnibus',
            'classification' => ClassificationEnum::departamento,
            'abstract' => null,
            'description' => null,
            'founding_date' => null,
            'dissolution_date' => null,
            'status' => GeneralStatusEnum::activo,
        ]);

        // 043 - Coordinación de Tareas Operativas D.T.O
        $coordinacion_de_tareas_operativas_dto = Organization::create([
            'parent_id' => $departamento_de_terminal_de_omnibus->id,
            'slug' => 'coordinacion-de-tareas-operativas-dto',
            'name' => 'de Tareas Operativas D.T.O',
            'full_name' => 'Coordinación de Tareas Operativas D.T.O',
            'other_name' => 'coordinacion de tareas operativas dto',
            'classification' => ClassificationEnum::coordinación,
            'abstract' => null,
            'description' => null,
            'founding_date' => null,
            'dissolution_date' => null,
            'status' => GeneralStatusEnum::activo,
        ]);

        // 044 - Dirección de Recursos Humanos
        $direccion_de_recursos_humanos = Organization::create([
            'parent_id' => $secretaria_de_gobierno->id,
            'slug' => 'direccion-de-recursos-humanos',
            'name' => 'de Recursos Humanos',
            'full_name' => 'Dirección de Recursos Humanos',
            'other_name' => 'direccion de recursos humanos',
            'classification' => ClassificationEnum::dirección,
            'abstract' => null,
            'description' => null,
            'founding_date' => null,
            'dissolution_date' => null,
            'status' => GeneralStatusEnum::activo,
        ]);

        // 045 - Coordinación RR.HH. Sec. Salud
        $coordinacion_rrhh_sec_salud = Organization::create([
            'parent_id' => $direccion_de_recursos_humanos->id,
            'slug' => 'coordinacion-de-recursos-humanos-secretaria-de-salud',
            'name' => 'RR.HH. Sec. Salud',
            'full_name' => 'Coordinación de Recursos Humanos de la Secretaría de Salud',
            'other_name' => 'coordinacion rrhh sec salud',
            'classification' => ClassificationEnum::coordinación,
            'abstract' => null,
            'description' => null,
            'founding_date' => null,
            'dissolution_date' => null,
            'status' => GeneralStatusEnum::activo,
        ]);

        // 046 - Coordinación RR.HH. Ex Mercado Municipal
        $coordinacion_rrhh_ex_mercado_municipal = Organization::create([
            'parent_id' => $direccion_de_recursos_humanos->id,
            'slug' => 'coordinacion-de-recursos-humanos-ex-mercado-municipal',
            'name' => 'RR.HH. Ex Mercado Municipal',
            'full_name' => 'Coordinación de Recursos Humanos del Ex Mercado Municipal',
            'other_name' => 'coordinacion rrhh ex mercado municipal',
            'classification' => ClassificationEnum::coordinación,
            'abstract' => null,
            'description' => null,
            'founding_date' => null,
            'dissolution_date' => null,
            'status' => GeneralStatusEnum::activo,
        ]);

        // 047 - Coordinación RR.HH. Palacio Municipal
        $coordinacion_rrhh_palacio_municipal = Organization::create([
            'parent_id' => $direccion_de_recursos_humanos->id,
            'slug' => 'coordinacion-de-recursos-humanos-palacio-municipal',
            'name' => 'RR.HH. Palacio Municipal',
            'full_name' => 'Coordinación de Recursos Humanos del Palacio Municipal',
            'other_name' => 'coordinacion rrhh palacio municipal',
            'classification' => ClassificationEnum::coordinación,
            'abstract' => null,
            'description' => null,
            'founding_date' => null,
            'dissolution_date' => null,
            'status' => GeneralStatusEnum::activo,
        ]);

        // 048 - Coordinación Paseo Costero
        $coordinacion_paseo_costero = Organization::create([
            'parent_id' => $secretaria_de_gobierno->id,
            'slug' => 'coordinacion-paseo-costero',
            'name' => 'Paseo Costero',
            'full_name' => 'Coordinación del Paseo Costero',
            'other_name' => 'coordinacion paseo costero',
            'classification' => ClassificationEnum::coordinación,
            'abstract' => null,
            'description' => null,
            'founding_date' => null,
            'dissolution_date' => null,
            'status' => GeneralStatusEnum::activo,
        ]);

        // 049 - Coordinación Operativa de Áreas Municipales
        $coordinacion_operativa_de_areas_municipales = Organization::create([
            'parent_id' => $secretaria_de_gobierno->id,
            'slug' => 'coordinacion-operativa-de-areas-municipales',
            'name' => 'Operativa de Áreas Municipales',
            'full_name' => 'Coordinación Operativa de Áreas Municipales',
            'other_name' => 'coordinacion operativa de areas municipales',
            'classification' => ClassificationEnum::coordinación,
            'abstract' => null,
            'description' => null,
            'founding_date' => null,
            'dissolution_date' => null,
            'status' => GeneralStatusEnum::activo,
        ]);

        // 050 - Dirección de Deporte
        $direccion_de_deporte = Organization::create([
            'parent_id' => $secretaria_de_gobierno->id,
            'slug' => 'direccion-de-deporte',
            'name' => 'de Deporte',
            'full_name' => 'Dirección de Deporte',
            'other_name' => 'direccion de deporte',
            'classification' => ClassificationEnum::dirección,
            'abstract' => null,
            'description' => null,
            'founding_date' => null,
            'dissolution_date' => null,
            'status' => GeneralStatusEnum::activo,
        ]);

        // 051 - Coordinación de Deportes
        $coordinacion_de_deportes = Organization::create([
            'parent_id' => $direccion_de_deporte->id,
            'slug' => 'coordinacion-de-deportes',
            'name' => 'de Deportes',
            'full_name' => 'Coordinación de Deportes',
            'other_name' => 'coordinacion de deportes',
            'classification' => ClassificationEnum::coordinación,
            'abstract' => null,
            'description' => null,
            'founding_date' => null,
            'dissolution_date' => null,
            'status' => GeneralStatusEnum::activo,
        ]);

        // 052 - Coordinador de Instituciones Deportivas
        $coordinador_de_instituciones_deportivas = Organization::create([
            'parent_id' => $direccion_de_deporte->id,
            'slug' => 'coordinador-de-instituciones-deportivas',
            'name' => 'de Instituciones Deportivas',
            'full_name' => 'Coordinador de Instituciones Deportivas',
            'other_name' => 'coordinador de instituciones deportivas',
            'classification' => ClassificationEnum::coordinación,
            'abstract' => null,
            'description' => null,
            'founding_date' => null,
            'dissolution_date' => null,
            'status' => GeneralStatusEnum::activo,
        ]);

        // 053 - Dirección de Transito
        $direccion_de_transito = Organization::create([
            'parent_id' => $secretaria_de_gobierno->id,
            'slug' => 'direccion-de-transito',
            'name' => 'de Transito',
            'full_name' => 'Dirección de Transito',
            'other_name' => 'direccion de transito',
            'classification' => ClassificationEnum::dirección,
            'abstract' => null,
            'description' => null,
            'founding_date' => null,
            'dissolution_date' => null,
            'status' => GeneralStatusEnum::activo,
        ]);

        // 054 - Departamento de Personal Dirección Transito
        $departamento_de_personal_direccion_transito = Organization::create([
            'parent_id' => $direccion_de_transito->id,
            'slug' => 'departamento-de-personal-direccion-transito',
            'name' => 'de Personal Dirección Transito',
            'full_name' => 'Departamento de Personal de la Dirección Transito',
            'other_name' => 'departamento de personal direccion transito',
            'classification' => ClassificationEnum::departamento,
            'abstract' => null,
            'description' => null,
            'founding_date' => null,
            'dissolution_date' => null,
            'status' => GeneralStatusEnum::activo,
        ]);

        // 055 - Coordinación Operativa Dirección Transito
        $coordinacion_operativa_direccion_transito = Organization::create([
            'parent_id' => $direccion_de_transito->id,
            'slug' => 'coordinacion-operativa-direccion-transito',
            'name' => 'Operativa Dirección Transito',
            'full_name' => 'Coordinación Operativa de la Dirección Transito',
            'other_name' => 'coordinacion operativa direccion transito',
            'classification' => ClassificationEnum::coordinación,
            'abstract' => null,
            'description' => null,
            'founding_date' => null,
            'dissolution_date' => null,
            'status' => GeneralStatusEnum::activo,
        ]);

        // 056 - Centro de Emisión de Licencia Nacional de Conducir
        $centro_de_emision_de_licencia_nacional_de_conducir = Organization::create([
            'parent_id' => $direccion_de_transito->id,
            'slug' => 'centro-de-emision-de-licencia-nacional-de-conducir',
            'name' => 'de Emisión de Licencia Nacional de Conducir',
            'full_name' => 'Centro de Emisión de Licencia Nacional de Conducir',
            'other_name' => 'centro de emision de licencia nacional de conducir',
            'classification' => ClassificationEnum::centro,
            'abstract' => null,
            'description' => null,
            'founding_date' => null,
            'dissolution_date' => null,
            'status' => GeneralStatusEnum::activo,
        ]);

        // 057 - Coordinación de Transporte Público
        $coordinacion_de_transporte_publico = Organization::create([
            'parent_id' => $direccion_de_transito->id,
            'slug' => 'coordinacion-de-transporte-publico',
            'name' => 'de Transporte Público',
            'full_name' => 'Coordinación de Transporte Público',
            'other_name' => 'coordinacion de transporte publico',
            'classification' => ClassificationEnum::coordinación,
            'abstract' => null,
            'description' => null,
            'founding_date' => null,
            'dissolution_date' => null,
            'status' => GeneralStatusEnum::activo,
        ]);

        // 058 - Departamento de Seguridad Vial
        $departamento_de_seguridad_vial = Organization::create([
            'parent_id' => $direccion_de_transito->id,
            'slug' => 'departamento-de-seguridad-vial',
            'name' => 'de Seguridad Vial',
            'full_name' => 'Departamento de Seguridad Vial',
            'other_name' => 'departamento de seguridad vial',
            'classification' => ClassificationEnum::departamento,
            'abstract' => null,
            'description' => null,
            'founding_date' => null,
            'dissolution_date' => null,
            'status' => GeneralStatusEnum::activo,
        ]);

        // 059 - Dirección de Bromatología
        $direccion_de_bromatologia = Organization::create([
            'parent_id' => $secretaria_de_gobierno->id,
            'slug' => 'direccion-de-bromatologia',
            'name' => 'de Bromatología',
            'full_name' => 'Dirección de Bromatología',
            'other_name' => 'direccion de bromatologia',
            'classification' => ClassificationEnum::dirección,
            'abstract' => null,
            'description' => null,
            'founding_date' => null,
            'dissolution_date' => null,
            'status' => GeneralStatusEnum::activo,
        ]);

        // 060 - Oficial Notificador
        $oficial_notificador = Organization::create([
            'parent_id' => $secretaria_de_gobierno->id,
            'slug' => 'oficial-notificador',
            'name' => 'Oficial Notificador',
            'full_name' => 'Oficial Notificador',
            'other_name' => 'oficial notificador',
            'classification' => ClassificationEnum::nc,
            'abstract' => null,
            'description' => null,
            'founding_date' => null,
            'dissolution_date' => null,
            'status' => GeneralStatusEnum::activo,
        ]);

        // 061 - Oficina de Cementerio
        $oficina_de_cementerio = Organization::create([
            'parent_id' => $secretaria_de_gobierno->id,
            'slug' => 'oficina-de-cementerio',
            'name' => 'de Cementerio',
            'full_name' => 'Oficina de Cementerio',
            'other_name' => 'oficina de cementerio',
            'classification' => ClassificationEnum::oficina,
            'abstract' => null,
            'description' => null,
            'founding_date' => null,
            'dissolution_date' => null,
            'status' => GeneralStatusEnum::activo,
        ]);

        // 062 - Encargado de Cementerio
        $encargado_de_cementerio = Organization::create([
            'parent_id' => $secretaria_de_gobierno->id,
            'slug' => 'encargado-de-cementerio',
            'name' => 'de Cementerio',
            'full_name' => 'Encargado de Cementerio',
            'other_name' => 'encargado de cementerio',
            'classification' => ClassificationEnum::nc,
            'abstract' => null,
            'description' => null,
            'founding_date' => null,
            'dissolution_date' => null,
            'status' => GeneralStatusEnum::activo,
        ]);

        // 063 - Oficina de Defensa del Consumidor y Protección al Usuario
        $oficina_de_defensa_del_consumidor_y_proteccion_al_usuario = Organization::create([
            'parent_id' => $secretaria_de_gobierno->id,
            'slug' => 'oficina-de-defensa-del-consumidor-y-proteccion-al-usuario',
            'name' => 'de Defensa del Consumidor y Protección al Usuario',
            'full_name' => 'Oficina de Defensa del Consumidor y Protección al Usuario',
            'other_name' => 'oficina de defensa del consumidor y proteccion al usuario',
            'classification' => ClassificationEnum::oficina,
            'abstract' => null,
            'description' => null,
            'founding_date' => null,
            'dissolution_date' => null,
            'status' => GeneralStatusEnum::activo,
        ]);

        // 064 - Dirección Contable
        $direccion_contable = Organization::create([
            'parent_id' => $secretaria_de_hacienda->id,
            'slug' => 'direccion-contable',
            'name' => 'de Contable',
            'full_name' => 'Dirección Contable',
            'other_name' => 'direccion contable',
            'classification' => ClassificationEnum::dirección,
            'abstract' => null,
            'description' => null,
            'founding_date' => null,
            'dissolution_date' => null,
            'status' => GeneralStatusEnum::activo,
        ]);

        // 065 - Dirección de Presupuesto
        $direccion_de_presupuesto = Organization::create([
            'parent_id' => $secretaria_de_hacienda->id,
            'slug' => 'direccion-de-presupuesto',
            'name' => 'de Presupuesto',
            'full_name' => 'Dirección de Presupuesto',
            'other_name' => 'direccion de presupuesto',
            'classification' => ClassificationEnum::dirección,
            'abstract' => null,
            'description' => null,
            'founding_date' => null,
            'dissolution_date' => null,
            'status' => GeneralStatusEnum::activo,
        ]);

        // 066 - Departamento de Compras
        $departamento_de_compras = Organization::create([
            'parent_id' => $direccion_contable->id,
            'slug' => 'departamento-de-compras',
            'name' => 'de Compras',
            'full_name' => 'Departamento de Compras',
            'other_name' => 'departamento de compras',
            'classification' => ClassificationEnum::departamento,
            'abstract' => null,
            'description' => null,
            'founding_date' => null,
            'dissolution_date' => null,
            'status' => GeneralStatusEnum::activo,
        ]);

        // 067 - Departamento de Operaciones de Contabilidad
        $departamento_de_operaciones_de_contabilidad = Organization::create([
            'parent_id' => $direccion_contable->id,
            'slug' => 'departamento-de-operaciones-de-contabilidad',
            'name' => 'de Operaciones de Contabilidad',
            'full_name' => 'Departamento de Operaciones de Contabilidad',
            'other_name' => 'departamento de operaciones de contabilidad',
            'classification' => ClassificationEnum::departamento,
            'abstract' => null,
            'description' => null,
            'founding_date' => null,
            'dissolution_date' => null,
            'status' => GeneralStatusEnum::activo,
        ]);

        // 068 - Dirección de Ingresos Públicos
        $direccion_de_ingresos_publicos = Organization::create([
            'parent_id' => $secretaria_de_hacienda->id,
            'slug' => 'direccion-de-ingresos-publicos',
            'name' => 'de Ingresos Públicos',
            'full_name' => 'Dirección de Ingresos Públicos',
            'other_name' => 'direccion de ingresos publicos',
            'classification' => ClassificationEnum::dirección,
            'abstract' => null,
            'description' => null,
            'founding_date' => null,
            'dissolution_date' => null,
            'status' => GeneralStatusEnum::activo,
        ]);

        // 069 - Departamento de Control Balanza
        $departamento_de_control_balanza = Organization::create([
            'parent_id' => $direccion_de_ingresos_publicos->id,
            'slug' => 'departamento-de-control-balanza',
            'name' => 'de Control Balanza',
            'full_name' => 'Departamento de Control Balanza',
            'other_name' => 'departamento de control balanza',
            'classification' => ClassificationEnum::departamento,
            'abstract' => null,
            'description' => null,
            'founding_date' => null,
            'dissolution_date' => null,
            'status' => GeneralStatusEnum::activo,
        ]);

        // 070 - Departamento de Ejecución Presupuestaria
        $departamento_de_ejecucion_presupuestaria = Organization::create([
            'parent_id' => $secretaria_de_hacienda->id,
            'slug' => 'departamento-de-ejecucion-presupuestaria',
            'name' => 'de Ejecución Presupuestaria',
            'full_name' => 'Departamento de Ejecución Presupuestaria',
            'other_name' => 'departamento de ejecucion presupuestaria',
            'classification' => ClassificationEnum::departamento,
            'abstract' => null,
            'description' => null,
            'founding_date' => null,
            'dissolution_date' => null,
            'status' => GeneralStatusEnum::activo,
        ]);

        // 071 - Departamento de Liquidaciones
        $departamento_de_liquidaciones = Organization::create([
            'parent_id' => $secretaria_de_hacienda->id,
            'slug' => 'departamento-de-liquidaciones',
            'name' => 'de Liquidaciones',
            'full_name' => 'Departamento de Liquidaciones',
            'other_name' => 'departamento de liquidaciones',
            'classification' => ClassificationEnum::departamento,
            'abstract' => null,
            'description' => null,
            'founding_date' => null,
            'dissolution_date' => null,
            'status' => GeneralStatusEnum::activo,
        ]);

        // 072 - Oficina de Automotores
        $oficina_de_automotores = Organization::create([
            'parent_id' => $secretaria_de_hacienda->id,
            'slug' => 'oficina-de-automotores',
            'name' => 'de Automotores',
            'full_name' => 'Oficina de Automotores',
            'other_name' => 'oficina de automotores',
            'classification' => ClassificationEnum::oficina,
            'abstract' => null,
            'description' => null,
            'founding_date' => null,
            'dissolution_date' => null,
            'status' => GeneralStatusEnum::activo,
        ]);

        // 073 - Coordinación de Computos
        $coordinacion_de_computos = Organization::create([
            'parent_id' => $secretaria_de_hacienda->id,
            'slug' => 'coordinacion-de-computos',
            'name' => 'de Computos',
            'full_name' => 'Coordinación de Computos',
            'other_name' => 'coordinacion de computos',
            'classification' => ClassificationEnum::coordinación,
            'abstract' => null,
            'description' => null,
            'founding_date' => null,
            'dissolution_date' => null,
            'status' => GeneralStatusEnum::activo,
        ]);

        // 074 - Coordinación de Eventos
        $coordinacion_de_eventos = Organization::create([
            'parent_id' => $secretaria_de_hacienda->id,
            'slug' => 'coordinacion-de-eventos',
            'name' => 'de Eventos',
            'full_name' => 'Coordinación de Eventos',
            'other_name' => 'coordinacion de eventos',
            'classification' => ClassificationEnum::coordinación,
            'abstract' => null,
            'description' => null,
            'founding_date' => null,
            'dissolution_date' => null,
            'status' => GeneralStatusEnum::activo,
        ]);

        // 075 - Dirección de Obras Particulares
        $direccion_de_obras_particulares = Organization::create([
            'parent_id' => $secretaria_de_obras_y_servicios_publicos->id,
            'slug' => 'direccion-de-obras-particulares',
            'name' => 'de Obras Particulares',
            'full_name' => 'Dirección de Obras Particulares',
            'other_name' => 'direccion de obras particulares',
            'classification' => ClassificationEnum::dirección,
            'abstract' => null,
            'description' => null,
            'founding_date' => null,
            'dissolution_date' => null,
            'status' => GeneralStatusEnum::activo,
        ]);

        // 076 - Departamento de Inspectores de Obras Particulares
        $departamento_de_inspectores_de_obras_particulares = Organization::create([
            'parent_id' => $direccion_de_obras_particulares->id,
            'slug' => 'departamento-de-inspectores-de-obras-particulares',
            'name' => 'de Inspectores de Obras Particulares',
            'full_name' => 'Departamento de Inspectores de Obras Particulares',
            'other_name' => 'departamento de inspectores de obras particulares',
            'classification' => ClassificationEnum::departamento,
            'abstract' => null,
            'description' => null,
            'founding_date' => null,
            'dissolution_date' => null,
            'status' => GeneralStatusEnum::activo,
        ]);

        // 077 - Dirección de Servicios Públicos
        $direccion_de_servicios_publicos = Organization::create([
            'parent_id' => $secretaria_de_obras_y_servicios_publicos->id,
            'slug' => 'direccion-de-servicios-publicos',
            'name' => 'de Servicios Públicos',
            'full_name' => 'Dirección de Servicios Públicos',
            'other_name' => 'direccion de servicios publicos',
            'classification' => ClassificationEnum::dirección,
            'abstract' => null,
            'description' => null,
            'founding_date' => null,
            'dissolution_date' => null,
            'status' => GeneralStatusEnum::activo,
        ]);

        // 078 - Coordinación de Alumbrado Público ZONA BARRIOS
        $coordinacion_de_alumbrado_publico_zona_barrios = Organization::create([
            'parent_id' => $direccion_de_servicios_publicos->id,
            'slug' => 'coordinacion-de-alumbrado-publico-zona-barrios',
            'name' => 'de Alumbrado Público ZONA BARRIOS',
            'full_name' => 'Coordinación de Alumbrado Público ZONA BARRIOS',
            'other_name' => 'coordinacion de alumbrado publico zona barrios',
            'classification' => ClassificationEnum::coordinación,
            'abstract' => null,
            'description' => null,
            'founding_date' => null,
            'dissolution_date' => null,
            'status' => GeneralStatusEnum::activo,
        ]);

        // 079 - Coordinación de Alumbrado Público ZONA CENTRO
        $coordinacion_de_alumbrado_publico_zona_centro = Organization::create([
            'parent_id' => $secretaria_de_obras_y_servicios_publicos->id,
            'slug' => 'coordinacion-de-alumbrado-publico-zona-centro',
            'name' => 'de Alumbrado Público ZONA CENTRO',
            'full_name' => 'Coordinación de Alumbrado Público ZONA CENTRO',
            'other_name' => 'coordinacion de alumbrado publico zona centro',
            'classification' => ClassificationEnum::coordinación,
            'abstract' => null,
            'description' => null,
            'founding_date' => null,
            'dissolution_date' => null,
            'status' => GeneralStatusEnum::activo,
        ]);

        // 080 - Área de Recolección de Residuos
        $area_de_recoleccion_de_residuos = Organization::create([
            'parent_id' => $secretaria_de_obras_y_servicios_publicos->id,
            'slug' => 'area-de-recoleccion-de-residuos',
            'name' => 'de Recolección de Residuos',
            'full_name' => 'Área de Recolección de Residuos',
            'other_name' => 'area de recoleccion de residuos',
            'classification' => ClassificationEnum::área,
            'abstract' => null,
            'description' => null,
            'founding_date' => null,
            'dissolution_date' => null,
            'status' => GeneralStatusEnum::activo,
        ]);

        // 081 - Coordinación de Estetica Urbana
        $coordinacion_de_estetica_urbana = Organization::create([
            'parent_id' => $secretaria_de_obras_y_servicios_publicos->id,
            'slug' => 'coordinacion-de-estetica-urbana',
            'name' => 'de Estetica Urbana',
            'full_name' => 'Coordinación de Estética Urbana',
            'other_name' => 'coordinacion de estetica urbana',
            'classification' => ClassificationEnum::coordinación,
            'abstract' => null,
            'description' => null,
            'founding_date' => null,
            'dissolution_date' => null,
            'status' => GeneralStatusEnum::activo,
        ]);

        // 082 - Coordinación Administrativa de Corralon
        $coordinacion_administrativa_de_corralon = Organization::create([
            'parent_id' => $secretaria_de_obras_y_servicios_publicos->id,
            'slug' => 'coordinacion-administrativa-de-corralon',
            'name' => 'de Corralon',
            'full_name' => 'Coordinación Administrativa de Corralon',
            'other_name' => 'coordinacion administrativa de corralon',
            'classification' => ClassificationEnum::coordinación,
            'abstract' => null,
            'description' => null,
            'founding_date' => null,
            'dissolution_date' => null,
            'status' => GeneralStatusEnum::activo,
        ]);

        // 083 - Coordinación de Aseo e Higiene Urbana
        $coordinacion_de_aseo_e_higiene_urbana = Organization::create([
            'parent_id' => $secretaria_de_obras_y_servicios_publicos->id,
            'slug' => 'coordinacion-de-aseo-e-higiene-urbana',
            'name' => 'de Aseo e Higiene Urbana',
            'full_name' => 'Coordinación de Aseo e Higiene Urbana',
            'other_name' => 'coordinacion de aseo e higiene urbana',
            'classification' => ClassificationEnum::coordinación,
            'abstract' => null,
            'description' => null,
            'founding_date' => null,
            'dissolution_date' => null,
            'status' => GeneralStatusEnum::activo,
        ]);

        // 084 - Dirección de Obras Públicas
        $direccion_de_obras_publicas = Organization::create([
            'parent_id' => $secretaria_de_obras_y_servicios_publicos->id,
            'slug' => 'direccion-de-obras-publicas',
            'name' => 'de Obras Públicas',
            'full_name' => 'Dirección de Obras Públicas',
            'other_name' => 'direccion de obras publicas',
            'classification' => ClassificationEnum::dirección,
            'abstract' => null,
            'description' => null,
            'founding_date' => null,
            'dissolution_date' => null,
            'status' => GeneralStatusEnum::activo,
        ]);

        // 085 - Departamento de Personal, Información y Cualificación
        $departamento_de_personal_informacion_y_cualificacion = Organization::create([
            'parent_id' => $direccion_de_obras_publicas->id,
            'slug' => 'departamento-de-personal-informacion-y-cualificacion',
            'name' => 'de Personal, Información y Cualificación',
            'full_name' => 'Departamento de Personal, Información y Cualificación',
            'other_name' => 'departamento de personal informacion y cualificacion',
            'classification' => ClassificationEnum::departamento,
            'abstract' => null,
            'description' => null,
            'founding_date' => null,
            'dissolution_date' => null,
            'status' => GeneralStatusEnum::activo,
        ]);

        // 086 - Coordinación de Servicios Públicos y Áreas Recreativas
        $coordinacion_de_servicios_publicos_y_areas_recreativas = Organization::create([
            'parent_id' => $secretaria_de_obras_y_servicios_publicos->id,
            'slug' => 'coordinacion-de-servicios-publicos-y-areas-recreativas',
            'name' => 'de Servicios Públicos y Áreas Recreativas',
            'full_name' => 'Coordinación de Servicios Públicos y Áreas Recreativas',
            'other_name' => 'coordinacion de servicios publicos y areas recreativas',
            'classification' => ClassificationEnum::coordinación,
            'abstract' => null,
            'description' => null,
            'founding_date' => null,
            'dissolution_date' => null,
            'status' => GeneralStatusEnum::activo,
        ]);

        // 087 - Coordinación de Obras y Servicios Públicos
        $coordinacion_de_obras_y_servicios_publicos = Organization::create([
            'parent_id' => $secretaria_de_obras_y_servicios_publicos->id,
            'slug' => 'coordinacion-de-obras-y-servicios-publicos',
            'name' => 'de Obras y Servicios Públicos',
            'full_name' => 'Coordinación de Obras y Servicios Públicos',
            'other_name' => 'coordinacion de obras y servicios publicos',
            'classification' => ClassificationEnum::coordinación,
            'abstract' => null,
            'description' => null,
            'founding_date' => null,
            'dissolution_date' => null,
            'status' => GeneralStatusEnum::activo,
        ]);

        // 088 - Jefe de Personal de Corralon Municipal
        $jefe_de_personal_de_corralon_municipal = Organization::create([
            'parent_id' => $secretaria_de_obras_y_servicios_publicos->id,
            'slug' => 'jefe-de-personal-de-corralon-municipal',
            'name' => 'Jefe de Personal de Corralon Municipal',
            'full_name' => 'Jefe de Personal de Corralon Municipal',
            'other_name' => 'jefe de personal de corralon municipal',
            'classification' => ClassificationEnum::nc,
            'abstract' => null,
            'description' => null,
            'founding_date' => null,
            'dissolution_date' => null,
            'status' => GeneralStatusEnum::activo,
        ]);

        // 089 - Encargado de Barrido
        $encargado_de_barrido = Organization::create([
            'parent_id' => $secretaria_de_obras_y_servicios_publicos->id,
            'slug' => 'encargado-de-barrido',
            'name' => 'Encargado de Barrido',
            'full_name' => 'Encargado de Barrido',
            'other_name' => 'encargado de barrido',
            'classification' => ClassificationEnum::nc,
            'abstract' => null,
            'description' => null,
            'founding_date' => null,
            'dissolution_date' => null,
            'status' => GeneralStatusEnum::activo,
        ]);

        // 090 - Oficina de Desarrollo Forestal y Espacios Verdes
        $oficina_de_desarrollo_forestal_y_espacios_verdes = Organization::create([
            'parent_id' => $secretaria_de_desarrollo_economico->id,
            'slug' => 'oficina-de-desarrollo-forestal-y-espacios-verdes',
            'name' => 'de Desarrollo Forestal y Espacios Verdes',
            'full_name' => 'Oficina de Desarrollo Forestal y Espacios Verdes',
            'other_name' => 'oficina de desarrollo forestal y espacios verdes',
            'classification' => ClassificationEnum::oficina,
            'abstract' => null,
            'description' => null,
            'founding_date' => null,
            'dissolution_date' => null,
            'status' => GeneralStatusEnum::activo,
        ]);

        // 091 - Inspector de Desarrollo Forestal
        $inspector_de_desarrollo_forestal = Organization::create([
            'parent_id' => $secretaria_de_desarrollo_economico->id,
            'slug' => 'inspector-de-desarrollo-forestal',
            'name' => 'Inspector de Desarrollo Forestal',
            'full_name' => 'Inspector de Desarrollo Forestal',
            'other_name' => 'inspector de desarrollo forestal',
            'classification' => ClassificationEnum::nc,
            'abstract' => null,
            'description' => null,
            'founding_date' => null,
            'dissolution_date' => null,
            'status' => GeneralStatusEnum::activo,
        ]);

        // 092 - Encargado de Vivero Municipal
        $encargado_de_vivero_municipal = Organization::create([
            'parent_id' => $secretaria_de_desarrollo_economico->id,
            'slug' => 'encargado-de-vivero-municipal',
            'name' => 'Encargado de Vivero Municipal',
            'full_name' => 'Encargado de Vivero Municipal',
            'other_name' => 'encargado de vivero municipal',
            'classification' => ClassificationEnum::nc,
            'abstract' => null,
            'description' => null,
            'founding_date' => null,
            'dissolution_date' => null,
            'status' => GeneralStatusEnum::activo,
        ]);

        // 093 - Dirección de Medio Ambiente
        $direccion_de_medio_ambiente = Organization::create([
            'parent_id' => $secretaria_de_desarrollo_economico->id,
            'slug' => 'direccion-de-medio-ambiente',
            'name' => 'de Medio Ambiente',
            'full_name' => 'Dirección de Medio Ambiente',
            'other_name' => 'direccion de medio ambiente',
            'classification' => ClassificationEnum::dirección,
            'abstract' => null,
            'description' => null,
            'founding_date' => null,
            'dissolution_date' => null,
            'status' => GeneralStatusEnum::activo,
        ]);

        // 094 - Departamento de Concientización Ambiental
        $departamento_de_concientizacion_ambiental = Organization::create([
            'parent_id' => $direccion_de_medio_ambiente->id,
            'slug' => 'departamento-de-concientizacion-ambiental',
            'name' => 'de Concientización Ambiental',
            'full_name' => 'Departamento de Concientización Ambiental',
            'other_name' => 'departamento de concientizacion ambiental',
            'classification' => ClassificationEnum::departamento,
            'abstract' => null,
            'description' => null,
            'founding_date' => null,
            'dissolution_date' => null,
            'status' => GeneralStatusEnum::activo,
        ]);

        // 095 - Coordinación de Proyectos Ambientales
        $coordinacion_de_proyectos_ambientales = Organization::create([
            'parent_id' => $secretaria_de_desarrollo_economico->id,
            'slug' => 'coordinacion-de-proyectos-ambientales',
            'name' => 'de Proyectos Ambientales',
            'full_name' => 'Coordinación de Proyectos Ambientales',
            'other_name' => 'coordinacion de proyectos ambientales',
            'classification' => ClassificationEnum::coordinación,
            'abstract' => null,
            'description' => null,
            'founding_date' => null,
            'dissolution_date' => null,
            'status' => GeneralStatusEnum::activo,
        ]);

        // 096 - Dirección de Planeamiento Urbano
        $direccion_de_planeamiento_urbano = Organization::create([
            'parent_id' => $secretaria_de_desarrollo_economico->id,
            'slug' => 'direccion-de-planeamiento-urbano',
            'name' => 'de Planeamiento Urbano',
            'full_name' => 'Dirección de Planeamiento Urbano',
            'other_name' => 'direccion de planeamiento urbano',
            'classification' => ClassificationEnum::dirección,
            'abstract' => null,
            'description' => null,
            'founding_date' => null,
            'dissolution_date' => null,
            'status' => GeneralStatusEnum::activo,
        ]);

        // 097 - Coordinador Oficina de Empleo
        $coordinador_oficina_de_empleo = Organization::create([
            'parent_id' => $secretaria_de_desarrollo_economico->id,
            'slug' => 'coordinador-oficina-de-empleo',
            'name' => 'Coordinador Oficina de Empleo',
            'full_name' => 'Coordinador Oficina de Empleo',
            'other_name' => 'coordinador oficina de empleo',
            'classification' => ClassificationEnum::nc,
            'abstract' => null,
            'description' => null,
            'founding_date' => null,
            'dissolution_date' => null,
            'status' => GeneralStatusEnum::activo,
        ]);

        // 098 - Coordinación de Gestión Integral de Areas
        $coordinacion_de_gestion_integral_de_areas = Organization::create([
            'parent_id' => $secretaria_de_desarrollo_economico->id,
            'slug' => 'coordinacion-de-gestion-integral-de-areas',
            'name' => 'de Gestión Integral de Areas',
            'full_name' => 'Coordinación de Gestión Integral de Areas',
            'other_name' => 'coordinacion de gestion integral de areas',
            'classification' => ClassificationEnum::coordinación,
            'abstract' => null,
            'description' => null,
            'founding_date' => null,
            'dissolution_date' => null,
            'status' => GeneralStatusEnum::activo,
        ]);

        // 099 - Dirección de Economía Social y Popular
        $direccion_de_economia_social_y_popular = Organization::create([
            'parent_id' => $secretaria_de_desarrollo_economico->id,
            'slug' => 'direccion-de-economia-social-y-popular',
            'name' => 'de Economía Social y Popular',
            'full_name' => 'Dirección de Economía Social y Popular',
            'other_name' => 'direccion de economia social y popular',
            'classification' => ClassificationEnum::dirección,
            'abstract' => null,
            'description' => null,
            'founding_date' => null,
            'dissolution_date' => null,
            'status' => GeneralStatusEnum::activo,
        ]);

        // 100 - Coordinación de Proyectos Culturales
        $coordinacion_de_proyectos_culturales = Organization::create([
            'parent_id' => $secretaria_de_desarrollo_economico->id,
            'slug' => 'coordinacion-de-proyectos-culturales',
            'name' => 'de Proyectos Culturales',
            'full_name' => 'Coordinación de Proyectos Culturales',
            'other_name' => 'coordinacion de proyectos culturales',
            'classification' => ClassificationEnum::coordinación,
            'abstract' => null,
            'description' => null,
            'founding_date' => null,
            'dissolution_date' => null,
            'status' => GeneralStatusEnum::activo,
        ]);

        // 101 - Coordinación Municipal de Centros y Agrupaciones Tradicionalistas
        $coordinacion_municipal_de_centros_y_agrupaciones_tradicionalistas = Organization::create([
            'parent_id' => $secretaria_de_desarrollo_economico->id,
            'slug' => 'coordinacion-municipal-de-centros-y-agrupaciones-tradicionalistas',
            'name' => 'Municipal de Centros y Agrupaciones Tradicionalistas',
            'full_name' => 'Coordinación Municipal de Centros y Agrupaciones Tradicionalistas',
            'other_name' => 'coordinacion municipal de Centros y Agrupaciones Tradicionalistas',
            'classification' => ClassificationEnum::coordinación,
            'abstract' => null,
            'description' => null,
            'founding_date' => null,
            'dissolution_date' => null,
            'status' => GeneralStatusEnum::activo,
        ]);

        // 102 - Coordinación de la Secretaría de Desarrollo Humano y Participación
        $coordinacion_de_la_secretaria_de_desarrollo_humano_y_participacion = Organization::create([
            'parent_id' => $secretaria_de_desarrollo_humano_y_participacion->id,
            'slug' => 'coordinacion-de-la-secretaria-de-desarrollo-humano-y-participacion',
            'name' => 'de Desarrollo Humano y Participación',
            'full_name' => 'Coordinación de la Secretaría de Desarrollo Humano y Participación',
            'other_name' => 'coordinacion de la secretaria de desarrollo humano y participacion',
            'classification' => ClassificationEnum::coordinación,
            'abstract' => null,
            'description' => null,
            'founding_date' => null,
            'dissolution_date' => null,
            'status' => GeneralStatusEnum::activo,
        ]);

        // 103 - Dirección de Intervención Comunitaria y Desarrollo Productivo
        $direccion_de_intervencion_comunitaria_y_desarrollo_productivo = Organization::create([
            'parent_id' => $secretaria_de_desarrollo_humano_y_participacion->id,
            'slug' => 'direccion-de-intervencion-comunitaria-y-desarrollo-productivo',
            'name' => 'de Intervención Comunitaria y Desarrollo Productivo',
            'full_name' => 'Dirección de Intervención Comunitaria y Desarrollo Productivo',
            'other_name' => 'direccion de intervencion comunitaria y desarrollo productivo',
            'classification' => ClassificationEnum::dirección,
            'abstract' => null,
            'description' => null,
            'founding_date' => null,
            'dissolution_date' => null,
            'status' => GeneralStatusEnum::activo,
        ]);

        // 104 - Dirección de Participación Ciudadana
        $direccion_de_participacion_ciudadana = Organization::create([
            'parent_id' => $secretaria_de_desarrollo_humano_y_participacion->id,
            'slug' => 'direccion-de-participacion-ciudadana',
            'name' => 'de Participación Ciudadana',
            'full_name' => 'Dirección de Participación Ciudadana',
            'other_name' => 'direccion de participacion ciudadana',
            'classification' => ClassificationEnum::dirección,
            'abstract' => null,
            'description' => null,
            'founding_date' => null,
            'dissolution_date' => null,
            'status' => GeneralStatusEnum::activo,
        ]);

        // 105 - Dirección de Habitat y Viviendas
        $direccion_de_habitat_y_viviendas = Organization::create([
            'parent_id' => $secretaria_de_desarrollo_humano_y_participacion->id,
            'slug' => 'direccion-de-habitat-y-viviendas',
            'name' => 'de Habitat y Viviendas',
            'full_name' => 'Dirección de Hábitat y Viviendas',
            'other_name' => 'direccion de habitat y viviendas',
            'classification' => ClassificationEnum::dirección,
            'abstract' => null,
            'description' => null,
            'founding_date' => null,
            'dissolution_date' => null,
            'status' => GeneralStatusEnum::activo,
        ]);

        // 106 - Coordinación de Educación Social y Municipal
        $coordinacion_de_educacion_social_y_municipal = Organization::create([
            'parent_id' => $secretaria_de_desarrollo_humano_y_participacion->id,
            'slug' => 'coordinacion-de-educacion-social-y-municipal',
            'name' => 'de Educación Social y Municipal',
            'full_name' => 'Coordinación de Educación Social y Municipal',
            'other_name' => 'coordinacion de educacion social y municipal',
            'classification' => ClassificationEnum::coordinación,
            'abstract' => null,
            'description' => null,
            'founding_date' => null,
            'dissolution_date' => null,
            'status' => GeneralStatusEnum::activo,
        ]);

        // 107 - Coordinación de Jardines Municipales
        $coordinacion_de_jardines_municipales = Organization::create([
            'parent_id' => $secretaria_de_desarrollo_humano_y_participacion->id,
            'slug' => 'coordinacion-de-jardines-municipales',
            'name' => 'de Jardines Municipales',
            'full_name' => 'Coordinación de Jardines Municipales',
            'other_name' => 'coordinacion de jardines municipales',
            'classification' => ClassificationEnum::coordinación,
            'abstract' => null,
            'description' => null,
            'founding_date' => null,
            'dissolution_date' => null,
            'status' => GeneralStatusEnum::activo,
        ]);

        // 108 - Coordinación de Bancos de Tierras
        $coordinacion_de_bancos_de_tierras = Organization::create([
            'parent_id' => $secretaria_de_desarrollo_humano_y_participacion->id,
            'slug' => 'coordinacion-de-bancos-de-tierras',
            'name' => 'de Bancos de Tierras',
            'full_name' => 'Coordinación de Bancos de Tierras',
            'other_name' => 'coordinacion de bancos de tierras',
            'classification' => ClassificationEnum::coordinación,
            'abstract' => null,
            'description' => null,
            'founding_date' => null,
            'dissolution_date' => null,
            'status' => GeneralStatusEnum::activo,
        ]);

        // 109 - Coordinación de Presupuesto Participativo
        $coordinacion_de_presupuesto_participativo = Organization::create([
            'parent_id' => $secretaria_de_desarrollo_humano_y_participacion->id,
            'slug' => 'coordinacion-de-presupuesto-participativo',
            'name' => 'de Presupuesto Participativo',
            'full_name' => 'Coordinación de Presupuesto Participativo',
            'other_name' => 'coordinacion de presupuesto participativo',
            'classification' => ClassificationEnum::coordinación,
            'abstract' => null,
            'description' => null,
            'founding_date' => null,
            'dissolution_date' => null,
            'status' => GeneralStatusEnum::activo,
        ]);

        // 110 - Coordinación de Urbanización Social
        $coordinacion_de_urbanizacion_social = Organization::create([
            'parent_id' => $secretaria_de_desarrollo_humano_y_participacion->id,
            'slug' => 'coordinacion-de-urbanizacion-social',
            'name' => 'de Urbanización Social',
            'full_name' => 'Coordinación de Urbanización Social',
            'other_name' => 'coordinacion de urbanizacion social',
            'classification' => ClassificationEnum::coordinación,
            'abstract' => null,
            'description' => null,
            'founding_date' => null,
            'dissolution_date' => null,
            'status' => GeneralStatusEnum::activo,
        ]);

        // 111 - Coordinación del centro Taragui
        $coordinacion_del_centro_taragui = Organization::create([
            'parent_id' => $secretaria_de_desarrollo_humano_y_participacion->id,
            'slug' => 'coordinacion-del-centro-taragui',
            'name' => 'del Centro Taragui',
            'full_name' => 'Coordinación del Centro Taragui',
            'other_name' => 'coordinacion del centro taragui',
            'classification' => ClassificationEnum::coordinación,
            'abstract' => null,
            'description' => null,
            'founding_date' => null,
            'dissolution_date' => null,
            'status' => GeneralStatusEnum::activo,
        ]);

        // 112 - Coordinación de Escuela de Artes y Oficios
        $coordinacion_de_escuela_de_artes_y_oficios = Organization::create([
            'parent_id' => $secretaria_de_desarrollo_humano_y_participacion->id,
            'slug' => 'coordinacion-de-escuela-de-artes-y-oficios',
            'name' => 'de Escuela de Artes y Oficios',
            'full_name' => 'Coordinación de Escuela de Artes y Oficios',
            'other_name' => 'coordinacion de escuela de artes y oficios',
            'classification' => ClassificationEnum::coordinación,
            'abstract' => null,
            'description' => null,
            'founding_date' => null,
            'dissolution_date' => null,
            'status' => GeneralStatusEnum::activo,
        ]);

        // 113 - Dirección de Promoción Comunitaria
        $direccion_de_promocion_comunitaria = Organization::create([
            'parent_id' => $secretaria_de_accion_social->id,
            'slug' => 'direccion-de-promocion-comunitaria',
            'name' => 'de Promoción Comunitaria',
            'full_name' => 'Dirección de Promoción Comunitaria',
            'other_name' => 'direccion de promocion comunitaria',
            'classification' => ClassificationEnum::dirección,
            'abstract' => null,
            'description' => null,
            'founding_date' => null,
            'dissolution_date' => null,
            'status' => GeneralStatusEnum::activo,
        ]);

        // 114 - Dirección de Juventud
        $direccion_de_juventud = Organization::create([
            'parent_id' => $secretaria_de_accion_social->id,
            'slug' => 'direccion-de-juventud',
            'name' => 'de Juventud',
            'full_name' => 'Dirección de Juventud',
            'other_name' => 'direccion de juventud',
            'classification' => ClassificationEnum::dirección,
            'abstract' => null,
            'description' => null,
            'founding_date' => null,
            'dissolution_date' => null,
            'status' => GeneralStatusEnum::activo,
        ]);

        // 115 - Dirección de Equidad y Género
        $direccion_de_equidad_y_genero = Organization::create([
            'parent_id' => $secretaria_de_accion_social->id,
            'slug' => 'direccion-de-equidad-y-genero',
            'name' => 'de Equidad y Género',
            'full_name' => 'Dirección de Equidad y Género',
            'other_name' => 'direccion de equidad y genero',
            'classification' => ClassificationEnum::dirección,
            'abstract' => null,
            'description' => null,
            'founding_date' => null,
            'dissolution_date' => null,
            'status' => GeneralStatusEnum::activo,
        ]);

        // 116 - Dirección de Derechos Humanos
        $direccion_de_derechos_humanos = Organization::create([
            'parent_id' => $secretaria_de_accion_social->id,
            'slug' => 'direccion-de-derechos-humanos',
            'name' => 'de Derechos Humanos',
            'full_name' => 'Dirección de Derechos Humanos',
            'other_name' => 'direccion de derechos humanos',
            'classification' => ClassificationEnum::dirección,
            'abstract' => null,
            'description' => null,
            'founding_date' => null,
            'dissolution_date' => null,
            'status' => GeneralStatusEnum::activo,
        ]);

        // 117 - Coordinación de la Secretaría de Acción Social
        $coordinacion_de_la_secretaria_de_accion_social = Organization::create([
            'parent_id' => $secretaria_de_accion_social->id,
            'slug' => 'coordinacion-de-la-secretaria-de-accion-social',
            'name' => 'de la Secretaria de Acción Social',
            'full_name' => 'Coordinación de la Secretaría de Acción Social',
            'other_name' => 'coordinacion de la secretaria de accion social',
            'classification' => ClassificationEnum::coordinación,
            'abstract' => null,
            'description' => null,
            'founding_date' => null,
            'dissolution_date' => null,
            'status' => GeneralStatusEnum::activo,
        ]);

        // 118 - Coordinación de Políticas para la Mujer, Género y Diversidad
        $coordinacion_de_politicas_para_la_mujer_genero_y_diversidad = Organization::create([
            'parent_id' => $secretaria_de_accion_social->id,
            'slug' => 'coordinacion-de-politicas-para-la-mujer-genero-y-diversidad',
            'name' => 'de Políticas para la Mujer, Género y Diversidad',
            'full_name' => 'Coordinación de Políticas para la Mujer, Género y Diversidad',
            'other_name' => 'coordinacion de politicas para la mujer, genero y diversidad',
            'classification' => ClassificationEnum::coordinación,
            'abstract' => null,
            'description' => null,
            'founding_date' => null,
            'dissolution_date' => null,
            'status' => GeneralStatusEnum::activo,
        ]);

        // 119 - Coordinación Programa Participativo
        $coordinacion_programa_participativo = Organization::create([
            'parent_id' => $secretaria_de_accion_social->id,
            'slug' => 'coordinacion-programa-participativo',
            'name' => 'Programa Participativo',
            'full_name' => 'Coordinación Programa Participativo',
            'other_name' => 'coordinacion programa participativo',
            'classification' => ClassificationEnum::coordinación,
            'abstract' => null,
            'description' => null,
            'founding_date' => null,
            'dissolution_date' => null,
            'status' => GeneralStatusEnum::activo,
        ]);

        // 120 - Coordinación de Asistencia Social
        $coordinacion_de_asistencia_social = Organization::create([
            'parent_id' => $secretaria_de_accion_social->id,
            'slug' => 'coordinacion-de-asistencia-social',
            'name' => 'de Asistencia Social',
            'full_name' => 'Coordinación de Asistencia Social',
            'other_name' => 'coordinacion de asistencia social',
            'classification' => ClassificationEnum::coordinación,
            'abstract' => null,
            'description' => null,
            'founding_date' => null,
            'dissolution_date' => null,
            'status' => GeneralStatusEnum::activo,
        ]);

        // 121 - Oficina de Donaciones
        $oficina_de_donaciones = Organization::create([
            'parent_id' => $secretaria_de_accion_social->id,
            'slug' => 'oficina-de-donaciones',
            'name' => 'de Donaciones',
            'full_name' => 'Oficina de Donaciones',
            'other_name' => 'oficina de donaciones',
            'classification' => ClassificationEnum::coordinación,
            'abstract' => null,
            'description' => null,
            'founding_date' => null,
            'dissolution_date' => null,
            'status' => GeneralStatusEnum::activo,
        ]);

        // 122 - Oficina Consejo Consultivo
        $oficina_consejo_consultivo = Organization::create([
            'parent_id' => $secretaria_de_accion_social->id,
            'slug' => 'oficina-consejo-consultivo',
            'name' => 'Consejo Consultivo',
            'full_name' => 'Oficina de Concejo Consultivo',
            'other_name' => 'oficina consejo consultivo',
            'classification' => ClassificationEnum::coordinación,
            'abstract' => null,
            'description' => null,
            'founding_date' => null,
            'dissolution_date' => null,
            'status' => GeneralStatusEnum::activo,
        ]);

        // 123 - Oficina de Tercera Edad
        $oficina_de_tercera_edad = Organization::create([
            'parent_id' => $secretaria_de_accion_social->id,
            'slug' => 'oficina-de-tercera-edad',
            'name' => 'de Tercera Edad',
            'full_name' => 'Oficina de Tercera Edad',
            'other_name' => 'oficina de tercera edad',
            'classification' => ClassificationEnum::coordinación,
            'abstract' => null,
            'description' => null,
            'founding_date' => null,
            'dissolution_date' => null,
            'status' => GeneralStatusEnum::activo,
        ]);

        // 124 - Coordinación del Área de Salud Municpal
        $coordinacion_del_area_de_salud_municpal = Organization::create([
            'parent_id' => $secretaria_de_salud->id,
            'slug' => 'coordinacion-del-area-de-salud-municpal',
            'name' => 'del Área de Salud Municpal',
            'full_name' => 'Coordinación del Área de Salud Municipal',
            'other_name' => 'coordinacion del area de salud municpal',
            'classification' => ClassificationEnum::coordinación,
            'abstract' => null,
            'description' => null,
            'founding_date' => null,
            'dissolution_date' => null,
            'status' => GeneralStatusEnum::activo,
        ]);

        // 125 - Centro Odontológico
        $centro_odontologico = Organization::create([
            'parent_id' => $secretaria_de_salud->id,
            'slug' => 'centro-odontologico',
            'name' => 'Odontológico',
            'full_name' => 'Centro Odontológico',
            'other_name' => 'centro odontologico',
            'classification' => ClassificationEnum::centro,
            'abstract' => null,
            'description' => null,
            'founding_date' => null,
            'dissolution_date' => null,
            'status' => GeneralStatusEnum::activo,
        ]);

        // 126 - Coordinación General de Agentes Sanitarios
        $coordinacion_general_de_agentes_sanitarios = Organization::create([
            'parent_id' => $secretaria_de_salud->id,
            'slug' => 'coordinacion-general-de-agentes-sanitarios',
            'name' => 'General de Agentes Sanitarios',
            'full_name' => 'Coordinación General de Agentes Sanitarios',
            'other_name' => 'coordinacion general de agentes sanitarios',
            'classification' => ClassificationEnum::coordinación,
            'abstract' => null,
            'description' => null,
            'founding_date' => null,
            'dissolution_date' => null,
            'status' => GeneralStatusEnum::activo,
        ]);

        // 127 - Coordinación Técnica en Pediatría
        $coordinacion_tecnica_en_pediatria = Organization::create([
            'parent_id' => $secretaria_de_salud->id,
            'slug' => 'coordinacion-tecnica-en-pediatria',
            'name' => 'Técnica en Pediatría',
            'full_name' => 'Coordinación Técnica en Pediatría',
            'other_name' => 'coordinacion tecnica en pediatria',
            'classification' => ClassificationEnum::coordinación,
            'abstract' => null,
            'description' => null,
            'founding_date' => null,
            'dissolution_date' => null,
            'status' => GeneralStatusEnum::activo,
        ]);

        // 128 - Coordinación Técnica en Medicina de Adultos
        $coordinacion_tecnica_en_medicina_de_adultos = Organization::create([
            'parent_id' => $secretaria_de_salud->id,
            'slug' => 'coordinacion-tecnica-en-medicina-de-adultos',
            'name' => 'Técnica en Medicina de Adultos',
            'full_name' => 'Coordinación Técnica en Medicina de Adultos',
            'other_name' => 'coordinacion tecnica en medicina de adultos',
            'classification' => ClassificationEnum::coordinación,
            'abstract' => null,
            'description' => null,
            'founding_date' => null,
            'dissolution_date' => null,
            'status' => GeneralStatusEnum::activo,
        ]);

        // 129 - Coordinación de Salud Comunitaria
        $coordinacion_de_salud_comunitaria = Organization::create([
            'parent_id' => $secretaria_de_salud->id,
            'slug' => 'coordinacion-de-salud-comunitaria',
            'name' => 'de Salud Comunitaria',
            'full_name' => 'Coordinación de Salud Comunitaria',
            'other_name' => 'coordinacion de salud comunitaria',
            'classification' => ClassificationEnum::coordinación,
            'abstract' => null,
            'description' => null,
            'founding_date' => null,
            'dissolution_date' => null,
            'status' => GeneralStatusEnum::activo,
        ]);

        // 130 - Coordinación de Centros de Atención Primaria de Salud
        $coordinacion_de_centros_de_atencion_primaria_de_salud = Organization::create([
            'parent_id' => $secretaria_de_salud->id,
            'slug' => 'coordinacion-de-centros-de-atencion-primaria-de-salud',
            'name' => 'de Centros de Atención Primaria de Salud',
            'full_name' => 'Coordinación de Centros de Atención Primaria de Salud',
            'other_name' => 'coordinacion de centros de atencion primaria de salud',
            'classification' => ClassificationEnum::coordinación,
            'abstract' => null,
            'description' => null,
            'founding_date' => null,
            'dissolution_date' => null,
            'status' => GeneralStatusEnum::activo,
        ]);

        // 131 - Juzgado de Faltas
        $juzgado_de_faltas = Organization::create([
            'parent_id' => $intendencia->id,
            'slug' => 'juzgado-de-faltas',
            'name' => 'Juzgado de Faltas',
            'full_name' => 'Juzgado de Faltas',
            'other_name' => 'juzgado de faltas',
            'classification' => ClassificationEnum::nc,
            'abstract' => null,
            'description' => null,
            'founding_date' => null,
            'dissolution_date' => null,
            'status' => GeneralStatusEnum::activo,
        ]);

        // 132 - Secretaría del Tribunal Municipal de Faltas
        $secretaria_del_tribunal_municipal_de_faltas = Organization::create([
            'parent_id' => $juzgado_de_faltas->id,
            'slug' => 'secretaria-del-tribunal-municipal-de-faltas',
            'name' => 'Secretaría del Tribunal Municipal de Faltas',
            'full_name' => 'Secretaría del Tribunal Municipal de Faltas',
            'other_name' => 'secretaria del tribunal municipal de faltas',
            'classification' => ClassificationEnum::nc,
            'abstract' => null,
            'description' => null,
            'founding_date' => null,
            'dissolution_date' => null,
            'status' => GeneralStatusEnum::activo,
        ]);

        // 133 - Dirección de Discapacidad
        $direccion_de_discapacidad = Organization::create([
            'parent_id' => $secretaria_de_salud->id,
            'slug' => 'direccion-de-discapacidad',
            'name' => 'de Discapacidad',
            'full_name' => 'Dirección de Discapacidad',
            'other_name' => 'direccion de discapacidad',
            'classification' => ClassificationEnum::coordinación,
            'abstract' => null,
            'description' => null,
            'founding_date' => null,
            'dissolution_date' => null,
            'status' => GeneralStatusEnum::activo,
        ]);
    }
}
