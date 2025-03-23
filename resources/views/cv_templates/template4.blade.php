<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Currículo Vitae</title>
    <style>
        /* Resets and General Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html,
        body {
            width: 100%;
            height: 100%;
            margin: 0;
            padding: 0;
        }

        body {
            /*A4 dimensions in pixels*/
            width: 695px;
            height: 842px;
            margin: 0 auto;
            background: url('https://media-hosting.imagekit.io//a82b225067224d06/background_img04.png?Expires=1835469942&Key-Pair-Id=K2ZIVPTIP2VGHC&Signature=tHAyiT1LigHrXQ0NMg0f3DYGNRx1coPVbMuu6-43C2rEKeOkfRX0rLhcX9q-DgwmGH7Kclt7IT2OzqRyxQJF33TVLK7kijmGWv5WlS0hEtVAWrAVOrVgzJ~DxNb2Y0rDjIp1CYvshMu0HJgV1Q76XZd6JpAo4d7bRkxvlEYMRM8xKUD2bPMkIU6l9zejz18QcMooGw8gGGhblG4PuAj32rYrTPYsgPbAnzvHuBcbD7LaneEdBuchh51A2IdjlOo5gi9mwB~hUqnVONbZ8O5~pXNEfBsKMHNlLoqTqKb3hO9r03EjcYoJN4g2keajLd9KnbD8yxY4kcyyTxAcRntpdQ__') no-repeat;
            background-size: 100% 100%;
            font-family: 'Arial', sans-serif;
            font-weight: 400;
            color: #333;
            font-size: 12px;
            line-height: 14px;
            position: relative;
        }

        /* CV Container */
        .cv-container {
            width: 100%;
            height: 100%;
            position: relative;
            top: 20px;
            left: 0;
            z-index: 1;
            display: block;
        }

        /* Table Layout */
        .cv-table {
            width: 100%;
            border-collapse: collapse;
            table-layout: fixed;
            page-break-after: auto;
        }

        .cv-table td {
            vertical-align: top;
            padding: 15px;
            word-break: break-word;
        }

        /* Header Row */
        .header-row {
            text-align: center;
            padding-bottom: 20px;
        }

        /* Header Content Styles */
        .header-content h1 {
            font-size: 22px;
            font-weight: 700;
            text-transform: uppercase;
            color: #1e90ff;
            margin-bottom: 4px;
        }

        .header-content p {
            font-size: 14px;
            color: #333;
            margin-bottom: 8px;
        }

        /* Section Styles */
        .section {
            margin-bottom: 15px;
            page-break-inside: avoid;
            background-color: transparent;
            padding: 0;
        }

        /* Contact and Summary Paragraphs */
        .contact-info p,
        .summary p {
            margin: 5px auto;
            font-size: 14px;
            color: #555;
            max-width: 98%;
            text-align: justify;
            word-break: break-word;
        }

        /* Section Title */
        .section__title {
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 8px;
            text-transform: uppercase;
            color: #1e90ff;
            text-align: left;
            border-bottom: 1px solid #1e90ff;
            padding-bottom: 5px;
        }

        /* Experience, Education, and Reference Items */
        .experience-item,
        .education-item,
        .reference-item {
            margin-bottom: 10px;
            page-break-inside: avoid;
        }

        .experience-item h3,
        .education-item h3,
        .reference-item h3 {
            font-size: 14px;
            font-weight: 600;
            color: #333;
            margin: 0 auto 5px;
            text-align: left;
            word-break: break-word;
        }

        .experience-item p,
        .education-item p,
        .reference-item p {
            margin: 5px auto;
            font-size: 12px;
            color: #555;
            max-width: 98%;
            text-align: justify;
            word-break: break-word;
        }

        /* Date Style */
        .date {
            color: #4682b4;
            font-style: italic;
        }

        /* Skills and Languages Lists */
        .skills-list,
        .languages-list {
            list-style: none;
            margin-bottom: 10px;
            margin-left: 0;
            text-align: left;
        }

        .skills-list li,
        .languages-list li {
            margin-bottom: 5px;
            font-size: 12px;
            color: #555;
            text-align: left;
            word-break: break-word;
        }

        /* Language Table */
        .language-table {
            width: 98%;
            border-collapse: collapse;
            margin: 8px auto;
            font-size: 12px;
        }

        .language-table th {
            background-color: #f2f2f2;
            color: #333;
            font-weight: 600;
            white-space: nowrap;
            padding: 5px;
            text-align: center;
        }

        .language-table td {
            border: 1px solid #ddd;
            padding: 5px;
            text-align: center;
            color: #555;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        /* Grid Item Styles */
        .grid-item {
            background-color: transparent;
            padding: 10px;
            color: #333;
            word-break: break-word;
        }

        .grid-item .section__title {
            text-align: left;
        }

        .grid-item p,
        .grid-item ul {
            text-align: justify;
            margin-left: auto;
            margin-right: auto;
            max-width: 98%;
            color: #555;
            word-break: break-word;
        }

        .grid-item li {
            color: #555;
            text-align: left;
            word-break: break-word;
        }

        /* Custom Title Style */
        .meu_titulo {
            text-align: center;
            font-size: 30px;
            font-weight: bold;
            position: relative;
            top: 60px;
        }

        /* Ensure left column has at least 60 lines of content */
        .left-column {
            min-height: calc(14px * 60); /* 14px line-height * 60 lines */
        }

        /* Force Experience, Education, References, and Additional Info to start on a new column or page if the left column is mostly full. */
        .section:nth-child(3) {
            page-break-before: auto;
        }

        .section:nth-child(4) {
            page-break-before: auto;
        }

        .section.experience-section {
            page-break-inside: avoid;
        }

        .section.education-section {
            page-break-inside: avoid;
        }

        .section.reference-section {
            page-break-inside: avoid;
        }

        .section.additional-information-section {
            page-break-inside: avoid;
        }

        /* Styles from the 2nd file that we need to adapt */
        .title {
            text-align: center;
            font-size: 32px;
            font-weight: bold;
            margin-bottom: 20px;
            color: #555;
            position: relative;
            top: 60px;
        }

        .header {
            margin-bottom: 15px;
            margin-top: 30px;
            text-align: right;
        }

        .header h1 {
            font-size: 24px;
            font-weight: bold;
            text-transform: uppercase;
            margin-bottom: 5px;
            color: #1e90ff;
        }

        .role {
            font-size: 16px;
            color: #2c3e50;
            margin-bottom: 15px;
        }

        .contact-label {
            font-weight: bold;
            margin-right: 5px;
        }
    </style>
</head>

<body>

    <div class="cv-container">
        <table class="cv-table">
            <tr class="header-row">
                <td colspan="2">
                    <p class="title">CURRÍCULO VITAE</p>
                    <div class="header">
                        <h1>
                            <span class="first-name">{{ $first_name ?? 'N/A' }}</span>
                            <span class="last-name">{{ $last_name ?? 'N/A' }}</span>
                        </h1>
                        <p class="role">{{ $role ?? 'N/A' }}</p>
                    </div>
                </td>
            </tr>
            <tr>
                <!-- Left Column: Personal Data, Summary, Education, Skills, Languages -->
                <td class="left-column">
                    <div class="section">
                        <div class="section__title">Detalhes Pessoais</div>
                        <div class="contact-info">
                            <p><span class="contact-label">Nacionalidade:</span> {{ $nationality ?? 'N/A' }}</p>
                            <p><span class="contact-label">Data de Nascimento:</span> {{ $date_of_birth ?? 'N/A' }}</p>
                            <p><span class="contact-label">Local de Nascimento:</span> {{ $place_of_birth ?? 'N/A' }}</p>
                            <p><span class="contact-label">Gênero:</span> {{ $gender == 'male' ? 'Masculino' : ($gender == 'female' ? 'Feminino' : ($gender ?? 'Outro')) }}</p>
                            <p><span class="contact-label">Email:</span> {{ $email ?? 'N/A' }}</p>
                            <p><span class="contact-label">LinkedIn:</span> {{ $linkedin ?? 'N/A' }}</p>
                            <p><span class="contact-label">Celular:</span> {{ $phone_number ?? 'N/A' }}</p>
                            <p><span class="contact-label">Endereço:</span> {{ $location ?? 'N/A' }}</p>
                        </div>
                    </div>
                    <div class="section summary">
                        <div class="section__title">Resumo</div>
                        <p>{{ $summary ?? 'N/A' }}</p>
                    </div>
                    <!-- Education -->
                    <div class="section education-section">
                        <div class="section__title">Educação</div>
                        @if (!empty($educations) && is_array($educations))
                        @foreach ($educations as $education)
                        <div class="education-item">
                            <h3>{{ $education['degree'] ?? 'N/A' }} - {{ $education['school'] ?? 'N/A' }}</h3>
                            <p><em>Ano de Conclusão: {{ $education['year_of_completion'] ?? 'N/A' }}</em></p>
                        </div>
                        @endforeach
                        @else
                        <p>Sem educação adicionada.</p>
                        @endif
                    </div>
                    <!-- Additional Content to Ensure Minimum Height -->
                    <div class="section">
                        <div class="section__title">Experiência Profissional</div>
                        <p>Descrição detalhada da experiência profissional para garantir que o conteúdo da coluna esquerda tenha pelo menos 60 linhas.</p>
                        <p>Adicione mais parágrafos conforme necessário para atingir o comprimento mínimo desejado.</p>
                        <p>Este é um exemplo de texto adicional para preencher o espaço e garantir que a coluna esquerda tenha conteúdo suficiente antes de passar para a coluna direita.</p>
                        <p>Continue adicionando conteúdo até que a coluna esquerda tenha pelo menos 60 linhas de texto.</p>
                        <p>Você pode adicionar mais informações sobre projetos, habilidades, ou qualquer outro detalhe relevante para o currículo.</p>
                        <p>Certifique-se de que o texto seja relevante e bem estruturado para manter a qualidade do currículo.</p>
                        <!-- Add more paragraphs as needed -->
                    </div>
                </td>
                <!-- Right Column: Experience, References, Additional Information -->
                <td class="right-column">
                    <!-- Habilidades -->
                    <div class="section">
                        <div class="section__title">Habilidades</div>
                        <ul class="skills-list">
                            @if (!empty($skills) && (is_array($skills) || is_string($skills)))
                            @foreach (is_array($skills) ? $skills : explode(',', $skills) as $skill)
                            <li>{{ trim($skill) }}</li>
                            @endforeach
                            @else
                            <p>Sem habilidades adicionadas.</p>
                            @endif
                        </ul>
                    </div>
                    <!-- Idiomas -->
                    <div class="section">
                        <div class="section__title">Idiomas</div>
                        @if (!empty($languages) && is_array($languages))
                        <table class="language-table">
                            <thead>
                                <tr style="border: 1px solid #ddd;">
                                    <th style="border: 1px solid #ddd;">Idioma</th>
                                    <th style="border: 1px solid #ddd;">Conversação</th>
                                    <th style="border: 1px solid #ddd;">Leitura</th>
                                    <th style="border: 1px solid #ddd;">Escrita</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($languages as $language)
                                <tr>
                                    <td>{{ $language['language'] ?? 'N/A' }}</td>
                                    <td>{{ $language['speaking_level'] == 'basic' ? 'Básico' : ($language['speaking_level'] == 'good' ? 'Bom' : 'Fluente') }}</td>
                                    <td>{{ $language['reading_level'] == 'basic' ? 'Básico' : ($language['reading_level'] == 'good' ? 'Bom' : 'Fluente') }}</td>
                                    <td>{{ $language['writing_level'] == 'basic' ? 'Básico' : ($language['writing_level'] == 'good' ? 'Bom' : 'Fluente') }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @else
                        <p>Sem idiomas adicionados.</p>
                        @endif
                    </div>
                    <!-- Experience -->
                    <div class="section">
                        <div class="section__title">Experiência</div>
                        @if (!empty($experiences))
                        @foreach ($experiences as $experience)
                        <div class="experience-item">
                            <h3>{{ $experience['title'] }} - {{ $experience['company_name'] }}</h3>
                            <p><em>{{ $experience['start_date'] }} - {{ $experience['end_date'] ?: 'Atual' }}</em></p>
                            @if (!empty($experience['company_description']))
                            <p>Descrição da Empresa: {{ $experience['company_description'] }}</p>
                            @endif
                            @if (!empty($experience['achievements']))
                            <p>Conquistas: {{ $experience['achievements'] }}</p>
                            @endif
                            @if (!empty($experience['duties']))
                            <p>Responsabilidades:</p>
                            <ul>
                                @foreach (is_array($experience['duties']) ? $experience['duties'] : explode(',', $experience['duties']) as $duty)
                                <li>{{ trim($duty) }}</li>
                                @endforeach
                            </ul>
                            @endif
                        </div>
                        @endforeach
                        @else
                        <p>Sem experiência adicionada.</p>
                        @endif
                    </div>
                    <!-- References -->
                    <div class="grid-item section">
                        <div class="section__title">Referências</div>
                        @if (!empty($references))
                        @foreach ($references as $reference)
                        <div class="reference-item">
                            <h3>{{ $reference['reference_name'] }}</h3>
                            <p>Cargo: {{ $reference['reference_position'] }}</p>
                            <p>Telefone: {{ $reference['reference_phone'] }}</p>
                        </div>
                        @endforeach
                        @else
                        <p>Sem referências adicionadas.</p>
                        @endif
                    </div>
                    <div class="section">
                        <div class="section__title">Informações Adicionais</div>
                        <div class="grid-item">
                            @if (!empty($additional_information))
                            <ul>
                                @foreach ($additional_information as $info)
                                <li>{{ $info }}</li>
                                @endforeach
                            </ul>
                            @else
                            <p>Sem informações adicionadas.</p>
                            @endif
                        </div>
                    </div>
                </td>
            </tr>
        </table>
        <div class="footer">
            <!-- Footer content can go here -->
        </div>
    </div>
</body>

</html>
