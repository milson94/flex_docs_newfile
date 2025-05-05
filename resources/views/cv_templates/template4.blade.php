<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Currículo Vitae - Template 7 (Hybrid Columns - 800px)</title>
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
            /* Let height be determined by content, ensure it's at least A4 for background */
           /* height: 100%; */
            margin: 0;
            padding: 0;
            -webkit-print-color-adjust: exact;
            print-color-adjust: exact;
        }

        body {
            width: 695px; /* Approx A4 width */
            min-height: 1042px; /* Approx A4 height */
            margin: 0 auto;
            background: url('https://media-hosting.imagekit.io//a82b225067224d06/background_img04.png?Expires=1835469942&Key-Pair-Id=K2ZIVPTIP2VGHC&Signature=tHAyiT1LigHrXQ0NMg0f3DYGNRx1coPVbMuu6-43C2rEKeOkfRX0rLhcX9q-DgwmGH7Kclt7IT2OzqRyxQJF33TVLK7kijmGWv5WlS0hEtVAWrAVOrVgzJ~DxNb2Y0rDjIp1CYvshMu0HJgV1Q76XZd6JpAo4d7bRkxvlEYMRM8xKUD2bPMkIU6l9zejz18QcMooGw8gGGhblG4PuAj32rYrTPYsgPbAnzvHuBcbD7LaneEdBuchh51A2IdjlOo5gi9mwB~hUqnVONbZ8O5~pXNEfBsKMHNlLoqTqKb3hO9r03EjcYoJN4g2keajLd9KnbD8yxY4kcyyTxAcRntpdQ__') no-repeat;
            background-size: 100% 100%;
            font-family: 'human', sans-serif;
            font-weight: 400;
            color: #333;
            font-size: 12px;
            line-height: 1.4;
            position: relative;
        }

        /* CV Container */
        .cv-container {
            width: 100%;
            min-height: 100%;
            padding: 40px 20px 20px 20px;
            position: relative;
            z-index: 1;
        }

        /* Header Area (Title, Name, Role) */
        .cv-header {
            position: relative;
            margin-bottom: 30px;
            padding-top: 10px;
        }

        .cv-title {
            text-align: center;
            color: darkblue;
            font-size: 28.8px;
            font-weight: bold;
            position: absolute;
            top: -20px;
            left: 0;
            right: 0;
        }

        .name-role-block {
            text-align: left;
        }

        .name-role-block h1 {
            font-size: 24px;
            font-weight: bold;
            text-transform: uppercase;
            margin-bottom: 5px;
            color: #1e90ff;
        }

        .name-role-block .role {
            font-size: 16px;
            color: #2c3e50;
            margin-bottom: 15px;
        }

        /* --- Use CSS Columns on the main content area --- */
        .main-content-area {
            column-count: 2;
            column-gap: 25px; /* Adjust gap as needed */
            width: 100%;
            text-align: left;
        }

        /* --- REMOVED Flexbox/Manual Column DIVs --- */

        /* Section Styles */
        .section {
            margin-bottom: 15px;
            /* REMOVED break-inside: avoid; from here to allow sections to split */
            page-break-inside: avoid; /* Still useful for print */
            background-color: transparent;
            padding: 0;
        }

        .section__title {
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 8px;
            text-transform: uppercase;
            color: #1e90ff;
            border-bottom: 1px solid #1e90ff;
            padding-bottom: 5px;
            text-align: left;
            /* Add break-after avoid if titles sometimes get orphaned */
            /* break-after: avoid-column; */
        }

        /* Content Item Styles */
        .contact-info p,
        .summary p,
        .experience-item p,
        .education-item p,
        .reference-item p,
        .grid-item p {
            margin-top: 0;
            margin-bottom: 5px;
            font-size: 12px;
            color: #555;
            text-align: justify;
            word-break: break-word;
        }
         .contact-info p {
             text-align: left;
         }

        .contact-label {
            font-weight: bold;
            margin-right: 5px;
            color: #333;
        }

        /* KEEP break-inside avoid on smaller, logical units */
        .experience-item,
        .education-item,
        .reference-item {
            margin-bottom: 10px;
            break-inside: avoid; /* Prevent these specific items from breaking mid-item */
            page-break-inside: avoid;
        }
        .language-table {
             break-inside: avoid; /* Prevent table breaking */
             page-break-inside: avoid;
        }
        .skills-list li {
             /* Usually don't need break-inside avoid on list items */
        }


        .experience-item h3,
        .education-item h3,
        .reference-item h3 {
            font-size: 14px;
            font-weight: 600;
            color: #333;
            margin: 0 0 5px 0;
            text-align: left;
        }

        .experience-item ul,
        .grid-item ul {
             list-style-position: outside;
             padding-left: 18px;
             margin-top: 5px;
             margin-bottom: 5px;
             text-align: justify;
        }
         .experience-item li,
         .grid-item li {
            margin-bottom: 3px;
            color: #555;
         }

        /* Date Style */
        .date {
            color: #4682b4;
            font-style: italic;
            font-size: 11px;
        }

        /* Skills List */
        .skills-list {
            list-style: disc;
            margin-bottom: 10px;
            padding-left: 18px;
            text-align: left;
        }
        .skills-list li {
            margin-bottom: 5px;
            font-size: 12px;
            color: #555;
            word-break: break-word;
        }

        /* Language Table */
        .language-table {
            width: 100%;
            border-collapse: collapse;
            margin: 8px 0;
            font-size: 11px;
            /* break-inside: avoid; */ /* Already added above */
            /* page-break-inside: avoid; */ /* Already added above */
        }
        .language-table th,
        .language-table td {
            border: 1px solid #ddd;
            padding: 4px;
            text-align: center;
            color: #555;
            white-space: nowrap;
        }
        .language-table th {
            background-color: #f2f2f2;
            color: #333;
            font-weight: 600;
        }

        /* Footer Placeholder */
        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 10px;
            color: #888;
        }

    </style>
