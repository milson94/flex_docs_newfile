<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale: 1.0">
    <title>Currículo Vitae</title>
    <style>
        /* Resets and Base Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html,
        body {
            width: 100%;
            height: auto;
            margin: 0;
            padding: 0;
        }

        body {
            width: 595px;
            margin: 0 auto;
            font-family: 'Roboto', sans-serif;
            font-weight: 400;
            color: #333;
            font-size: 12px;
            line-height: 14px;
            padding: 20px;
            position: relative;
        }


        /* Subsequent Pages Styling */
        @media print {
            @page {
                margin: 2.5cm;
            }
        }

        .cv-container {
            width: 100%;
            max-width: 800px;
            margin: 0 auto;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .left-column,
        .right-column {
            width: 100%;
            max-width: 100%;
            overflow: hidden;
            margin-bottom: 15px;
        }

        .title {
            text-align: center;
            font-size: 32px;
            font-weight: bold;
            margin-bottom: 20px;
            color: #555;
            position: relative;
            top: 20px;
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
        }

        .role {
            font-size: 16px;
            color: #2c3e50;
            margin-bottom: 15px;
        }

        .contact-info,
        .summary,
        .section {
            margin-bottom: 15px;
        }

        .contact-info p,
        .summary p {
            margin: 3px 0;
            font-size: 12px;
            color: #555;
        }

        .section__title {
            font-size: 16px;
            text-align: left;
            font-weight: bold;
            margin-bottom: 8px;
            text-transform: uppercase;
            color: #222;
            border-bottom: 1px solid #ddd;
            padding-bottom: 5px;
        }

        .experience-item,
        .education-item,
        .reference-item {
            margin-bottom: 10px;
        }

        .experience-item h3,
        .education-item h3,
        .reference-item h3 {
            font-size: 14px;
            font-weight: bold;
            color: #333;
            margin: 0 0 5px 0;
            text-align: left;
        }

        .experience-item p,
        .education-item p,
        .reference-item p {
            margin: 2px 0;
            font-size: 12px;
            color: #555;
        }

        .date {
            color: #4682b4;
            font-style: italic;
        }

        .skills-list,
        .languages-list {
            list-style: none;
            margin-bottom: 5px;
        }

        .skills-list li,
        .languages-list li {
            margin-bottom: 3px;
            font-size: 12px;
            color: #555;
        }

        .language-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 5px;
            font-size: 12px;
        }

        .language-table th,
        .language-table td {
            border: 1px solid #ddd;
            padding: 4px;
            text-align: left;
        }

        .language-table th {
            background-color: #f2f2f2;
        }

        .footer {
            text-align: center;
            font-size: 8px;
            color: #777;
            border-top: 1px solid #ddd;
            padding-top: 10px;
            width: 100%;
            position: relative;
            margin-top: 20px;
        }

        .contact-label {
            font-weight: bold;
            margin-right: 5px;
        }
    </style>
    <link href='https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap' rel='stylesheet'
        type='text/css'>
</head>

<body>

    <div class="cv-container">
        <p class="title">CURRÍCULO VITAE</p>
        <div class="header">
            <h1>
                <span class="first-name">{{ $first_name ?? 'N/A' }}</span>
                <span class="last-name">{{ $last_name ?? 'N/A' }}</span>
            </h1>
            <p class="role">{{ $role ?? 'N/A' }}</p>
        </div>
        <!-- Left Column: Personal Data, Summary, Education, Skills, Languages -->
        <div class="left-column">
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
        </div>
        <!-- Right Column: Experience, References, Additional Information -->
        <div class="right-column">
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
                        <tr>
                            <th>Idioma</th>
                            <th>Conversação</th>
                            <th>Leitura</th>
                            <th>Escrita</th>
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
        <div class="footer">
            <!-- Footer content can go here -->
        </div>
    </div>
</body>

</html>