</head>

<body>
    <div class="cv-container">

        <!-- Header: Title, Name, Role -->
        <div class="cv-header">
            <p class="cv-title">CURRÍCULO VITAE</p>
            <div class="name-role-block">
                <h1>
                    <span>{{ $first_name ?? 'N/A' }}</span>
                    <span>{{ $last_name ?? 'N/A' }}</span>
                </h1>
                <p class="role">{{ $role ?? 'N/A' }}</p>
            </div>
        </div>

        <!-- Main Content Area with CSS Columns -->
        <div class="main-content-area">

            <!-- Personal Details -->
            <div class="section contact-info">
                <div class="section__title">Detalhes Pessoais</div>
                <p><span class="contact-label">Nacionalidade:</span> {{ $nationality ?? 'N/A' }}</p>
                <p><span class="contact-label">Data de Nascimento:</span> {{ $date_of_birth ?? 'N/A' }}</p>
                <p><span class="contact-label">Local de Nascimento:</span> {{ $place_of_birth ?? 'N/A' }}</p>
                <p><span class="contact-label">Gênero:</span> {{ $gender == 'male' ? 'Masculino' : ($gender == 'female' ? 'Feminino' : ($gender ?? 'Outro')) }}</p>
                <p><span class="contact-label">Email:</span> {{ $email ?? 'N/A' }}</p>
                <p><span class="contact-label">LinkedIn:</span> {{ $linkedin ?? 'N/A' }}</p>
                <p><span class="contact-label">Celular:</span> {{ $phone_number ?? 'N/A' }}</p>
                <p><span class="contact-label">Endereço:</span> {{ $location ?? 'N/A' }}</p>
            </div>

            <!-- Summary -->
            <div class="section summary">
                <div class="section__title">Resumo</div>
                <p>{{ $summary ?? 'N/A' }}</p>
            </div>

            <!-- Experience -->
            <div class="section experience-section">
                <div class="section__title">Experiência Profissional</div>
                @forelse ($experiences as $experience)
                <div class="experience-item">
                    <h3>{{ $experience['title'] ?? 'N/A' }} - {{ $experience['company_name'] ?? 'N/A' }}</h3>
                    <p class="date"><em>{{ $experience['start_date'] ?? '?' }} - {{ $experience['current'] ? 'Atual' : ($experience['end_date'] ?? '?') }}</em></p>
                    @if (!empty($experience['company_description']))
                        <p><strong>Descrição da Empresa:</strong> {{ $experience['company_description'] }}</p>
                    @endif
                     @if (!empty($experience['duties']) && is_array($experience['duties']) && count($experience['duties']) > 0 && !empty(array_filter($experience['duties'])[0]))
                        <p><strong>Responsabilidades:</strong></p>
                        <ul>
                            @foreach ($experience['duties'] as $duty)
                                @if(!empty(trim($duty)))
                                    <li>{{ trim($duty) }}</li>
                                @endif
                            @endforeach
                        </ul>
                    @elseif (!empty($experience['duties']) && is_string($experience['duties']))
                        <p><strong>Responsabilidades:</strong> {{ $experience['duties'] }}</p>
                    @endif
                    @if (!empty($experience['achievements']))
                    <p><strong>Conquistas:</strong> {{ $experience['achievements'] }}</p>
                    @endif
                </div>
                @empty
                <p>Nenhuma experiência profissional adicionada.</p>
                @endforelse
            </div>

            <!-- Education -->
            <div class="section education-section">
                <div class="section__title">Educação</div>
                @forelse ($educations as $education)
                <div class="education-item">
                    <h3>{{ $education['degree'] ?? 'N/A' }} - {{ $education['school'] ?? 'N/A' }}</h3>
                    <p class="date"><em>Ano de Conclusão: {{ $education['year_of_completion'] ?? 'N/A' }}</em></p>
                </div>
                @empty
                <p>Nenhuma educação adicionada.</p>
                @endforelse
            </div>

            <!-- Skills -->
            <div class="section skills-section">
                <div class="section__title">Habilidades</div>
                 @if (!empty($skills))
                    <ul class="skills-list">
                        @php
                            $skillItems = is_array($skills) ? $skills : explode(',', $skills);
                        @endphp
                        @foreach ($skillItems as $skill)
                            @if(!empty(trim($skill)))
                                <li>{{ trim($skill) }}</li>
                            @endif
                        @endforeach
                    </ul>
                @else
                    <p>Nenhuma habilidade adicionada.</p>
                @endif
            </div>

            <!-- Languages -->
            <div class="section languages-section">
                <div class="section__title">Idiomas</div>
                @if (!empty($languages) && is_array($languages) && count($languages) > 0)
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
                            <td>{{ $language['speaking_level'] == 'basic' ? 'Básico' : ($language['speaking_level'] == 'good' ? 'Bom' : ($language['speaking_level'] == 'fluent' ? 'Fluente' : 'N/A')) }}</td>
                            <td>{{ $language['reading_level'] == 'basic' ? 'Básico' : ($language['reading_level'] == 'good' ? 'Bom' : ($language['reading_level'] == 'fluent' ? 'Fluente' : 'N/A')) }}</td>
                            <td>{{ $language['writing_level'] == 'basic' ? 'Básico' : ($language['writing_level'] == 'good' ? 'Bom' : ($language['writing_level'] == 'fluent' ? 'Fluente' : 'N/A')) }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                <p>Nenhum idioma adicionado.</p>
                @endif
            </div>

            <!-- References -->
            <div class="section reference-section">
                <div class="section__title">Referências</div>
                @forelse ($references as $reference)
                <div class="reference-item">
                    <h3>{{ $reference['reference_name'] ?? 'N/A' }}</h3>
                    @if (!empty($reference['reference_position']))
                         <p><strong>Cargo:</strong> {{ $reference['reference_position'] }}</p>
                    @endif
                    @if (!empty($reference['reference_phone']))
                        <p><strong>Telefone:</strong> {{ $reference['reference_phone'] }}</p>
                    @endif
                 </div>
                @empty
                <p>Referências disponíveis mediante solicitação.</p>
                @endforelse
            </div>

            <!-- Additional Information -->
            <div class="section additional-information-section">
                <div class="section__title">Informações Adicionais</div>
                <div class="grid-item">
                    @if (!empty($additional_information) && is_array($additional_information) && count($additional_information) > 0 && !empty(array_filter($additional_information)[0]))
                        <ul>
                            @foreach ($additional_information as $info)
                                @if(!empty(trim($info)))
                                    <li>{{ trim($info) }}</li>
                                @endif
                            @endforeach
                        </ul>
                    @else
                        <p>Nenhuma informação adicional fornecida.</p>
                    @endif
                </div>
            </div>

        </div> <!-- End Main Content Area -->

        <div class="footer">
            <!-- Footer content -->
        </div>
    </div> <!-- End CV Container -->

    <!-- JavaScript for Suggesting Column Break Point -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // --- CONFIGURATION ---
            const columnBreakHeight = 800; // The target height for column 1
            // --- END CONFIGURATION ---

            const contentArea = document.querySelector('.main-content-area');
            if (!contentArea) {
                console.warn('Main content area not found.');
                return;
            }
            const sections = Array.from(contentArea.querySelectorAll('.section'));

            if (sections.length === 0) {
                console.warn('No sections found for column break calculation.');
                return;
            }

            let currentHeight = 0;
            let breakAtIndex = -1;

            // Calculate heights and find the break point
            for (let i = 0; i < sections.length; i++) {
                const section = sections[i];
                const styles = window.getComputedStyle(section);
                const marginTop = parseFloat(styles.marginTop);
                const marginBottom = parseFloat(styles.marginBottom);
                const sectionHeight = section.offsetHeight; // Height of the element itself

                // Calculate the space this section occupies, including its margins
                const sectionTotalSpace = sectionHeight + marginTop + marginBottom;
                const previousHeight = currentHeight;
                currentHeight += sectionTotalSpace;

                console.log(`Section ${i+1} (${section.classList[1] || 'N/A'}): Height=${sectionHeight}, Margins=${marginTop}+${marginBottom}, Total Space=${sectionTotalSpace}, Cumulative Height=${currentHeight}`);

                // Check if adding this section *makes* the total height exceed the threshold
                if (currentHeight > columnBreakHeight) {
                     // If the *previous* height was already over the threshold, we don't need to force break here
                    // This handles cases where a single tall section pushes it way over.
                    if (previousHeight <= columnBreakHeight) {
                        breakAtIndex = i;
                        console.log(`Threshold (${columnBreakHeight}px) exceeded at section index ${i}. Adding break-before suggestion.`);
                         break; // Found the first section to cross the threshold
                    } else {
                         console.log(`Threshold (${columnBreakHeight}px) was already exceeded before section index ${i}. No break suggestion needed here.`);
                    }

                }
            }

            // Apply the break suggestion if a suitable index was found
            if (breakAtIndex !== -1 && sections[breakAtIndex]) {
                sections[breakAtIndex].style.breakBefore = 'column';
                 console.log(`Applied 'break-before: column;' to section index ${breakAtIndex}`);
            } else {
                console.log(`Content height (${currentHeight}px) did not cross threshold (${columnBreakHeight}px) in a way that required a break suggestion, or no sections found.`);
            }
        });
    </script>

</body>
</html>